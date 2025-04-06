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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Offer Images</div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('offer_images.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="shop_id" value="{{ request('shopId') }}" />
                            <input type="text" name="branch_id" value="{{ request('branchId') }}" />
                            <div class="form-group">
                                <label for="offer_id">Select Offer</label>
                                <select name="offer_id" id="offer_id" class="form-control" required>
                                    @foreach($offersSadhu as $offer)
                                    <option value="{{ $offer->id }}">{{ $offer->offer_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="images">Select Images (multiple)</label>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple required>
                            </div>

                            <button type="submit" class="btn btn-primary">Upload Images</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection









</body>

</html>