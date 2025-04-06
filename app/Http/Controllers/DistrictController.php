<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\State;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('districts.index', compact('districts'));
    }
    
    public function create()
    {
        $states = State::all();
        $countries = Country::all();
        return view('districts.create', compact('states','countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'district_name' => 'required|string|max:255',
        ]);

        District::create([
            'state_id' => $request->state_id,
            'district_name' => $request->district_name,
        ]);

        return redirect()->route('districts.index')->with('success', 'District created successfully');
    }
    public function edit($id)
    {
        $district = District::findOrFail($id);
        $countries = Country::all();
        $states = State::all();

        return view('districts.edit', compact('district', 'countries', 'states'));
    }
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('districts.index')->with('success', 'District deleted successfully');
    }
    public function getDistricts($countryId)
    {
        $districts = District::where('country_id', $countryId)->get();
        return response()->json(['districts' => $districts]);
    }
    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return response()->json(['states' => $states]);
    }
}
