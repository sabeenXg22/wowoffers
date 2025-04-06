


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
    @include('sweetalert::alert')
    @section('content')
 
  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <a class="btn btn-success" href="{{route('createOfferImage') }}">Create new offer iamge </a>
                <div class="card-header">Offer Images</div>

  

    

                <div class="card-body">
                    @if(count($offerImages) > 0)
                        <div class="row">
                            @foreach($offerImages as $image)
                                <div class="col-md-4 mb-4">

                                
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $image->offer_image) }}"onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No offer images available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>







        @endsection


</body>

</html>