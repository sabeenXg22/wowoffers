<!-- resources/views/states/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit State</h2>

        <form method="POST" action="{{ route('states.update', $state->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="state_name">State Name</label>
                <input type="text" class="form-control" id="state_name" name="state_name" value="{{ $state->state_name }}" required>
            </div>
            <div class="form-group">
                <label for="country_id">Country</label>
                <select class="form-control" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $state->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
