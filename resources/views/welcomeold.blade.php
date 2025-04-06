<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wow-Offers</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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


  <!-- Favicons -->
  <link href="assets/img/portfolio/icon.jpg" rel="icon">
  <link href="assets/img/portfolio/icon.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 767px) {
      #myCarousel img {
        width: 100%;
        /* Adjust the width for smaller screens */
        height: 200px;
        /* Set a fixed height for smaller screens */
      }
    }

    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) {
      #myCarousel img {
        width: 100%;
        /* Adjust the width for small screens */
        height: 300px;
        /* Set a fixed height for small screens */
      }
    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) {
      #myCarousel img {
        width: 100%;
        /* Adjust the width for medium screens */
        height: 400px;
        /* Set a fixed height for medium screens */
      }
    }

    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
      #myCarousel img {
        width: 100%;
        /* Adjust the width for large screens */
        height: 500px;
        /* Set a fixed height for large screens */
      }
    }
  </style>

</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="/"><span>Wow Offers</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">

        <ul>

          <!-- <li><a class="getstarted scrollto" href="#portfolio">Get Started</a></li> -->
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="#clients">Clients</a></li>

          <li><a class="bi bi-search getstarted scrollto " href="/search"> &nbsp;Search</a></li>





          @if (Route::has('login'))

          @auth
          <?php
          $count = 0;
          if ($count == 0) {

          ?>


            <script type='text/javascript'>
              window.close();
              window.open("{{ route('shop.index') }}");
            </script>


          <?php
            $count == 1;
          }
          ?>
          @else
          <!-- <li> <a href="{{ route('login') }}">Login</a></li> -->

          @if (Route::has('register'))
          <!-- <a href="{{ route('register') }}">Register</a></li> -->
          @endif

          @endauth

          @endif





        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->



    </div>

  </header>



  <!-- ======= Header ======= -->


  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <br><br><br>


      <!-- <h2>Carousel Example</h2> -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <a href="" target="_blank">
              <img src="assets/img/portfolio/wow.jpeg" alt="" class="img-responsive">
            </a>
            <div class="carousel-caption">
              <!-- <h3>Los Angeles</h3>
                    <p>LA is always so much fun!</p> -->
            </div>
          </div>
          <div class="item">
            <img src="assets/img/portfolio/demo1.jpg" alt="" class="img-responsive">
            <div class="carousel-caption">
              <!-- <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p> -->
            </div>
          </div>


          <div class="item">
            <img src="assets/img/portfolio/wow.jpeg" alt="" class="img-responsive">
            <div class="carousel-caption">
              <!-- <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p> -->
            </div>
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  
    </form>


    <div class="section-title">

      <p>Please Select Your Districts </p>
    </div>
    <div id="district-area" class="p-3">

    </div>



    <!-- JavaScript for Dynamic Dropdowns -->

    <script>
  $(document).ready(function() {
    // Fetch districts when the document is ready
    fetch('/get-districts/1')
      .then(response => response.json())
      .then(data => {
        var distArea = document.getElementById('district-area');
        var htmlDist = "<div class='row'>";

        data.forEach(district => {
          htmlDist += "<div class='col-6 col-md-3 mb-3'><button type='button' class='btn btn-outline-secondary btn-lg district-link' data-district-id=" + district.id + ">" + district.district_name + "</button></div>";
        });

        htmlDist += "</div>";

        distArea.innerHTML = htmlDist;

        // Attach click event to district links
        $('.district-link').on('click', function(e) {
          e.preventDefault(); // Prevent default link behavior

          var districtId = $(this).data('district-id');

          // Make AJAX request to fetch shops for the selected district
          $.ajax({
            url: '/get-shops/' + districtId, // Replace with the correct URL based on your routes
            type: 'GET',
            success: function(data) {
              // Update the content of the page with the loaded shops
              $('#shop-area').html(data);
              // Scroll to the "Check out our District wise Offers" area
              $('html, body').animate({
                scrollTop: $('#district-all-shops').offset().top
              }, 1000);
            },
            error: function(error) {
              console.error('Error fetching shops:', error);
            }
          });
        });
      });
  });
</script>

    <!-- ======= Portfolio Section ======= -->
    <!-- test -->



    <section id="district-wise-offers" class="mt-5 p-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Common offers for Shops</h2> -->
          <p>Check out our Shops</p>
        </div>



        <div id="allshops-area" class="p-3">
          <!-- Shop cards will be added here dynamically using JavaScript -->
          @foreach($shop as $sho)
          <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center mb-3" onclick="window.location='{{ URL::to('shopDetailsForCommon/'.$sho->id) }}';" style="cursor: pointer;">

            <div class="card shadow p-4" style="height: 200px;">
              <img src="{{ URL::to('storage/'.$sho->shop_logo) }}" class="img-fluid m-3 mx-auto d-block" alt="" style="max-height: 100%; max-width: 100%;">
            </div>
          </div>
          @endforeach
        </div>




      </div>
    </section>

    <section id="district-all-shops" class="mt-5 p-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <p>Check out our District wise Offers</p>
    </div>
    <!-- District buttons will be added here dynamically using JavaScript -->
    <div id="district-area" class="p-3"></div>
    <!-- This is the area for displaying shops -->
    <div id="shop-area" class="p-3"></div>
  </div>
</section>

    <section>

      <div class="container mb-5" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Portfolio</h2> -->
          <!-- <p>Check out our District wise Offers</p> -->
        </div>

        <div id="shop-area-1" class="p-3">

        </div>
        <div id="branch-area" class="p-3">

        </div>



        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <br>
        </div>
      </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= About Section ======= -->
    <div id="about" class="mt-5 p-5">
      <div class="container mt-5">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h1 data-aos="fade-up"><strong>Welcome to Wowoffers - Where Savings Meet Convenience!</strong></h1>

            <h3 data-aos="fade-up" data-aos-delay="100">
              <strong>At Wowoffers</strong>, we believe in making every purchase a delightful experience, offering you more than just products – we bring you a world of savings and exclusive deals. Our mission is to simplify your shopping journey, ensuring you never miss out on incredible offers.
            </h3>

            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h1><strong>Who We Are</strong></h1>
                <h3>
                  <strong>Wowoffers.in is a passionate team of deal enthusiasts dedicated to curating the best discounts and promotions across a wide range of categories. We understand the thrill of finding a great deal, and we're here to make that excitement a daily occurrence for you.</strong>
                </h3>

              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h1><strong>Our Vision</strong></h1>
                <h3><strong>Our vision is simple – to be your go-to destination for unbeatable offers and deals. We aspire to create a community of savvy shoppers who value quality products without compromising their budget. With a commitment to transparency and reliability, we strive to be the trusted bridge between you and incredible savings.</strong></h3>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- End About Section -->


    <!-- ======= Team Section ======= -->
    <!-- End Team Section -->


    <style>
     body {
  font-family: Verdana, sans-serif;
  margin: 0;
}

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
/* .modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
} */

/* The Close Button */
.close {
  color: yellow; /* Change color to red */
  position: absolute;
  top: 120px;
  right: 25px;
  font-size: 34px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}

/* Next & previous buttons */


/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}



.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

    </style>







    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <!-- <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div> -->

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p style="color: black;">info@wowoffers.in</p>
              </div>

              <!-- <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p style="color: black;">+91 9947009921</p>
              </div> -->

              <div class="phone">
                <i class="bi bi-whatsapp"></i>
                <h4>WhatsApp:</h4>
                <p style="color: black;">+91 9947009921</p>
              </div>



              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
             -->
            </div>

          </div>
          <!-- 
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> -->

        </div>

      </div>
    </section><!-- End Contact Us Section -->




    <!-- ======= Clients Section ======= -->
    <!-- <section id="clients" class="clients section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
          <p>They trusted us</p>
        </div>

        <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>End Clients Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <!-- <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div> -->

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>WowOffers</h3>
              <!-- <p>
                A108 Adam Street <br>
                New York, NY 535022<br> -->
              INDIA <br><br>
              <strong>Phone:</strong> +91 9947009921<br>
              <strong>Email:</strong> info@wowoffers.in<br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>

                <li><i class="bx bx-chevron-right"></i> <a href="#">Advertisement</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Content marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">SEO</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Display advertising</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Paid advertising</a></li>
              </ul>
            </div>

            <!-- <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Social Networks</h4>
              <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div> -->

          </div>
        </div>
      </div>

      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span>wowoffers</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
          Designed by <a href="https://www.wowoffers.in/">WowOffers</a>
        </div>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>