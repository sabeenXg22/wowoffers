@extends('product.layout')    
@include('sweetalert::alert')

@section('content')
<br><br><br>

<div class="row">
    <div class="col-lg-12 margin-tab">
        <div class="pull-left">
            <h2>Edit Product </h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('product.index') }}">Back Button </a>

        </div>
        </div>

        <form action="{{ url('update/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" value="{{
                        $product->product_name}}">

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" name="product_code" class="form-control" value="{{
                        $product->product_code}}">
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    <textarea class="form-control" name="details" style="height: 150px;" placeholder="Details">
                    {{$product->details}}"
                </textarea>
                    
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Images:2</strong>
                    <input type="file" name="logo">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Old Images:</strong>
                    <img  src="{{URL::to($product->logo) }}" height="70px" width="70px">
                   <input type="hidden" name="old_logo" value="{{$product->logo}}">
                    

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>




        </div>






@endsection