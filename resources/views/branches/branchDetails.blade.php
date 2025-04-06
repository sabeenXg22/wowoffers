<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wow Offers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet">
        <link rel="icon" href="webimg/icon.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-4">
        <div class="container">
            <a class="navbar-brand logo" href="#">Wow Offers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients">Clients</a>
                    </li>
                </ul>
                <div class="col-12 col-lg-3 mt-3 mt-lg-0">
                    <form class="d-flex">
                        <div class="input-group">
                            <input class="form-control px-4" type="search" placeholder="Search" aria-label="Search" />
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass search-icon"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <section class="my-5">
    <div class="bg-brand position-relative">
        <img src="{{ URL::to('storage/webimg/bg-brand.png')}}" alt="" class="img-fluid w-100 d-none d-sm-block" />
        <img src="{{ URL::to('storage/webimg/bg-brand1.png')}}" alt="" class="img-fluid w-100 d-sm-none d-block bg-brand1"/>

        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-xl-2 col-12"></div>
                <div class="col-sm-3 col-12">
                    <img src="{{ asset('storage/' . $branches->branch_logo) }}" alt="" class="img-fluid brand-img1" />
                </div>
                <div class="col-xl-7 col-sm-8 col-12 mt-sm-4">
                    <p class="brand-name brand-name1">{{ $branches->branch_name }}</p>  
                    <p class="brand-address">{{ $branches->branch_address }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-5 my-md-5">
            @foreach($offers as $offer)
            <div class="col-6 col-md-3 mt-3">
    <a href="#" 
       data-bs-toggle="modal" 
       data-bs-target="#offerModal" 
       data-offer-id="{{ $offer->id }}" 
       class="offer-image-link">
        @if ($offer->images->first())
            <img src="{{ asset('storage/' . $offer->images->first()->offer_image) }}" alt="" class="img-fluid border-sides">
        @endif
    </a>
    <p class="mt-2 branch-offer-date">
        {{ \Carbon\Carbon::parse($offer->offer_start_date)->format('d M') }} - 
        {{ \Carbon\Carbon::parse($offer->offer_end_date)->format('d M') }}
    </p>
</div>

            @endforeach
        </div>
    </div>
</section>

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


    <!-- section1-end -->

     <!-- footer-section-start -->
     <section>
      <div class="container-fluid p-1 p-sm-3 footer-background">
        <div class="bg-footer py-3 pt-md-4 pb-md-1">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 text-center pt-3">
                <p class="logo">Wow Offers</p>
              </div>

              <div class="col-lg-1 col-1 py-sm-4"></div>
              <div class="col-12 col-lg-3 col-sm-5 py-4 footer-logo1">
                <p class="footer-logo">
                  WowOffers <br />
                  INDIA
                </p>
                <p class="details my-1">
                  <span class="footer-info">Phone:</span> +91 9947009921
                </p>
                <p class="details">
                  <span class="footer-info">Email:</span> info@wowoffers.in
                </p>
              </div>
              <div class="col-12 col-lg-3 col-sm-5 py-4">
                <p class="f-head">Useful Links</p>
                <ul class="pl-0 f-list">
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Home</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#about"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >About Us</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Terms of Services</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Privacy Policy</a
                    >
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-3  py-lg-4 f-ourservices">
                <p class="f-head">Our Services</p>
                <ul class="pl-0 f-list">
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Advertisement</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Content Marketing</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >SEO</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Display Advertising</a
                    >
                  </li>
                  <li class="my-2">
                    <a href="#"
                      ><i class="footer-icon fa-solid fa-chevron-right p-2"></i
                      >Paid Advertising</a
                    >
                  </li>
                </ul>
              </div>
              <div class="col-lg-1 col-1 py-4"></div>
              <div class="footer-border mb-2"></div>
              <div class="col-12 col-md-6">
                <p class="footertext text-center text-md-left">
                  © 2024 Wowoffers All Rights Reserved
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </section>

    <!-- footer-section-end -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>

    <!-- Lightbox2 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css"
      rel="stylesheet"
    />

    <!-- Lightbox2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script>
  $(document).ready(function () {
    $('a[data-offer-id]').on('click', function() {
        var offerId = $(this).data('offer-id');
        $.ajax({
            url: '/updateOfferClickCount/' + offerId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    console.log('Click count updated successfully');
                } else {
                    console.log('Failed to update click count');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    });

    

    $('.offer-image-link').on('click', function(e) {
        e.preventDefault();
        const offerId = $(this).data('offer-id');
        window.location.href = `/offers/${offerId}`;

      
    });
});
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
</script>
  </body>
</html>
