<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
@extends('product.layout')
@include('sweetalert::alert')

@section('content')
<br><br><br>

<div class="row">
    <div class="col-lg-12 margin-tab">
        <div class="pull-left">
            <h2>Add New Product </h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('product.index') }}">Back Button </a>

        </div>
        </div>

        <form action="{{route('product.Shop') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Id:</strong>
                    <input type="text" name="product_id" class="form-control" placeholder="Product Id">

                </div>
            </div>

            product_id	shop_id	offer_start_date	offer_end_date	

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong> Shop Id:</strong>
                    <input type="text" name="shop_id" class="form-control" placeholder="Shop Id">
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Offer Start Date:</strong>
                    <textarea class="form-control" name="offer_start_date" style="height: 150px;" placeholder="Offer Start Date"></textarea>
                    
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong> Offer End Date:</strong>
                    <input type="text" name="offer_end_date" class="form-control" placeholder="Offer End Date">
                    
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>

    


        </div>


     


@endsection

    
</body>
</html>