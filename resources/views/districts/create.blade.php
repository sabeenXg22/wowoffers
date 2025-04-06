<!-- resources/views/districts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create District</h2>

        <form method="POST" action="{{ route('districts.store') }}">
            @csrf

            <div class="form-group">
                <label for="country_id">Select Country</label>
                <select name="country_id" id="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="state_id">Select State</label>
                <select name="state_id" id="state_id" class="form-control">
                    <!-- State options will be dynamically loaded based on the selected country -->
                </select>
            </div>

            <div class="form-group">
                <label for="district_name">District Name</label>
                <input type="text" name="district_name" id="district_name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#country_id').on('change', function () {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: '/get-statesanas/' + countryId, // Make sure the URL matches your route definition
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#state_id').empty();
                            $.each(data.states, function (key, value) {
                                $('#state_id').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state_id').empty();
                }
            });
        });
    </script>
@endsection
