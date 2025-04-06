


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>


    @extends('layouts.app')
   
    @section('content')
 <!-- resources/views/branches/create.blade.php -->

<h2>Create Branch</h2>
<form method="POST" action="{{ route('branches.store') }}" enctype="multipart/form-data">
    @csrf
    
    <!-- countries','states','districts -->
 

    
    <div class="form-group">
        <label for="country_id">Select Contry</label>
        <select name="country_id" id="country_id" class="form-control">
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="country_id">Select State</label>
        <select name="state_id" id="state_id" class="form-control">
            @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->state_name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="district_id">Select District</label>
        <select name="district_id" id="district_id" class="form-control">
            @foreach($districts as $district)
                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="shop_id">Select Shop</label>
        <select name="shop_id" id="shop_id" class="form-control">
            @foreach($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="branch_name">Branch Name</label>
        <input type="text" name="branch_name" id="branch_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Images:1</strong>
                    <input type="file" name="branch_logo">

                </div>
            </div>


    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection












</body>

</html>
