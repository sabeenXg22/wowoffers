<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country, State</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1></h1>

    <div class="row">
    <div class="col-md-4">
            <label for="countries">Select Country:</label>
            <div class="row" id="countryGrid">
                @foreach($countries as $country)
                    <div class="col-md-6 country-item" data-country-id="{{ $country->id }}">
                        <div class="card">
                            <div class="card-body">
                                {{ $country->country_name }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <label for="countries">Select Country:</label>
            <select class="form-control" name="countries" id="countries">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="states">Select State:</label>
            <select class="form-control" name="states" id="states" disabled>
                <option value="">Select State</option>
            </select>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Load countries
            // $.ajax({
            //     url: '/get-countries',
            //     type: 'GET',
            //     success: function(data) {
            //         $('#countries').empty();
            //         $('#countries').append('<option value="">Select Country</option>');
            //         $.each(data, function(key, value) {
            //             $('#countries').append('<option value="' + value.id + '">' + value.country_name + '</option>');
            //         });
            //     }
            // });

            // Handle change event for countries
            $('#countries').change(function() {
                var countryId = $(this).val();
                console.log('Selected Country ID:', countryId);

                if (countryId) {
                    // Enable the state dropdown
                    $('#states').prop('disabled', false);

                    // Load states based on the selected country
                    $.ajax({
                        url: '/get-states/' + countryId,
                        type: 'GET',
                        success: function(data) {
                            $('#states').empty();
                            $('#states').append('<option value="">Select State</option>');
                            $.each(data, function(key, value) {
                                $('#states').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                            });
                        },
                        error: function(error) {
                            console.error('Error loading states:', error);
                        }
                    });
                } else {
                    // If no country is selected, disable the state dropdown
                    $('#states').prop('disabled', true);
                }
            });
        });


         $(document).ready(function() {
        // Handle click event for countries
        $('.country-item').click(function() {
            var countryName = $(this).find('.card-body').text().trim();
            alert('Selected Country: ' + countryName);
           // var countryId = $(this).data('country-id');
            //console.log('Hovered over Country ID:', countryId);

            // Enable the state dropdown
            $('#stateDropdown').prop('disabled', false);

            // Load states based on the hovered country
            $.ajax({
                url: '/get-states/' + 1,
                type: 'GET',
                success: function(data) {
                    $('#stateDropdownMenu').empty();
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#stateDropdownMenu').append('<a class="dropdown-item" href="#">' + value.state_name + '</a>');
                        });
                    } else {
                        $('#stateDropdownMenu').append('<a class="dropdown-item" href="#">No states available</a>');
                    }
                },
                error: function(error) {
                    console.error('Error loading states:', error);
                }
            });
            
        });

        // Handle mouse enter event for countries
        $('.country-item').mouseenter(function() {
            var countryId = $(this).data('country-id');
            console.log('Hovered over Country ID:', countryId);

            // Enable the state dropdown
            $('#stateDropdown').prop('disabled', false);

            // Load states based on the hovered country
            $.ajax({
                url: '/get-states/' + countryId,
                type: 'GET',
                success: function(data) {
                    $('#stateDropdownMenu').empty();
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#stateDropdownMenu').append('<a class="dropdown-item" href="#">' + value.state_name + '</a>');
                        });
                    } else {
                        $('#stateDropdownMenu').append('<a class="dropdown-item" href="#">No states available</a>');
                    }
                },
                error: function(error) {
                    console.error('Error loading states:', error);
                }
            });
        });
    });
    </script>
</body>
</html>
