


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
 


    <br><br><br>
 

<!-- resources/views/branches/index.blade.php -->


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Offers List</div>
                    <a class="btn btn-success" href="{{route('offers.create') }}">Create new Offers </a> 
                    <br>
                   

                    <div class="card-body">
                        @if (count($offers) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shop ID</th>
                                        <th>Branch ID</th>
                                        <th>Offer Name</th>
                                        <th>Offer Code</th> 
                                        <th>Offer Start Date</th>
                                        <th>Offer End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                        <tr>
                                            <td>{{ $offer->id }}</td>
                                            <td>{{ $offer->shop_id }}</td>
                                            <td>{{ $offer->branch_id }}</td>
                                            <td>{{ $offer->offer_name }}</td>
                                            <td>{{ $offer->offer_code }}</td>
                                            <td>{{ $offer->offer_start_date }}</td>
                                            <td>{{ $offer->offer_end_date }}</td>
                                            <td>
                                                <a href="{{ route('offers.show', $offer->id) }}" class="btn btn-info">View</a>
                               
                                                <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-warning">Edit</a>
                                                
                                                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No offers available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



        @endsection


</body>

</html>