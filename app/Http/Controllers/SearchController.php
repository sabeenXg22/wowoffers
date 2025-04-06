<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Shop;
use App\District;
use App\State;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Shop::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        // Check if the request is AJAX (for JSON response)
        if ($request->ajax()) {
            return response()->json([
                'results' => $results,
            ]);
        }

        // Fallback for normal GET request (in case you want full-page search)
        return view('search-results', compact('results', 'query'));
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $shops = Shop::where('shop_name', 'like', "%$query%")
    //                  ->orWhere('location', 'like', "%$query%")
    //                  ->get();

    //     $districts = District::where('district_name', 'like', "%$query%")
    //                         ->get();

    //     $states = State::where('state_name', 'like', "%$query%")
    //                    ->get();

    //     $branches = Branch::where('branch_name', 'like', "%$query%")
    //                       ->orWhere('location', 'like', "%$query%")
    //                       ->get();

    //     return response()->json([
    //         'shops' => $shops,
    //         'districts' => $districts,
    //         'states' => $states,
    //         'branches' => $branches,
    //     ]);
    // }


    // Add this method to your SearchController
    // public function searchBranches(Request $request)
    // {
    //     $query = $request->input('query');

    //     $branches = Branch::where('branch_name', 'like', "%$query%")
    //                       ->orWhere('location', 'like', "%$query%")
    //                       ->get();

    //     return response()->json([
    //         'branches' => $branches,
    //     ]);
    // }

    public function searchOffers(Request $request)
    {
        $currentDate = now()->format('Y-m-d');
        $query = $request->input('query'); // Get the search query from the request

        // Build the query to search for active offers with one image per offer
        $offers = DB::table('offers')
            ->join('shops', 'offers.shop_id', '=', 'shops.id')
            ->leftJoin(
                DB::raw("(SELECT offer_id, offer_image
                FROM offer_images oi1
                WHERE oi1.id = (
                    SELECT MIN(id)
                    FROM offer_images oi2
                    WHERE oi2.offer_id = oi1.offer_id
                )) as offer_images"),
                'offers.id',
                '=',
                'offer_images.offer_id'
            )

            ->leftJoin('branches', 'offers.branch_id', '=', 'branches.id') // Join with branches table
            ->leftJoin('districts', 'branches.district_id', '=', 'districts.id') // Join with districts table
            ->select('offers.*', 'offer_images.offer_image', 'branches.branch_name', 'branches.branch_address', 'districts.district_name')
            ->where('offer_start_date', '<=', $currentDate)
            ->where('offer_end_date', '>=', $currentDate)
            ->orderBy('shops.priority', 'ASC')
            ->orderBy('offers.offer_end_date', 'DESC');

        // If there is a search query, filter offers by offer name, shop name, or branch name
        if ($query) {
            $offers->where(function ($q) use ($query) {
                $q->where('offers.offer_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('shops.shop_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('branches.branch_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('districts.district_name', 'LIKE', '%' . $query . '%');
            });
        }



        $offers = $offers->get(); // Execute the query

        return response()->json(["Offer" => $offers]);
    }


    public function searchBranches(Request $request)
    {
        $query = $request->input('query');

        $branches = Branch::where('branch_name', 'like', "%$query%")
            ->orWhere('location', 'like', "%$query%")
            ->get();

        return view('search', ['sadhuanas' => $branches]);
    }

    // public function searchBranches(Request $request)
    // {
    //     $query = $request->input('query');

    //     $branches = Branch::where('branch_name', 'like', "%$query%")
    //         ->orWhere('location', 'like', "%$query%")
    //         ->get();

    //     return view('search', compact('branches'));
    // }

    // Add this method to your SearchController
    public function searchBranchesWithDistrict(Request $request)
    {
        $query = $request->input('query');
        $districtId = $request->input('district_id');

        $branches = Branch::where('district_id', $districtId)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('branch_name', 'like', "%$query%")
                    ->orWhere('location', 'like', "%$query%");
            })
            ->get();

        return response()->json([
            'branches' => $branches,
        ]);
    }

    public function searchshopBranch(Request $request)
    {
        $query = $request->input('query');
        $currentDate = now()->format('Y-m-d');

        $offers = DB::table('offers')
            ->join('shops', 'offers.shop_id', '=', 'shops.id')
            ->leftJoin(
                DB::raw("(SELECT offer_id, MIN(offer_image) AS offer_image
                        FROM offer_images
                        GROUP BY offer_id) as offer_images"),
                'offers.id',
                '=',
                'offer_images.offer_id'
            )
            ->leftJoin('branches', 'offers.branch_id', '=', 'branches.id')
            ->where(function ($q) use ($query) {
                $q->where('shops.shop_name', 'like', "%$query%")
                    ->orWhere('shops.location', 'like', "%$query%");
            })
            ->where('offer_start_date', '<=', $currentDate)
            ->where('offer_end_date', '>=', $currentDate)
            ->select('offers.*', 'offer_images.offer_image', 'branches.branch_name')
            ->orderBy('offers.offer_end_date', 'DESC')
            ->get();

        return response()->json(["Offer" => $offers]);
    }
}
