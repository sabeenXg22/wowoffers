<!-- resources/views/countries/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Country</h2>

        <form method="POST" action="{{ route('countries.update', $country->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="country_name">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $country->country_name }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
