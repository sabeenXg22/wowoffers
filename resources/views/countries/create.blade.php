<!-- resources/views/countries/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Country</h2>

        <form method="POST" action="{{ route('countries.store') }}">
            @csrf
            <div class="form-group">
                <label for="country_name">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
