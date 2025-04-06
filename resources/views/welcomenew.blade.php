<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow Offers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     
    <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" href="{{ URL::to('storage/webimg/icon.jpg')}}" type="image/x-icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- google-font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<!-- lightbox -->
<link
href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css"
rel="stylesheet"
/>
</head>
<body>

   <!-- navbar-start -->
   <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand logo" href="{{ route('home') }}">Wow Offers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-lg-auto me-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>                </li>
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
            <div class="col-12 col-lg-3 mt-3 mt-lg-0"> <!-- Adjusted margin for better spacing -->
            <form id="search-form" class="d-flex" method="GET">
                <div class="input-group">
                    <input class="form-control px-4" type="search" name="query" placeholder="Search" aria-label="Search" id="search-query">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass search-icon"></i></span>
                </div>
            </form>
            </div>
        </div>
    </div>
</nav>

<!-- navbar-end -->
<!--  banner-img-start -->
<section>
    
                <!-- Carousel start -->
                <div id="bannerCarousel" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/portfolio/wow.jpeg" class="d-block w-100" alt="Banner 1">
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="assets/img/portfolio/demo1.jpg" class="d-block w-100" alt="Banner 2">
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Carousel end -->
         
</section>



<!--  banner-img-end -->
<!-- <div class="section-title">

<p>Please Select Your Districts </p>
</div>
<div id="district-area" class="p-3">

</div> -->





<!-- JavaScript for Dynamic Dropdowns -->

<script>
  // Function to add event listeners to offer image links
  function attachOfferClickHandlers() {
    document.querySelectorAll('.offer-image-link').forEach(link => {
      link.addEventListener('click', function(event) {
        console.log('Offer image link clicked!');
        event.preventDefault(); // Prevent the default link behavior
        const offerId = this.getAttribute('data-offer-id');
        
        // Send AJAX request to update the click count
        fetch(`/updateOfferClickCount/${offerId}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For Laravel CSRF protection
          },
          body: JSON.stringify({ offerId })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Handle success response if needed
          } else {
            // Handle failure response if needed
          }
          // Redirect to the image URL if required
          window.location.href = this.href;
        })
        .catch(error => {
          console.error('Error:', error);
        });
      });
    });
  }

  $(document).ready(function () {
    // Initial call to attach handlers
    attachOfferClickHandlers();

    // Fetch districts when the document is ready
    fetch('/get-districts/1')
      .then(response => response.json())
      .then(data => {
       
        const districtDropdown = $('#district-dropdown');
    
    data.forEach(district => {
      districtDropdown.append(new Option(district.district_name, district.id));
    });
     // Trigger offer loading based on the selected district
     districtDropdown.on('change', function() {
      const selectedDistrictId = $(this).val();
      fetchOffers(selectedDistrictId);
    });

        // Trigger the function to load data by default with districtId 0
        // console.log('Triggering click event for default loading with districtId 0.');
        // fetchOffers(0);
      })
      .catch(error => console.error('Error fetching districts:', error));
  });
  function fetchOffers(districtId) {
       $.ajax({
    url: `/get-shops/${districtId}`,
    type: 'GET',
    success: function(data) {
      console.log('Data received:', data);
      let htmlContent = '';

          if (data.Offer && data.Offer.length > 0) {
                      data.Offer.forEach(offer => 
                            {
                              if (offer.offer_image !== '') {
                                    let offerImageUrl = `${window.location.origin}/storage/${offer.offer_image}`;
                                
                                    // Format dates
                                    let startDate = new Date(offer.offer_start_date);
                                    let endDate = new Date(offer.offer_end_date);
                                
                                    // Format date strings
                                    let startDateString = startDate.toLocaleDateString(); // Default locale format
                                    let endDateString = endDate.toLocaleDateString(); // Default locale format
                                
                                        htmlContent += `
                                        <div class="col-6 col-lg-3 mix district1 px-2">
                                          <div class="card border-5 mix box-item">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#offerModal" data-offer-id="${offer.id}" class="offer-image-link">
                                              <img src="${offerImageUrl}" alt="${offer.offer_name}" class="img-fluid offer-image" />
                                              <div class="text-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end">
                                                <p class="branch-name m-0 ps-2">${offer.branch_name}</p>
                                                <p class="branch-address m-0 ps-2">${startDateString} - ${endDateString}</p>
                                              </div>
                                            </a>
                                          </div>
                                        </div>`;
                                  }
                        });
              }
                else {
                htmlContent = `
                  <div class="col-12 text-center">
                    <p>No offers to show.</p>
                  </div>`;
              }

          $('#shop-area').html(htmlContent);
          // Reattach handlers after adding new content
          $('html, body').animate({
                    scrollTop: $('#district-all-shops').offset().top
                  }, 1000);
          attachOfferClickHandlers();
        },
        error: function(error) {
          console.error('Error fetching shops:', error);
          alert('There was an issue fetching the shops. Please try again later.');
        }
    });
}

function attachOfferClickHandlers() {
  $('.offer-image-link').on('click', function(e) {
    e.preventDefault();
        const offerId = $(this).data('offer-id');
        window.location.href = `/offers/${offerId}`;

    // $.ajax({
    //   url: `/get-offers-by-id-ajax/${offerId}`,
    //   type: 'GET',
    //   success: function(data) {
    //     console.log('Images data:', data);
    //     let carouselInner = $('#carouselImages');
    //     carouselInner.empty(); // Clear previous images

    //     if (data.images && data.images.length > 0) {
    //       data.images.forEach((image, index) => {
    //         const activeClass = index === 0 ? 'active' : '';
    //         let imageUrl = `${window.location.origin}/storage/${image.offer_image}`;

    //         carouselInner.append(`
    //           <div class="carousel-item ${activeClass}">
    //             <div class="zoom-container">
    //               <div class="zoom-image" style="background-image: url('${imageUrl}');"></div>
    //             </div>
    //           </div>`);
    //       });

    //       enableZoomEffect();
    //     } else {
    //       carouselInner.html('<p>No images available for this offer.</p>');
    //     }
    //   },
    //   error: function(error) {
    //     console.error('Error fetching offer images:', error);
    //   }
    // });
  });
}

// Enable zoom effect on modal images
function enableZoomEffect() {
  $('.zoom-container').on('mousemove', function(e) {
    const zoomLevel = 2; // Adjust this for more/less zoom
    const zoomImage = $(this).find('.zoom-image');
    const offset = $(this).offset();
    const xPos = e.pageX - offset.left;
    const yPos = e.pageY - offset.top;
    const width = $(this).width();
    const height = $(this).height();

    const backgroundPosX = (xPos / width) * 100;
    const backgroundPosY = (yPos / height) * 100;

    zoomImage.css({
      'background-size': `${zoomLevel * 100}%`,
      'background-position': `${backgroundPosX}% ${backgroundPosY}%`
    });
  });

  $('.zoom-container').on('mouseleave', function() {
    $(this).find('.zoom-image').css({
      'background-size': '100%',
      'background-position': 'center'
    });
  });
}

const params = new URLSearchParams(window.location.search);
    const query = params.get('query');

    if (query) {

        fetch(`/search-offers?query=${encodeURIComponent(query)}`, {
            method: 'GET', // Use GET if that's how your route is set up
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token if required
            },
        })
        .then(response => response.json())
        .then(data => {
            // Handle and display the search results
            console.log(data); // You can replace this with code to display results in the UI
            let htmlContent = '';

              if (data.Offer && data.Offer.length > 0) {
                  data.Offer.forEach(offer => {
                    if (offer.offer_image !== '') {
                      let offerImageUrl = `${window.location.origin}/storage/${offer.offer_image}`;
                        
                        // Format dates
                        let startDate = new Date(offer.offer_start_date);
                        let endDate = new Date(offer.offer_end_date);
                        
                        // Format date strings
                        let startDateString = startDate.toLocaleDateString(); // Default locale format
                        let endDateString = endDate.toLocaleDateString(); // Default locale format
                        
                        htmlContent += `
                  <div class="col-6 col-lg-3 mix district1 px-2">
                    <div class="card border-5 mix box-item">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#offerModal" data-offer-id="${offer.id}" class="offer-image-link">
                        <img src="${offerImageUrl}" alt="${offer.offer_name}" class="img-fluid offer-image" />
                        <div class="text-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end">
                          <p class="branch-name m-0 ps-2">${offer.branch_name}</p>
                          <p class="branch-address m-0 ps-2">${startDateString} - ${endDateString}</p>
                        </div>
                      </a>
                    </div>
                  </div>`;
                }
                });
              }
              else {
                htmlContent = `
                  <div class="col-12 text-center">
                    <p>No offers to show.</p>
                  </div>`;
              }

              $('#shop-area').html(htmlContent);
          // Reattach handlers after adding new content
          $('html, body').animate({
                    scrollTop: $('#district-all-shops').offset().top
                  }, 1000);
          attachOfferClickHandlers();
            })
            .catch(error => {
                console.error('Error:', error);
            });
       
      }
</script>

<script>
    document.getElementById('search-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        const query = document.getElementById('search-query').value;

        // Redirect to the home page and append the search query
        window.location.href = `{{ route('home') }}?query=${encodeURIComponent(query)}`;
    });
</script>



    <section>

      <div class="container mb-5" data-aos="fade-up">

        <!-- <div class="section-title"> -->
          <!-- <h2>Portfolio</h2> -->
          <!-- <p>Check out our District wise Offers</p> -->
        <!-- </div> -->

        <!-- <div id="shop-area-1" class="p-3">

        </div> -->
        <!-- <div id="branch-area" class="p-3">

        </div> -->

<!-- select-your-district-start -->
<section class="filter">
    <div class="container py-5 container1">
        <div class="row">
          <select id="district-dropdown" class="form-select">
              <option value="0" selected>Select a District</option>
          </select>         
        </div>

        <section id="district-all-shops" > 
          <!-- <div class="container" data-aos="fade-up">
            <div class="section-title">
              <p>Check out our District wise Offers</p>
            </div> -->
            <!-- District buttons will be added here dynamically using JavaScript -->
            <!-- <div id="district-area" class="p-3"></div> -->
            <!-- This is the area for displaying shops -->
            <!-- <div  class="p-3"></div> -->
          <!-- </div> -->
        </section>

          
          
          
          
  
      <!-- Carousel and Modal HTML Structure -->
      <div id="shop-area" class="row g-2 box-list mt-5">
      </div>
    </div>
  </section>
<!-- select-your-district-start -->

    
<!-- about-us-start -->
<section id="about">
    <div class="container">
        <div class="row  my-xl-5">
            <div class="col-md-7 about">
                <p class="abt-head1">About Us</p>
                <p class="abt-head2">Welcome to Wowoffers</p>
                <p class="abt-head3">Where Savings Meet Convenience!</p>
                <p class="abt-para"><span class="abt-para-first-word">At Wowoffers,</span> we believe in making every purchase a delightful experience, offering you more than just products – we bring you a world of savings and exclusive deals. Our mission is to simplify your shopping journey, ensuring you never miss out on incredible offers.</p>
            </div>
            <div class="col-md-5">
                <img src="assets/img/abt-us.png" alt="about-us" class="img-fluid abt-img">
            </div>
        </div>
    </div>
</section>
<!-- about-us-end -->

<!-- who-we-are-start -->
<section>
    <div class="container">
        <div class="row my-3 py-4">
            <div class="col-12 bg-who-we-are">
                <p class="who-we-are">Who we are</p>
                <p class="who-we-are-para">Wowoffers.in is a passionate team of deal enthusiasts dedicated to curating the best discounts and promotions across a wide range of categories. We understand the thrill of finding a great deal, and we're here to make that excitement a daily occurrence for you.</p>

            </div>
        </div>
    </div>
</section>
<!-- who-we-are-end -->

<!-- our-vision-start -->
<section>
    <div class="container">
        <div class="row py-4 my-5">
            <div class="col-md-6">
                <img src="assets/img/our-vision.png" alt="our-vision" class="img-fluid our-vision-img">
            </div>
            <div class="col-md-6 our-vision-center">
                <p class="our-vision-head">Our Vision</p>
                <p class="our-vision-para">Our vision is simple – to be your go-to destination for unbeatable offers and deals. We aspire to create a community of savvy shoppers who value quality products without compromising their budget. With a commitment to transparency and reliability, we strive to be the trusted bridge between you and incredible savings.</p>

            </div>
        </div>
    </div>
</section>
<!-- our-vision-start -->

       
       
       

<!-- check-out-our-shop-start -->
<section id="clients">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
            <p class="district-names check-shop">Check out our Shops</p>

            </div>
        </div>
        <div class="row">

        @foreach($shop as $sho)
            <div class=" col-md-2 col-6 d-flex justify-content-center" onclick="window.location='{{ URL::to('shopDetailsForCommon/'.$sho->id) }}';">
               <img  src="{{ URL::to('storage/'.$sho->shop_logo) }}" alt="nesto" class="img-fluid shop-image py-2"> 
            </div>
              @endforeach
          
        </div>
        
    </div>
</section>
<!-- check-out-our-shop-end -->


<!-- contact-us-start -->
<section id="contactus">
    <div class="container">
        <div class="row my-5">
            <div class="col-12 bg-contact-us text-center">
                <p class="contact-us-head">Let’s discuss on <br>something together</p>
                <div class="d-sm-flex justify-content-center pt-lg-3 pt-2"> <!-- Center horizontally -->
                    <p class="me-sm-4 contact-info">info@wowoffers.in</p> <!-- Added margin-right -->
                    <p class="contact-info">+91 9947009921</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact-us-start -->


<!-- footer-section-start -->
<section>
    <div class="container-fluid p-1 p-sm-3">
        <div class=" bg-footer py-3 pt-md-4 pb-md-1">
        <div class="container px-0">
        <div class="row  justify-content-center">

            <div class="col-12 text-center pt-3">
                <p class="logo">Wow Offers</p>
            </div>
            
            <div class="col-lg-1 col-1 py-sm-4"></div>
            <div class="col-12 col-lg-3 col-5 py-4 footer-logo1">
                <p class="footer-logo">WowOffers <br> INDIA</p>
                <p class="details my-1"><span class="footer-info">Phone:</span> +91 9947009921</p>
                <p class="details"><span class="footer-info">Email:</span> info@wowoffers.in</p>
            </div>
            <div class="col-12 col-lg-3 col-5  py-4">
                <p class="f-head">Useful Links</p>
                <ul class="pl-0 f-list">
                    <li class="my-2"><a href="#"><i class=" footer-icon fa-solid fa-chevron-right p-2"></i>Home</a></li>
                    <li class="my-2"><a href="#about"><i class="footer-icon  fa-solid fa-chevron-right p-2"></i>About Us</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Terms of Services</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3 col-12 py-lg-4 f-ourservices">
                <p class="f-head">Our Services</p>
                <ul class="pl-0 f-list">
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Advertisement</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Content Marketing</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>SEO</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Display Advertising</a></li>
                    <li class="my-2"><a href="#"><i class="footer-icon fa-solid fa-chevron-right p-2"></i>Paid Advertising</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-1 py-4"></div>
<div class="footer-border mb-2"></div>
<div class="col-12 col-md-6">
    <p class="footertext text-center text-md-left">© 2024 Wowoffers All Rights Reserved</p>
</div>
            </div>
        </div>
        </div>
        </div>
    <!-- </div> -->
</section>

<!-- footer-section-end -->

<!-- Modal -->
<!-- <div class="modal fade" id="offerModal" tabindex="-1" aria-labelledby="offerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="offerModalLabel">Offer Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="offerCarousel" class="carousel slide">
          <div class="carousel-inner" id="carouselImages">
         
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#offerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#offerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>

<script>
  $(document).ready(function () {
    var mixer = mixitup(".box-list");
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log(document.querySelectorAll('.offer-image-link'));
    var items = document.querySelectorAll('.box-menu ul li');
    items.forEach(function(item) {
        item.addEventListener('click', function() {
            items.forEach(i => i.classList.remove('mixitup-control-active'));
            item.classList.add('mixitup-control-active');
        });
    });

 });


</script>
<!-- Lightbox2 CSS -->
<link
href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css"
rel="stylesheet"
/>

<!-- Lightbox2 JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>