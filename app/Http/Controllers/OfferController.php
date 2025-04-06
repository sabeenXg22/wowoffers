<?php

namespace App\Http\Controllers;

use App\Offer;
use App\OfferImages;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{
    public function getOfferImages($offerId)
    {
        $offer =  Offer::with('images')->where('id', $offerId)->orderBy('id', 'desc')->first();

        if ($offer) {
            return response()->json(['images' => $offer->images]);
        } else {
            return response()->json(['images' => []], 404);
        }
        
            // Retrieve offer images based on the offerId
            // $offerImagesAjax = OfferImages::where('offer_id', $offerId)->get();

           // $offerImages = DB::table('offer_images')->where('offer_id', $offerId)->get();
       
            $offer = Offer::with('images')->where('id', $offerId)->orderBy('id', 'desc')->first();

            // return $offer;

            return view('partials.offer_images', ['images' => $offer->images,'images' => $offer->images])->render();
            // $offers = Offer::whereIn('branch_id', function ($query) use ($districtId, $currentDate) {
            //     $query->select('id')
            //         ->from('branches')
            //         ->where('offer_start_date', '<=', $currentDate)
            //         ->where('offer_end_date', '>=', $currentDate)
            //         ->where('district_id', $districtId)
            //         ->orderBy('id', 'asc');
            // })->get();
            // return view('partials.offers', compact('offers'));
            // return $offer->images;
    
    
            // Return the HTML for offer images
          

    }

    public function getOfferImagesPage($offerId)
    {
        $offer =  Offer::with('images')->where('id', $offerId)->orderBy('id', 'desc')->first();

        if ($offer) {
            $offer->increment('click_count');
            return view('offers.offer', compact('offer'));
        } else {
            return response()->json(['images' => []], 404);
        }
    }

    public function updateClickCount($id)
{
    $offer = Offer::find($id);

    if ($offer) {
        $offer->increment('click_count');
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 404);
}
}
