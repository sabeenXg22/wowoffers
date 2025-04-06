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


    <h2>All Branches</h2>

    <a class="btn btn-success" href="{{route('create.branches') }}">Create new Branches </a>

    @if(count($branches) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Shop ID</th>
                    <th>Branch Name</th>
                    <th>Location</th>
                    <th width="100px">Branch Logo</th>
                   
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->id }}</td>
                        <td>{{ $branch->shop_id }}</td>
                        <td>{{ $branch->branch_name }}</td>
                        <td>{{ $branch->location }}</td>
                        <td><img src="/storage/{{$branch->branch_logo}}" height="70px" width="70px"></td>
                        {{-- <td><img src="{{URL::to($branch->branch_logo) }}" height="70px" width="70px"> </td> --}}
                        <td>
                        
                        <td>
                    
                        <a href="{{ route('branches.show', $branch->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('delete.branches', $branch->id) }}" method="POST" style="display: inline-block;">
                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
                                <a href="{{ route('offers.create') }}" class="btn btn-warning">Go To Offer Page</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No branches found.</p>
    @endif







        @endsection


</body>

</html>