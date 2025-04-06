<!-- resources/views/states/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>State Details</h2>

        <div>
            <strong>ID:</strong> {{ $state->id }}
        </div>
        <div>
            <strong>State Name:</strong> {{ $state->state_name }}
        </div>
        <div>
            <strong>Country:</strong> {{ $state->country_id }}
        </div>
     

        <div class="mt-3">
            <a href="{{ route('states.index') }}" class="btn btn-primary">Back to States</a>
        </div>
    </div>
@endsection
