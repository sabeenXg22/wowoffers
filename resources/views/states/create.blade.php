<!-- resources/views/states/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create State</h2>

        <form method="POST" action="{{ route('states.store') }}">
            @csrf
            <div class="form-group">
                <label for="state_name">State Name</label>
                <input type="text" class="form-control" id="state_name" name="state_name" required>
            </div>
            <div class="form-group">
                <label for="country_id">Country</label>
                <select class="form-control" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
