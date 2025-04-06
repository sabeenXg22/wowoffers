<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Offers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Laravel CSRF token -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
     

         
</section>
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
    <script>
    $(document).ready(function () {
        const districtDropdown = $('#district-dropdown');
        const savedDistrictId = localStorage.getItem('selectedDistrict') || 0;

        // Fetch districts and populate the dropdown
        fetch('/get-districts/1')
            .then(response => response.json())
            .then(data => {
                data.forEach(district => {
                    districtDropdown.append(new Option(district.district_name, district.id));
                });

                // Set the saved district ID and trigger change if available
                districtDropdown.val(savedDistrictId).change();
            })
            .catch(error => console.error('Error fetching districts:', error));

        // Handle district selection change
        districtDropdown.on('change', function () {
            const selectedDistrictId = $(this).val();
            // alert(`Selected District ID: ${selectedDistrictId}`);
             // Alert district ID
            localStorage.setItem('selectedDistrict', selectedDistrictId); // Save selected district

            if (selectedDistrictId != 0) {
                fetchOffers(selectedDistrictId); // Fetch offers only for valid district
            } else {
                // clearOffers(); // Clear offers when district ID is 0
            }
        });

        // Fetch offers function
        function fetchOffers(districtId) {
            $.ajax({
                url: `/get-shops/${districtId}`,
                type: 'GET',
                success: function (data) {
                    displayOffers(data.Offer || []);
                },
                error: function (error) {
                    console.error('Error fetching shops:', error);
                    $('#shop-area').html('<div class="col-12 text-center"><p>Error fetching offers. Please try again.</p></div>');
                }
            });
        }

        // Display offers function
        function displayOffers(offers) {
            const shopArea = $('#shop-area');
            shopArea.empty(); // Clear the area before adding new offers

            if (offers.length > 0) {
                offers.forEach(offer => {
                    const offerImageUrl = `${window.location.origin}/storage/${offer.offer_image}`;
                    const startDate = new Date(offer.offer_start_date).toLocaleDateString();
                    const endDate = new Date(offer.offer_end_date).toLocaleDateString();

                    shopArea.append(`
                        <div class="col-6 col-lg-3 px-2">
                            <div class="card border-5 box-item">
                                <a href="#" data-offer-id="${offer.id}" class="offer-image-link">
                                    <img src="${offerImageUrl}" alt="${offer.offer_name}" class="img-fluid offer-image" />
                                    <div class="text-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end">
                                        <p class="branch-name m-0 ps-2">${offer.branch_name}</p>
                                        <p class="branch-address m-0 ps-2">${startDate} - ${endDate}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    `);
                });
            } else {
                shopArea.html('<div class="col-12 text-center"><p>No offers available for this district.</p></div>');
            }

            attachOfferClickHandlers(); // Reattach event handlers for new content
        }

        // Clear offers area
        function clearOffers() {
            $('#shop-area').html('<div class="col-12 text-center"><p>Please select a district to view offers.</p></div>');
        }

        // Offer click handler function
        function attachOfferClickHandlers() {
            $('.offer-image-link').on('click', function (e) {
                e.preventDefault();
                const offerId = $(this).data('offer-id');

                fetch(`/updateOfferClickCount/${offerId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ offerId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Click count updated successfully');
                    }
                    window.location.href = `/offers/${offerId}`;
                })
                .catch(error => console.error('Error updating click count:', error));
            });
        }

        // Load offers for saved district if it exists and is not 0
        if (savedDistrictId != 0) {
            fetchOffers(savedDistrictId);
        } else {
            clearOffers(); // Clear offers if no valid district is selected
        }
    });
</script>


</body>
</html>
