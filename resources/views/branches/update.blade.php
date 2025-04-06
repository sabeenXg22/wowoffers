<!-- resources/views/branches/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Edit Branch</h2>
    <form method="POST" action="{{ route('branches.update', $branch->id) }}">
        @csrf
        @method('PUT')
        <label for="shop_id">Shop ID</label>
        <input type="text" name="shop_id" id="shop_id" value="{{ $branch->shop_id }}">
        <label for="branch_name">Branch Name</label>
        <input type="text" name="branch_name" id="branch_name" value="{{ $branch->branch_name }}">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" value="{{ $branch->location }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('branches.index') }}" class="btn btn-primary">Back to All Branches</a>
@endsection
