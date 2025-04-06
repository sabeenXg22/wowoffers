<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wow-Offers</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    * {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @extends('layouts.header')<!-- End Header -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <br><br><br>



















    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Portfolio</h2> -->
          <p>Check out our Best Offers</p>
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

        <!-- Your search form -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form id="searchForm" class="example">
  <input type="text" placeholder="Search.."  id="query"  name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>




<!-- Display search results -->


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<h2>Branches</h2>
<div class="row" id="branchesList"></div>

<h2>Shops</h2>
<div class="row" id="shopsList"></div>

<h2>Districts</h2>
<div class="row" id="districtsList"></div>

<h2>States</h2>
<div class="row" id="statesList"></div>


<script>
    
    
    $(document).ready(function () {
        $("#searchForm").submit(function (e) {
            e.preventDefault();
            search();
        });
        // ...
        function displayResults(data) {
    $("#branchesList").empty();
    $("#shopsList").empty();
    $("#districtsList").empty();
    $("#statesList").empty();

    // Assuming you have a container with the ID 'listsContainer' to hold the grid
    var listsContainer = $("#listsContainer");

    // Create a Bootstrap row for each set of data
    listsContainer.append('<div class="row" id="branchesRow"></div>');
    listsContainer.append('<div class="row" id="shopsRow"></div>');
    listsContainer.append('<div class="row" id="districtsRow"></div>');
    listsContainer.append('<div class="row" id="statesRow"></div>');

    // Append data to the respective rows with line breaks
    $.each(data.branches, function (index, branch) {
        $("#branchesRow").append('<div class="col-lg-3 col-md-6"><li>' + branch.branch_name + ', ' + branch.location + '</li></div><br>');
    });

    $.each(data.shops, function (index, shop) {
        $("#shopsRow").append('<div class="col-lg-3 col-md-6"><li>' + shop.shop_name + ', ' + shop.location + '</li></div><br>');
    });

    $.each(data.districts, function (index, district) {
        $("#districtsRow").append('<div class="col-lg-3 col-md-6"><li>' + district.district_name + '</li></div><br>');
    });

    $.each(data.states, function (index, state) {
        $("#statesRow").append('<div class="col-lg-3 col-md-6"><li>' + state.state_name + '</li></div><br>');
    });
}

// ...


        function search() {
        var query = $("#query").val();

        $.ajax({
            url: '/search/result',
            type: 'GET',
            data: {query: query},
            success: function (data) {
                displayResults(data);
            }
        });

        // Additional AJAX request for branches
        $.ajax({
            url: '/search/branches',
            type: 'GET',
            data: {query: query},
            success: function (data) {
                displayBranchResults(data);
            }
        });

        // New AJAX request for branches with district
        var districtId = $("#districtId").val(); // Assume you have an input with id="districtId"
        $.ajax({
            url: '/search/branches-with-district',
            type: 'GET',
            data: {query: query, district_id: districtId},
            success: function (data) {
                displayBranchResults(data);
            }
        });
    }


        function displayResults(data) {
            $("#branchesList").empty();
            $("#shopsList").empty();
            $("#districtsList").empty();
            $("#statesList").empty();

            $.each(data.branches, function (index, branch) {
                $("#branchesList").append(
            '<div class="col-lg-4 col-md-12 mb-4 branch-card" onclick="window.location=\'{{ URL::to('brancheDetails/') }}' + '/' + branch.id + '\';" style="cursor: pointer;">' +
            '<div class="card">' +
            '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">' +
            '<img src="/storage/' + branch.branch_logo + '" class="w-100" style="height: 200px; object-fit: cover;">' +
            '<a href="#!">' +
            '<div class="mask"></div>' +
            '<div class="hover-overlay">' +
            '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>' +
            '</div>' +
            '</a>' +
            '</div>' +
            '<div class="card-body">' +
            '<a href="" class="text-reset">' +
            '<td>' + branch.branch_name + '</td><br>' +
            '<td>' + branch.location + '</td>' +
            '</a>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
            });

        //     $.each(data.shops, function (index, shop) {
                
        //         $("#shopsList").append(
        //     '<div class="col-lg-3 col-md-6 portfolio-item filter-app text-center" onclick="window.location=\'{{ URL::to('shopdetails/') }}' + '/' + shop.id + '\';" style="cursor: pointer;">' +
        //     '<div class="portfolio-wrap" style="height: 350px;">' +
        //     '<img src="' + shop.shop_logo + '" class="img-fluid rounded" alt="' + shop.shop_name + '">' +
        //     '<div class="portfolio-links"></div>' +
        //     '<div class="card-body"></div>' +
        //     '<div class="portfolio-info"></div>' +
        //     '</div>' +
        //     '</div><br>'
        // );

        //     });

            $.each(data.districts, function (index, district) {
                $("#districtsList").append('<li>' + district.district_name + '</li>');
            });

            $.each(data.states, function (index, state) {
                $("#statesList").append('<li>' + state.state_name + '</li>');
            });
        }
    });
</script>





      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= About Section ======= -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

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
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->




    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
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
    </section><!-- End Clients Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
    <div class="footer-newsletter">
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
                <li><i class="bx bx-ch-right"></i> <a href="#">Advertisement</a></li>
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