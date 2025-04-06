<!-- resources/views/offers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Offer Details</div>
    
                    <div class="card-body">
                        <p>ID: {{ $offer->id }}</p>
                        <p>Shop ID: {{ $offer->shop_id }}</p>
                        <p>Offer Name: {{ $offer->offer_name }}</p>
                        <p>Offer Code: {{ $offer->offer_code }}</p>
                        <p>Offer Start Date: {{ $offer->offer_start_date }}</p>
                        <p>Offer End Date: {{ $offer->offer_end_date }}</p>
    
                        <!-- Add other details as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
