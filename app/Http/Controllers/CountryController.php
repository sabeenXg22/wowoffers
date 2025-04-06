<?php



use Illuminate\Http\Request;



// app/Http/Controllers/CountryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|unique:countries',
        ]);

        Country::create($request->all());

        return redirect()->route('countries.index')->with('success', 'Country added successfully');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required|string|unique:countries,country_name,' . $id,
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());

        return redirect()->route('countries.index')->with('success', 'Country updated successfully');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'Country deleted successfully');
    }
}

