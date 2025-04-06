<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\State;
use Illuminate\Http\Request;

class CountryStateDistrictController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('homebylocation', compact('countries'));
    }

    public function getCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return response()->json($states);
    }

    public function getDistricts($stateId)
    {
        $districts = District::where('state_id', $stateId)
            ->orderBy('district_name', 'asc') // Order by district_name in ascending order
            ->get();
        return response()->json($districts);
    }
}
