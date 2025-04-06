<!-- resources/views/branches/create.blade.php -->

@extends('layouts.app')

@section('content')
<h2>Create Branch</h2>
<form method="POST" action="{{ route('branches.store') }}">
    @csrf
    

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

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
