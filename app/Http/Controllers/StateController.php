<?php







// app/Http/Controllers/CountryController.php

namespace App\Http\Controllers;


// app/Http/Controllers/StateController.php



use Illuminate\Http\Request;

use App\Country;
use App\State;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Coupons;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        $countries = Country::all();
        return view('states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        State::create([
            'state_name' => $request->state_name,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('states.index')->with('success', 'State created successfully');
    }

    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate([
            'state_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $state->update([
            'state_name' => $request->state_name,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('states.index')->with('success', 'State updated successfully');
    }

    public function show(State $state)
    {
        $states = State::all();
        $countries = Country::all();
        return view('states.show', compact('state','countries'));
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success', 'State deleted successfully');
    }
}
