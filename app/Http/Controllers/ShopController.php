<?php

namespace App\Http\Controllers;
// ShopController.php

use App\Branch;
use App\CommonShopOffers;
use App\Offer;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{

    public function getShops(Request $request, $districtId = null)
    {
        $currentDate = now()->format('Y-m-d');
    
        // Raw query to get all active offers with one image per offer
        $offers = DB::table('offers')
        ->join('shops', 'offers.shop_id', '=', 'shops.id')
        ->leftJoin('branches', 'offers.branch_id', '=', 'branches.id')
        ->leftJoin(
            DB::raw("(SELECT offer_id, offer_image 
                      FROM offer_images 
                      WHERE id IN (
                          SELECT MIN(id) 
                          FROM offer_images 
                          GROUP BY offer_id
                            )) as offer_images"),
                    'offers.id',
                    '=',
                    'offer_images.offer_id'
                )
        ->where('offer_start_date', '<=', $currentDate)
        ->where('offer_end_date', '>=', $currentDate)
        ->select('offers.*', 'offer_images.offer_image', 'branches.branch_name', 'branches.branch_address')
        ->orderBy('shops.priority', 'ASC')
        ->orderBy('offers.offer_end_date', 'DESC');
    
        if ($districtId != 0) {
            $offers->whereIn('offers.branch_id', function ($query) use ($districtId) {
                $query->select('id')
                    ->from('branches')
                    ->where('district_id', $districtId);
            });
        } else {
            $offers->limit(20);
        }
    
         $offers = $offers->get(); // Execute the query
    
    
        return response()->json(["Offer" => $offers]);
    }
    
    

    public function getBranchesAjax(Request $request, $districtId)
    {
        // Implement logic to fetch shops for the given district
        // You may use $districtId to query the database or any other method
        $branches = Branch::where('district_id', $districtId)->get();

        // Return the shops view or any HTML content
        return view('partials.branches', compact('branches'));
    }
    public function getCommonOffersAjax(Request $request, $shopId)
    {
        // Implement logic to fetch shops for the given district
        // You may use $districtId to query the database or any other method

        $currentDate = Carbon::now();
        $commonOfferssad = CommonShopOffers::with('images')->where('shop_id', $shopId)
            ->where('offer_start_date', '<=',    $currentDate)
            ->where('offer_end_date', '>=', $currentDate)
            ->orderBy('id', 'asc')
            ->get();
   
        // Return the shops view or any HTML content
        return view('partials.commonOffers', compact('commonOfferssad'));
    }
}
