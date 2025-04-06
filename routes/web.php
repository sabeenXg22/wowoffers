<?php

use App\Http\Controllers\OfferController;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {

//     return view('welcome');
//     Alert::success("hello","ttt");
// });

use App\Http\Controllers\HomeController;

Auth::routes();  

Route::get('/home', [HomeController::class, 'index'])->name('home'); 


// Route::get('/demo', function () {
//     return view('demo');
// });

Route::group(['middleware' => "auth"],function(){
 Route::get('products',"ProductController@index")->name('product.index');

 Route::get('create',"ProductController@create")->name('create.product');

Route::post('store',"ProductController@Store")->name('product.store');


Route::get('edit/product/{id}', 'ProductController@edit')->name('product.edit');


Route::post('update/product',"ProductController@Update")->name('product.update'); 

Route::get('delete/product/{id}',"ProductController@Delete")->name('delete.product');

Route::get('export',"ProductController@export")->name('export');

Route::get('import',"ProductController@import")->name('import');
Route::get('shop/create',"ProductController@shop")->name('shop');
Route::get('shops',"ProductController@shopindex")->name('shop.index');


Route::get('shop',"ProductController@shop")->name('shop');
Route::get('shop/create',"ProductController@createshop")->name('shop.create');
Route::post('shop/store',"ProductController@shopStore")->name('shop.store');
Route::get('edit/shop/{id}', 'ProductController@shopEdit')->name('shop.edit');
Route::post('update/shop',"ProductController@shopUpdate")->name('shop.update'); 



Route::get('product/display',"ProductController@productDisplay")->name('product.display');
Route::get('shopproductdisplay/{id}',"ProductController@shopProductlist");
Route::get('manytomany',"ProductController@manytomany")->name('manytomany');
Route::get('product-shop',"ProductController@productShop")->name('product.Shop');

Route::post('product/offer',"ProductController@offer")->name('product.offer'); 
// ****************************

Route::get('offer/index',"ProductController@offerIndex")->name('offers.index');

Route::get('createOffer',"ProductController@offerCreate")->name('offers.create');
Route::post('offer/store',"ProductController@OfferStore")->name('offers.store');

Route::get('offer/edit/{id}',"ProductController@Offeredit")->name('offers.edit');
Route::delete('offer/destroy/{id}',"ProductController@Offerdestroy")->name('offers.destroy');
Route::get('offer/show/{id}',"ProductController@Offershow")->name('offers.show');
Route::put('offer/update/{id}',"ProductController@OfferUpdate")->name('offers.update');

Route::get('/show-offers', [ProductController::class, 'offerIndex'])->name('show.offers');
Route::get('/offerImageDisplay/{id}', [ProductController::class, 'Offershow'])->name('offerImageDisplay');





// ********************* offer image ***********************

Route::get('offer/image',"ProductController@offerImage")->name('offer.image');
Route::get('createOfferImage',"ProductController@createOfferImage")->name('createOfferImage');
Route::get('createOfferImageById/{shopId}/{branchId}',"ProductController@createOfferImageById")->name('createOfferImageById');
Route::get('createOfferImageIndexSad',"ProductController@shopindex")->name('createOfferImageIndexSad');

Route::post('Offer/image/store',"ProductController@offerImageStore")->name('offer_images.store');



// **************************Branch*************************

Route::get('branches',"ProductController@branches")->name('branches.index');

 Route::get('create/branches',"ProductController@createBranches")->name('create.branches');

Route::post('store/branches',"ProductController@StoreBranches")->name('branches.store');

Route::get('branches/{id}', "ProductController@branchesShow")->name('branches.show');
Route::get('edit/branches/{id}',"ProductController@editBranches")->name('branches.edit');
Route::put('update/branches/{id}', "ProductController@updateBranches")->name('update.branches');
Route::delete('delete/branches/{id}',"ProductController@deleteBranches")->name('delete.branches');











// ***********************************County,State,District****************

Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);


Route::resource('districts', DistrictController::class);


Route::get('/get-statesanas/{countryId}', 'DistrictController@getStates')->name('get.states');







});
Route::get('/get-common-offerssadhu/{shopId}', 'ProductController@fetchCommonOfferImages')->name('get-common-offers');

Route::get('/get-shops/{districtId}', 'ShopController@getShops')->name('get-shops');

Route::get('/get-branches-ajax/{districtId}', 'ShopController@getBranchesAjax')->name('get-branches-ajax');

Route::get('/',"ProductController@shopwelcome");

Route::get('offerImageDisplay/{id}',"ProductController@offerImageDisplay")->name('offer.imagedisplay');
Route::get('brancheDetails/{id}',"ProductController@brancheDetails")->name('branches.details');
Route::get('shopDetailsForCommon/{id}',"ProductController@shopDetailsForCommon")->name('offers.shopWiseOffer');


Route::get('shopdetails/{id}',"ProductController@shopDetails")->name('shopdetails');
Route::get('showOffers/{id}',"ProductController@showOffers")->name('show.offers');

// offer Click count
Route::post('/updateOfferClickCount/{id}', "OfferController@updateClickCount");

//Route::get('search-by-location',"ProductController@searchByLocation")->name('searchByLocation');
//  Route::get('/', 'CountryStateDistrictController@index');
 Route::get('/get-states/{id}', 'CountryStateDistrictController@getStates');
 Route::get('/get-districts/{id}', 'CountryStateDistrictController@getDistricts');
 Route::get('/search', 'SearchController@search')->name('search');
 Route::get('/get-offers-by-id-ajax/{id}', 'OfferController@getOfferImages');
 Route::get('/offers/{offerId}', 'OfferController@getOfferImagesPage');


 Route::get('/search-offers', 'SearchController@searchOffers')->name('search.offers');

Route::get('/search', 'SearchController@index');
Route::get('/search/result', 'SearchController@search')->name('search.result');
Route::get('/search/branches', 'SearchController@searchBranches')->name('search.branches');
Route::get('/search/shop-branches', 'SearchController@searchshopBranch')->name('search.shop-branches');

Route::get('/fetch-offer-images/{offerId}', 'ProductController@fetchOfferImages');



