
<!-- resources/views/offers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Offer</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('offers.update', $offer->id) }}">
                            @csrf
                            @method('PUT')
    
                            <!-- Include your form fields here -->
                            <!-- Example: -->
                            <label for="offer_name">Offer Name</label>
                            <input type="text" name="offer_name" id="offer_name" value="{{ $offer->offer_name }}">
    
                            <!-- Add other form fields as needed -->
    
                            <button type="submit" class="btn btn-primary">Update Offer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
