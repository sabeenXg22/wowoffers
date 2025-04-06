<?php

namespace App\Http\Controllers;

// use App\Jobs\NewProductJob;

use App\Branch;
use App\CommonShopImage;
use App\CommonShopOffers;
use App\Country;
use App\District;
use Illuminate\Http\Request;
use DB;
use App\Product;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Mail\Mailable;
use App\Jobs\NewProductJob;
use App\Offer;
use App\OfferImages;
use App\ProductShop;
use App\Shop;
use App\State;

use App\Useroverviews;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use GuzzleHttp\Client;






class ProductController extends Controller
{
    public function index()
    {
        //dd(Auth::check()) ; to check login or not (tru/false)
        $product = DB::table('products')->get();

        //dd($product);

        return view('product.index', compact('product'));
        // prouduct is variable passing to next page
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        if ($request->hasFile('logo')) {
            $image_url =  $request->file('logo')->store('public/prod_images');
            $image_url = str_replace('public/', '', $image_url);
            $data['logo'] = $image_url;


            return redirect()->route('product.index')


                ->withSuccessMessage('success', 'Product Created Successfully');
        }



        // $image = $request->file('logo');
        // if ($image) {
        //     $image_name = date('dmy_H_s_i');  //date-time-second
        //     $ext = strtolower($image->getClientOriginalExtension());  //image format(png,jpg.etc..)
        //     $image_full_name = $image_name . '.' . $ext;
        //     $upload_path = 'public/media/';
        //     $image_url = $upload_path . $image_full_name;
        //     $success = $image->move($upload_path, $image_full_name);

        //     $data['logo'] = $image_url;
        //     $product = DB::table('products')->insert($data);

        //     // Alert::success('Success Title', 'Success Message');


        //     // NewProductJob::dispatch()->delay(now()->addSeconds(3));




        //     return redirect()->route('product.index')


        //         ->withSuccessMessage('success', 'Product Created Successfully');
        //     // Alert::success('Success Title', 'Success Message');
        // }
        //   else {
        // return redirect()->route('product.index');
        //->with('success','Product Update Successfully');
        //}
    }

    public function Edit($id)
    {

        $product = Product::where('id', $id)->first();
        // return view('product.edit', compact('product'));
        return $product->toArray();
        // return ["data" => $product] ;
        //  return view('product.edit');



    }

    public function Update(Request $request)
    {
        // dd($request->all()) ;
        $oldlogo = $request->old_logo;
        $data = array();
        $id = $request->id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image) {
            //unlink($oldlogo);
            $image_name = date('dmy_H_s_i');  //date-time-second
            $ext = strtolower($image->getClientOriginalExtension());  //image format(png,jpg.etc..)
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id', $id)->update($data);
            return redirect()->route('product.index')
                ->with('success', 'Product Update Successfully');
        } else {
            return redirect()->route('product.index');
            //->with('success','Product Update Successfully');
        }
    }


    public function Delete($id)
    {

        $data = DB::table('products')->where('id', $id)->first();
        $image = $data->logo;
        // unlink($image);
        $product = DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index');
        alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');


        // ->with('success', 'Product Delete Successfully');

    }

    public function export()
    {
        $product = Product::all();
        return (new FastExcel($product))->download('file.xlsx');
    }

    public function import()
    {
        try {

            $filePath = public_path('storage/excel_files/file.xlsx');



            (new FastExcel)->import($filePath, function ($line) {

                // dd($line);

                // foreach($line as $p){
                //     dd($p['product_name']);
                // }
                // dd($line['product_name'])

                Product::create([
                    'product_name' => $line['product_name'],
                    'product_code' => $line['product_code'],
                    'details' => $line['details'],
                    'logo' => $line['logo']



                    //'product_name', 'product_code', 'details', 'logo'
                ]);
            });
        } catch (\Exception $e) {
            Log::error('Error importing data: ' . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }


    public function shopwelcome(Request $request)
    {
        $district = $request->query("district_id");
        // $queryDist = DB::table('districts');
        // if ($district) {
        //     $queryDist->where('district_name', '=' . ($district));
        // }
        // $distId = $queryDist->get();


        //dd(Auth::check()) ; to check login or not (tru/false)
        $query = DB::table('shops');/*branches and changnge in view code also*/
        if ($district) {
            $query->where('district_id', $district);
        }
        $shop = $query->get();
        $countries = Country::all();
        $product = Product::all();

        $country_id = 1;
        $states = State::where('country_id', $country_id)->get();
        //dd($product);

        return view('welcome', compact('shop', 'states', 'countries'));
        // prouduct is variable passing to next page
    }

    public function shopindex()
    {
        //dd(Auth::check()) ; to check login or not (tru/false)
        $shop = DB::table('shops')->get();
        $product = Product::all();

        //dd($product);

        return view('shop.index', compact('shop'));
        // prouduct is variable passing to next page
    }


    public function createshop()
    {






        return view(' shop.create');
    }
    public function shopStore(Request $request)
    {


        // shop_name	shop_logo	details	location	city	address_line_1	post_code	state
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['state_id'] = $request->state_id;
        $data['district_id'] = $request->district_id;

        $data['shop_name'] = $request->shop_name;
        // $data ['shop_logo'] = $request->shop_logo;
        $data['details'] = $request->details;
        $data['location'] = $request->location;
        $data['city'] = $request->city;
        $data['post_code'] = $request->post_code;

        $data['address_line_1'] = $request->address_line_1;
        $data['state'] = $request->state;

        $image = $request->file('shop_logo');
        if ($image) {
            // $shop_image_name = date('dmy_H_s_i');
            // $ext = strtolower($image->getClientOriginalExtension());
            // $image_shop_full_name = $shop_image_name . '.' . $ext;
            // $shop_upload_path = 'public/media/shopImage/';
            // $shopimage_url =  $shop_upload_path . $image_shop_full_name;
            // $success = $image->move($shop_upload_path,   $image_shop_full_name);

            $path = $image->store('media/shop_logo', 'public');

            $data['shop_logo'] =  $path;
            $shop = DB::table('shops')->insert($data);

            return redirect()->route('shop.index')

                ->with('Sucess', 'Shop Added sucessfully');
        }




        return view('shop.store');
    }

    // public function shopEdit($id) {
    //     // Add logic to fetch the shop details based on $id
    //     // Example: $shop = Shop::find($id);
    //     $shop = Shop::all();
    //     // Redirect to the edit view with the shop details
    //     return view('shop.edit', ['shop' => $shop]);
    // }

    public function shopEdit($id)
    {
        // Assuming you have a Shop model
        $shop = Shop::find($id);

        if (!$shop) {
            // Handle the case where the shop with the given id is not found
            abort(404);
        }

        return view('shop.edit', ['shop' => $shop]);
    }







    public function productDisplay($id)
    {


        // $shop= DB::table('shops')->get();
        $product = Product::all();
        $data = DB::table('products')->where('id', $id)->first();
        // return view('product.display');
        return view('product.productdisplay', compact('shop'));
    }

    public function shopProductlist($id)
    {
        $product = Product::all();

        //dd(Auth::check()) ; to check login or not (tru/false)
        $product = DB::table('products')->get();
        // Session::set('variableName', $id);
        //dd($product);

        return view('shop.productlistshop', compact('product'))->with("sadhu", $id);
        // prouduct is variable passing to next page

    }


    public function addProductToShop()
    {

        $shop = Shop::first();
        $products = Product::first();


        // $student->subjects()->attach([2,3,4]);
        $shop->products()->sync([1, 3]);
        //   $students = Student ::with( 'subject')->get();
        //   $student = Student::with(['user','subject'])->get();



        dd($shop);



        //  $student->subjects()->sync([1,3]);
        //   $students = Student ::with( 'subject')->get();

        //   $student = Student::with(['user','subject'])->get();



        //dd($student);


    }

    public function shopdemo()
    {
        $product = Product::first();
        $shop = Shop::first();
        $product->shop()->sync([1, 3]);
        dd($product);
    }


    public function manytomany(Request $request)

    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image) {
            $image_name = date('dmy_H_s_i');  //date-time-second
            $ext = strtolower($image->getClientOriginalExtension());  //image format(png,jpg.etc..)
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);

            // Alert::success('Success Title', 'Success Message');


            // NewProductJob::dispatch()->delay(now()->addSeconds(3));




            return redirect()->route('product.index')


                ->withSuccessMessage('success', 'Product Created Successfully');
        }
    }

    public function shopDetails($id)
    {

        $shop = Shop::where('id', $id)->first();
        $shop->increment('click_count');
        $offerSadhu = DB::table('products_shop')->get();

        $branches = DB::table('branches')->where('shop_id', $id)->get();

        //$offerSadhu = ProductShop::where('id', $id)-> first();
        return view('shop.shopdetails', compact('shop'))->with("sadhu", $offerSadhu)
            ->with('sadhuanas', $branches);
    }
    // *********************************************



    public function offerIndex()
    {

        $offers = Offer::all();
        $branch = Branch::all();
        // return view('offers.index', compact('offers'));







        //$offers = DB::table('offers')->get();

        return view('offers.index', compact('offers', 'branch'));
    }

    public function offerCreate()
    {

        $shops = Shop::all();
        $branch = Branch::all();

        return view('offers.offerCreate', compact('shops', 'branch'));
    }
    // public function create()
    // {
    //     return view('product.create');
    // }


    public function OfferStore(Request $request)
    {

        $request->validate([
            'shop_id' => 'required|integer',
            'branch_id' => 'required',
            'offer_name' => 'required|string|max:255',
            'offer_code' => 'required|string|max:50',
            // 'offer_start_date' => 'required|date',
            // 'offer_end_date' => 'required|date|after:offer_start_date',
        ]);
        if ($request->branch_id == 0) {

            $branches = Branch::where('shop_id', $request->shop_id)->get();


            foreach ($branches as $branchId) {
                $off = new Offer();
                $off->shop_id = $request->shop_id;
                $off->branch_id = $branchId->id;
                $off->offer_name = $request->offer_name;
                $off->offer_code = $request->offer_code;
                $off->offer_start_date = $request->offer_start_date;
                $off->offer_end_date = $request->offer_end_date;
                $off->save();
            }
            CommonShopOffers::create($request->all());
            //Offer::create($request->all());

        } else {
            // dd("aaaaaaa");
            Offer::create($request->all());
        }


        return redirect()->route('createOfferImageById', ['shopId' => $request->shop_id, 'branchId' => $request->branch_id])
            ->with('success', 'Offer created successfully');
    }

    public function Offershow($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.show', compact('offer'));
    }

    public function Offeredit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function OfferUpdate(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return redirect()->route('offers.index')->with('success', 'Offer updated successfully');
    }

    // public function Offerdestroy($id)
    // {
    //     $offer = Offer::findOrFail($id);
    //     $offer->delete();
    //     return redirect()->route('offers.index')->with('success', 'Offer deleted successfully');
    // }




    public function Offerdestroy($id)
    {


        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('offers.index')->with('success', 'Offer deleted successfully');
    }


    // *************************************************OFFER IMAGE*************************************
    public function offerImage()
    {

        // $offers = DB::table('offers')->get();
        // //  $offers = Offer::all(); // Retrieve all offers from the 'offers' table

        //  // return view('offers.index', ['offers' => $offers]);

        //   return view('offers.offerImage',compact('offers'));
        $offerImages = OfferImages::all();

        return view('offers.offerImage', compact('offerImages'));
    }



    public function createOfferImage()
    {

        $offersSadhu = DB::table('offers')->get();
        // offer_images
        // $offers = Offer::all();    // Retrieve a list of offers to populate the dropdown
        return view('offers.createOfferImage', compact('offersSadhu'));
    }

    // public function createOfferImageById($shopId, $branchId)
    // {
    //     $offersSadhu = "";
    //     if ($branchId == 0) {
    //         $offersSadhu = CommonShopOffers::where('shop_id', $shopId)->get();
    //     } else {
    //         $offersSadhu = Offer::where('branch_id', $branchId)->get();
    //     }

    //     // $offersSadhu = DB::table('offers')->get();
    //     // offer_images
    //     // $offers = Offer::all();    // Retrieve a list of offers to populate the dropdown
    //     return view('offers.createOfferImage')
    //         ->with('offersSadhu', $offersSadhu)
    //         ->with('shopId', $shopId);
    // }

    public function createOfferImageById($shopId, $branchId)
    {
        $offersSadhu = "";

        if ($branchId == 0) {
            $offersSadhu = CommonShopOffers::where('shop_id', $shopId)->get();
        } else {
            try {
                $offersSadhu = Offer::where('branch_id', $branchId)->get();
            } catch (\Exception $e) {
                // Log the error for debugging
                Log::error('Error fetching offers: ' . $e->getMessage());
                // Optionally, you can handle the error gracefully, e.g., show a user-friendly message
                return redirect()->back()->with('error', 'Error fetching offers. Please try again.');
            }
        }

        // Rest of your code...

        return view('offers.createOfferImage')
            ->with('offersSadhu', $offersSadhu)
            ->with('shopId', $shopId);
    }



    public function offerImageStore(Request $request)
    {


        // error_log("test wwww");

        $request->validate([
            // 'offer_id' => 'required|exists:offers,id',
            // 'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',

        ]);



        $branchId = intval($request->branch_id);

        if ($request->branch_id === null) {
            error_log("null");
        } else {
            error_log("Not Null");
        }

        if ($branchId === 0) {


            // error_log("test 0");

            foreach ($request->file('images') as $image) {
                $path = $image->store('media/commonOfferImages', 'public');

                CommonShopImage::create([
                    'offer_id' => $request->input('offer_id'),
                    'shop_id' => $request->input('shop_id'),
                    'offer_image' => $path,
                ]);

                // Get the branch ID directly without using foreach
                $branchId = DB::table('branches')->where('shop_id', $request->shop_id)->get()->pluck('id');

                // Check if $branchId is not null (indicating a valid branch ID)
                if ($branchId->isNotEmpty()) {
                    // Fetch offer IDs for the given branch
                    $offerIds = DB::table('offers')->whereIn('branch_id', $branchId)->pluck('id');

                    // Iterate over each offer ID and associate it with the current image
                    foreach ($offerIds as $offerId) {
                        OfferImages::create([
                            'offer_id' => $offerId,
                            'offer_image' => $path,
                        ]);
                    }
                }
            }
        } else {

            // dd("aa");
            // error_log("test !0");

            foreach ($request->file('images') as $image) {
                $path = "";
                $path = $image->store('media/offerImages', 'public');
                OfferImages::create([
                    'offer_id' => $request->input('offer_id'),
                    'offer_image' => $path,
                ]);
            }
        }

        return redirect()->route('offer.image')->with('success', 'Images uploaded successfully');
    }

    // *****************************Branch**********************


    public function branches()
    {

        $branches = Branch::all();
        $shop = Shop::first();
        return view('branches.index', compact('branches'));
    }







    public function createBranches()



    {


        $shops = DB::table('shops')->get();
        //  $shop = Shop::where('id', $id)->first();
        // $shop = Shop::first();
        $branches = Branch::all();
        $countries = Country::all();
        $states = State::all();
        $districts = District::all();




        return view('branches.create', compact('branches', 'shops', 'countries', 'states', 'districts'));
    }


    public function StoreBranches(Request $request)
    {

        $countries = Country::find($request->input('country_id'));
        $states = State::find($request->input('state_id'));
        $districts = District::find($request->input('district_id'));

        $branch = new Branch($request->all());
        $shop = Shop::find($request->input('shop_id'));
        $image = $request->file('branch_logo');
        if ($image) {


            // $shop_image_name = date('dmy_H_s_i');
            // $ext = strtolower($image->getClientOriginalExtension());
            // $image_shop_full_name = $shop_image_name . '.' . $ext;
            // $shop_upload_path = 'public/media/branchImage/';
            // $shopimage_url =  $shop_upload_path . $image_shop_full_name;
            // $success = $image->move($shop_upload_path,   $image_shop_full_name);

            $path = $image->store('media/branch_logo', 'public');

            $branch['branch_logo']  =  $path;


            $shop->branches()->save($branch);
            // dd($image_url);
            // $product = DB::table('products')->insert($data);
            // return redirect()->route('product.index')

            return redirect()->route('branches.index');
        }
    }


    public function editBranches($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.edit', compact('branch'));
    }



    public function deleteBranches($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('branches.index');
    }

    public function updateBranches(Request $request, $id)
    {
        $this->validate($request, [
            'shop_id' => 'required',
            'branch_name' => 'required',
            'location' => 'required',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->update($request->all());

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully');
    }




    public function offerImageDisplay($offerId)
    {



        $offers = Offer::with(['images' => function ($query) {
            // You can add additional conditions for the images if needed
        }])
            ->where('id', $offerId)
            ->get();

        $offers = Offer::with('images')->get();
        $commonOffers = CommonShopImage::with('images')->get();
        return view('offers.offerimagedisplay', compact('offers', $commonOffers));

        // return $offers;



        //  $offers = Offer::all();
        //  $offerImages = OfferImages::all($id);
        //  return view('offers.offerimagedisplay', compact('offers',$offers))->with("offerImages", $offerImages)
        //  ->with('sadhuanas', $offerImages);
    }





    // public function brancheDetails($id)
    // {

    //     $currentDate = Carbon::now();
    //     $branches = Branch::where('id', $id)->first();
    //     $offerImages = OfferImages::where('id', $id)->first();
    //     // $offers = Offer::with('images')->get($id);

    //     $offers = Offer::where('branch_id', $id)
    //         ->where('offer_start_date', '<=', $currentDate)
    //         ->where('offer_end_date', '>=', $currentDate)
    //         ->orderBy('offer_start_date', 'asc') // You can also use 'desc' for descending order
    //         ->get();


    //     return view('branches.branchDetails', compact('branches'))->with("sadhu", $branches)
    //         ->with('offers', $offers)->with('offerImages', $offerImages);

    //     // return $offerImages;

    // }


    //     public function brancheDetails($id)     WORKING code*********************************************************************
    // {
    //     $currentDate = Carbon::now();
    //     $branches = Branch::where('id', $id)->first();

    //     // Fetch offer details
    //     $offers = Offer::where('branch_id', $id)
    //         ->where('offer_start_date', '<=', $currentDate)
    //         ->where('offer_end_date', '>=', $currentDate)
    //         ->orderBy('offer_start_date', 'asc')
    //         ->get();

    //     // Fetch offer images for each offer
    //     foreach ($offers as $offer) {
    //         $offer->load(['images' => function ($query) {
    //             $query->orderBy('id', 'asc'); // Order images by primary key
    //         }]);
    //     }

    //     return view('branches.branchDetails', compact('branches', 'offers'));
    // }
    // public function brancheDetails($id)
    // {
    //     $currentDate = Carbon::now();
    //     $branches = Branch::where('id', $id)->first();

    //     // Fetch offer details
    //     $offers = Offer::where('branch_id', $id)
    //         ->where('offer_start_date', '<=', $currentDate)
    //         ->where('offer_end_date', '>=', $currentDate)
    //         ->orderBy('offer_start_date', 'asc')
    //         ->get();

    //     // Fetch offer images for each offer
    //     foreach ($offers as $offer) {
    //         $offer->indexImage = $offer->images()->orderBy('id', 'asc')->first();
    //         $offer->remainingImages = $offer->images()->where('id', '<>', $offer->indexImage->id)->orderBy('id', 'asc')->get();
    //     }

    //     return view('branches.branchDetails', compact('branches', 'offers'));
    // }
    public function brancheDetails($id)
    {
        $currentDate = now()->format('Y-m-d');
        $branches = Branch::where('id', $id)->first();
        $branches->increment('click_count');
       
        $offers = Offer::with('images') // Eager load the 'images' relationship
            ->where('offer_start_date', '<=', $currentDate)
            ->where('offer_end_date', '>=', $currentDate)
            ->where('branch_id', $id)
            ->orderBy('id', 'asc')
            ->get();
    
        return view('branches.branchDetails', compact('branches', 'offers'));
    }
    
    
    public function shopDetailsForCommon($id)
    {

        $currentDate = Carbon::now();
        $shops = Shop::where('id', $id)->select('id','shop_logo')->first();
       
        $shops->increment('click_count');

        $shopdetails = Shop::where('id', $id)->first();
       
        $query = CommonShopOffers::select('*')
            ->where('shop_id', $id)
            ->where('offer_start_date', '<=', $currentDate)
            ->where('offer_end_date', '>=', $currentDate)
            ->with('images')
            ->orderBy('id', 'asc');
        $commonOffers = $query->get();

        $branchessadhu = DB::table('branches')->where('shop_id', $id)->get();

        // return $commonOffers;
        return view('offers.shopWiseOffer1', compact('shops', 'shopdetails', 'commonOffers', 'branchessadhu'));
    }









    // public function searchByLocation()
    // {

    //     return view('  homebylocation');

    // }

    public function fetchCommonOfferImages($offerId)
    {
        // Fetch the offer and its images based on $offerId
        $offer = Offer::with('images')->first();
        //         $offerId = 1;

        // $offer = CommonShopOffers::leftJoin('common_shop_images', 'common_shop_offers.id', '=', 'common_shop_images.offer_id')
        //     ->where('common_shop_offers.id', $offerId)
        //     ->select('common_shop_offers.*', 'common_shop_images.*')
        //     ->first();
        // return $offer->images;


        // Return the HTML for offer images
        return view('partials.common_offer_images', ['images' => $offer->images])->render();
    }
    public function fetchOfferImages($offerId)
    {
        // Fetch the offer and its images based on $offerId
        $offer = Offer::with('images')->where('id', $offerId)->orderBy('id', 'desc')->first();

        // return $offer->images;


        // Return the HTML for offer images
        return view('partials.offer_images', ['images' => $offer->images])->render();
    }
}
