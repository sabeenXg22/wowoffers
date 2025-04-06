<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Offer;
use App\OfferImages;
use App\ProductShop;
use App\Shop;
use App\State;
use App\Country;
use App\District;
use App\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = DB::table('shops');/*branches and changnge in view code also*/
       
        $shop = $query->get();
        $countries = Country::all();
        $product = Product::all();

        $country_id = 1;
        $states = State::where('country_id', $country_id)->get();
        return view('welcome', compact('shop', 'states', 'countries'));
    }
}
