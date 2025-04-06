<!-- resources/views/branches/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Branch</h2>

        <form method="POST" action="{{ route('branches.update', $branch->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="shop_id">Select Shop</label>
                <select name="shop_id" id="shop_id" class="form-control">
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}" {{ $branch->shop_id == $shop->id ? 'selected' : '' }}>{{ $shop->shop_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="country_id">Select Country</label>
                <select name="country_id" id="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $branch->country_id == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="state_id">Select State</label>
                <select name="state_id" id="state_id" class="form-control">
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $branch->state_id == $state->id ? 'selected' : '' }}>{{ $state->state_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="district_id">Select District</label>
                <select name="district_id" id="district_id" class="form-control">
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ $branch->district_id == $district->id ? 'selected' : '' }}>{{ $district->district_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="branch_name">Branch Name</label>
                <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{ $branch->branch_name }}">
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $branch->location }}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Branch Logo:</strong>
                    <input type="file" name="branch_logo">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
