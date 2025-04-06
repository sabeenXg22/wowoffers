    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        


        <style>
    div.scroll-container {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
    padding: 10px;
    }

    div.scroll-container img {
    padding: 10px;
    }
    </style>

        
    </head>

    <body>

    @extends('layouts.app')
    @include('sweetalert::alert')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif -->

                        {{ __('You are logged in!') }}

                    </div>
                </div>
            </div>
        </div>
    </div>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>


        <!-- Ajax -->

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->






    
        <br><br><br>



        












        <div class="row">
            <div class="col-lg-12 margin-tab">

                <div class="card-body">
                <div class="row justify-content-center">

                    <div class="">

                    
                    <!-- class="row justify-content-center" -->
                        <h2>Shop List</h2>
                        <a class="btn btn-success" href="{{route('product.index')}}">product display  </a>
                        <a class="btn btn-danger" href="{{route('export') }}" >export</a>
                            <a class="btn btn-success"  href="{{route('import') }}"  >import</a>
                            <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>
                            <!-- <a class="btn btn-success" href="{{route('shop') }}">Add Shops </a> -->
                            <a class="btn btn-success" href="{{route('shop.create') }}">Add Shops </a>
                            <a class="btn btn-success" href="{{route('offer.image') }}">Add images </a>
                            
                        <a class="btn btn-primary"  href="{{ route('offers.create') }}">Add Offer </a>
                          
                    
                            

    </button>
                    

                    </div>
                    <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>

            </div> -->

                </div>

            </div>

            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }} </p>
            </div>
            @endif


            <!-- @if(Session::has('error'))
    <div class="alert alert-danger">
    {{ Session::get('error')}}
    </div>
    @endif -->





            <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>

            </div> -->

            <table class="table table-bordered " " id="dataTable">
                <thead>
                    <tr>
                    <th>Id</th>
                        <th>Shop Name</th>
                        <th>Details</th>
                        <th>City</th>
                        <th>Address Line 1</th>
                        <th>Post code</th>
                        <th>State</th>
                        <th width="100px">Shop Logo</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shop as $sho)
                 
                    <tr>
                    <td>{{ $sho->id }}</td>
                        <td>{{ $sho->shop_name }}</td>
                        <td> {{ $sho->details }}</td>

                        <td> {{ $sho->address_line_1 }}</td>
                        
                        <td> {{ $sho->post_code }}</td>
                        
                        <td> {{ $sho->city }}</td>
                        
                        <td> {{ $sho->state }}</td>
                    
                        <td><img src="{{URL::to($sho->shop_logo) }}" height="70px" width="70px"> </td>
                        <td>
                            <a class="btn btn-primary" href="{{URL::to('shopproductdisplay/'.$sho->id)}}">Offer</a>
                           
                            <a class="btn btn-primary" href="{{ route('shop.edit', ['id' => $sho->id]) }}">Edit</a>

                          
                            <a class="btn btn-success" href="{{route('create.product') }}">Delete </a>
                            <a class="btn btn-success" href="{{route('branches.index') }}">Add Branches </a>
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>

            </div>

           




    



            <!-- edit -->




            <!-- Button trigger modal -->

            <!-- Modal -->


        






        <div class="row" onclick="">
        @foreach($shop as $sho)
                    <div class="col-md-2 mb-4">
                        <div class="card">
                        <!-- <a   href="{{route('product.display')}}"> -->
                        <a class="btn btn-primary" href="{{URL::to('shopdetails/'.$sho->id)}}">More Details</a>
                    
                        <img class="card-img-top" src="{{URL::to($sho->shop_logo) }}" alt="Image">
                        </a>
                        <div class="card-body">
                                <p class="card-text">Image description</p>
                                <td> {{ $sho->city }}</td>
                                <td> {{ $sho->address_line_1 }}</td>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>   
            @endsection
    </body>

    </html>