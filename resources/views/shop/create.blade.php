<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shops</title>
</head>

<body>
@extends('product.layout')
@include('sweetalert::alert')

@section('content')
<br><br><br>

<div class="row">
    <div class="col-lg-12 margin-tab">
        <div class="pull-left">
            <h2>Add New Shops </h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('product.index') }}">Back Button </a>

        </div>
        </div>

        <form action="{{route('shop.store') }}" method="POST" enctype="multipart/form-data"  multipleimage='true'>
            @csrf

            

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Country  id:</strong>
                    <input type="text" name="country_id" class="form-control" placeholder="Country ID">

                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>State id</strong>
                    <input type="text" name="state_id" class="form-control" placeholder="State id">

                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>District id:</strong>
                    <input type="text" name="district_id" class="form-control" placeholder="District id">

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Shop Name:</strong>
                    <input type="text" name="shop_name" class="form-control" placeholder="Shop Name">

                </div>
            </div>
       
            <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Details:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">

                </div>
            </div> -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" class="form-control" placeholder="Location">

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" name="city" class="form-control" placeholder="City">
                    
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Address Line 1:</strong>
                    <input type="text" name="address_line_1" class="form-control" placeholder=">Address Line 1">

                </div>
            </div>
            <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Address Line 1:</strong>
                    <input type="text" name="address_line_1" class="form-control" placeholder="Address Line 1'>
                    
                </div>
            </div> -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Post Code:</strong>
                    <input type="text" name="post_code" class="form-control" placeholder="Post Code:">
                    
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>State:</strong>
                    <input type="text" name="state" class="form-control" placeholder="State">
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    <textarea class="form-control" name="details" style="height: 150px;" placeholder="Details"></textarea>
                    
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Images:5</strong>
                    <input type="file" name="shop_logo" multiple='multiple'>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>




        </div>


     


@endsection

    
</body>
</html>