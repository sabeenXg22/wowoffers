<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wow Offers</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> 
       <!-- favicon -->
    <link rel="icon" href="{{ URL::to('storage/webimg/icon.jpg')}}" type="image/x-icon">
        <!-- fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <!-- lightbox -->
    <link
      href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- navbar-start -->
    <nav class="navbar navbar-expand-lg navbar-light py-4">
      <div class="container">
        <a class="navbar-brand logo" href="/">Wow Offers</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-lg-auto me-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#contactus">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#clients">Clients</a>
            </li>
          </ul>
          <div class="col-12 col-lg-3 mt-3 mt-lg-0">
            <!-- Adjusted margin for better spacing -->
            <form class="d-flex">
              <div class="input-group">
                <input
                  class="form-control px-4"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                />
                <span class="input-group-text"
                  ><i class="fa-solid fa-magnifying-glass search-icon"></i
                ></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <!-- navbar-end -->
 


   <!-- Offer Images Display -->
<div class="container">
    <div class="container-fluid">
        <div class="row px-0 mx-0 mt-5 mb-5">
            <div class="col-12 col-lg-3"></div>

            <div class="col-12 col-lg-6">
                <!-- Loop through each offer image -->
                @foreach($offer->images as $image)
                    <img src="{{ asset('storage/' . $image->offer_image) }}" alt="{{ $offer->offer_name }}" class="img-fluid mb-3">
                    <p class="flyer-heading mt-2">
                        <!-- {{ $offer->offer_name }} -->
                         <!-- Dynamic offer name -->
                    </p>
                    <p class="flyer-para">
                        <!-- {{ $offer->offer_description }}  -->
                        <!-- Dynamic offer description -->
                    </p>
                @endforeach
            </div>

            <div class="col-12 col-lg-3"></div>
        </div>
    </div>
</div>
<!-- End Offer Images Display -->







    <!-- footer-section-start -->
    <section>
      <div class="container-fluid px-0 p-1 p-sm-3">
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

   
    <script>
    document.getElementById('search-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    const query = document.getElementById('search-query').value;

    // Redirect to the homepage with the search query as a URL parameter
    window.location.href = `/?query=${encodeURIComponent(query)}`;
});
</script>

      </script>
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
  </body>
</html>
