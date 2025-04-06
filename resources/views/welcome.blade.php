<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Offers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Laravel CSRF token -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-48GLS2BD5Z"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-48GLS2BD5Z');
  </script>
   <!-- Google tag ends (gtag.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
    <style>
        /* Set a larger image height */
        .offer-image {
            width: 100%;
            max-height: 350px;
            /* Increase the height as needed */
            object-fit: cover;
        }

        /* Make text smaller */
        .offer-details p {
            font-size: 0.85rem;
            /* Smaller text size */
            margin: 0;
            /* Remove extra margins */
            line-height: 1.2;
        }

        /* Optional: Reduce padding in offer-details to make card more compact */
        .offer-details {
            padding: 0.4rem;
            /* Adjust padding to reduce overall card height */
        }
    </style>
</head>

<body>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand logo" href="{{ route('home') }}">Wow Offers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contactus">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#clients">Clients</a>
                    </li>
                </ul>
                <div class="col-12 col-lg-3 mt-3 mt-lg-0">
                    <form id="search-form" class="d-flex" method="GET">
                        <div class="input-group">
                            <input class="form-control px-4" type="search" name="query" placeholder="Search" id="search-query">
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass search-icon"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <section class="filter">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <select id="district-dropdown" class="form-select">
                        <option value="0" selected>Select a District</option>
                    </select>
                </div>
            </div>

            <section id="district-all-shops" class="mt-4">
                <div id="shop-area" class="row g-2"></div>
            </section>
        </div>
    </section>

    <!-- Check-out-our-shop Section -->
    <section id="clients">
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <p class="district-names check-shop">Check out our Shops</p>
                </div>
            </div>
            <div class="row">
                @foreach($shop as $sho)
                <div class="col-md-3 clo-sm-3 col-6 d-flex justify-content-center shop-item"
                    onclick="window.location='{{ URL::to('shopDetailsForCommon/'.$sho->id) }}';">
                    <img src="{{ URL::to('storage/'.$sho->shop_logo) }}" alt="nesto" class="img-fluid shop-image py-2">
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Footer Section -->
    <section>
        <div class="container-fluid p-1 p-sm-3">
            <div class="bg-footer py-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center pt-3">
                            <p class="logo">Wow Offers</p>
                        </div>
                        <div class="col-lg-3 col-5 py-4">
                            <p class="footer-logo">WowOffers INDIA</p>
                            <p class="details"><span class="footer-info">Phone:</span> +91 9947009921</p>
                            <p class="details"><span class="footer-info">Email:</span> info@wowoffers.in</p>
                        </div>
                        <div class="col-lg-3 col-5 py-4">
                            <p class="f-head">Useful Links</p>
                            <ul class="f-list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#">Terms of Services</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-border mb-2"></div>
                    <div class="col-12">
                        <p class="footertext text-center">© 2024 WowOffers All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            const districtDropdown = $('#district-dropdown');
            const query = new URLSearchParams(window.location.search).get('query');

            // Fetch districts and populate dropdown
            fetch('/get-districts/1')
                .then(response => response.json())
                .then(data => {
                    data.forEach(district => {
                        districtDropdown.append(new Option(district.district_name, district.id));
                    });

                    // Set the dropdown value to the saved district ID from localStorage
                    const savedDistrictId = localStorage.getItem('selectedDistrict');
                    if (savedDistrictId) {
                        districtDropdown.val(savedDistrictId); // Set the dropdown to the saved value
                        if (savedDistrictId != 0) {
                            fetchOffersByDistrict(savedDistrictId); // Fetch offers for the selected district
                        }
                    }
                });

            // Search or load district-based shops
            if (query) {
                fetchOffersBySearch(query);
            }

            // Event listener for the search form submission
            $('#search-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                const searchQuery = $('#search-query').val();
                if (searchQuery) {
                    fetchOffersBySearch(searchQuery);
                }
            });

            districtDropdown.on('change', function() {
                const selectedDistrictId = $(this).val();
                localStorage.setItem('selectedDistrict', selectedDistrictId);
                if (selectedDistrictId != 0) {
                    fetchOffersByDistrict(selectedDistrictId);
                }
            });

            function fetchOffersBySearch(query) {
                fetch(`/search-offers?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => displayOffers(data.Offer || []))
                    .catch(error => console.error('Error:', error));
            }

            function fetchOffersByDistrict(districtId) {
                fetch(`/get-shops/${districtId}`)
                    .then(response => response.json())
                    .then(data => displayOffers(data.Offer || []))
                    .catch(error => console.error('Error:', error));
            }

            function displayOffers(offers) {
                const shopArea = $('#shop-area');
                shopArea.empty();
                if (offers.length > 0) {
                    offers.forEach(offer => {
                        const offerImageUrl = `${window.location.origin}/storage/${offer.offer_image}`;
                        const startDate = new Date(offer.offer_start_date).toLocaleDateString();
                        const endDate = new Date(offer.offer_end_date).toLocaleDateString();
                        shopArea.append(`
                          <div class="col-6 col-lg-3 px-2">
    <div class="card border-3 box-item h-100">
        <a href="/offers/${offer.id}" class="d-flex flex-column h-100 text-decoration-none">
            <img src="${offerImageUrl}" alt="${offer.offer_name}" class="img-fluid offer-image">
            <div class="offer-details p-2">
                <p class="branch-name">${offer.branch_name}</p>
                <p class="offer-dates branch-offer-date mt-2">${startDate} - ${endDate}</p>
            </div>
        </a>
    </div>
</div>



                        `);
                    });
                } else {
                    shopArea.html('<div class="col-12 text-center"><p>No offers available.</p></div>');
                }
            }
        });
    </script>

</body>

</html>