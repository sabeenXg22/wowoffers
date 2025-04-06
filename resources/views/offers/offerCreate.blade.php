<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Offer</title>
</head>

<body>

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Offer</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('offers.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="shop_id">Select Shops</label>
                                <select name="shop_id" id="shop_id" class="form-control">
                                    @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="branch_id">Select Branch</label>
                                <select name="branch_id" id="branch_id" class="form-control">
                                    <option value="0">All</option>
                                    @foreach($branch as $bran)
                                    <option value="{{ $bran->id }}">{{ $bran->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          


                            <div class="form-group">
                                <label for="offer_name">Offer Name</label>
                                <input type="text" name="offer_name" id="offer_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="offer_code">Offer Code</label>
                                <input type="text" name="offer_code" id="offer_code" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="offer_start_date">Offer Start Date</label>
                                <input type="date" name="offer_start_date" id="offer_start_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="offer_end_date">Offer End Date</label>
                                <input type="date" name="offer_end_date" id="offer_end_date" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Offer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>

</html>