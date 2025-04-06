<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <title>Document</title>
</head>
<style>
  .branch-card:hover {
    transform: scale(1.05);
    /* Increase the scale on hover */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Add a subtle box-shadow on hover */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    /* Smooth transition effect */
  }
</style>

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



    </div>
  </header>


  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Shop Details</h2>
          <!-- <ol>
        <li><a href="index.html">Home</a></li>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li>Portfolio Details</li>
      </ol> -->
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <!-- <div class="swiper-slide">
              <img src="../assets/img/portfolio/portfolio-1.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="../assets/img/portfolio/portfolio-2.jpg" alt="">
            </div> -->

                <div class="swiper-slide">
                  <td><img src="{{URL::to('storage/'.$shop->shop_logo) }}"> </td>
                </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <!-- <td>{{ $shop->shop_name }}</td> -->
              <ul>
                <li><strong>Shop Name</strong>: {{ $shop->shop_name }}</< /li>
                  <!-- <td><img src="{{URL::to($shop->shop_logo) }}" height="70px" width="70px"> </td> -->
                <li><strong>Details</strong>: {{ $shop->details }}</< /li>
                  <!-- <li><strong>Client</strong>: ASU Company</li> -->
                  <!-- <li><strong>Project date</strong>: 01 March, 2020</li>
            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
              </ul>
            </div>
            <!-- <div class="portfolio-description">
          <h2>This is an example of portfolio detail</h2>
          <p>
            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
          </p>
        </div> -->
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
    <div class="container" data-aos="fade-up">
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($sadhu as $offerd)

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <!--  -->
            <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
            <div class="portfolio-info">
              <p>HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH {{ $offerd->product_id }}</p>

            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>
  </main><!-- End #main -->

  <section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>Offers for all branches</strong></h4>

      <div class="row">
        @foreach($commonOffers as $commonOffer)
        <div class="col-lg-4 col-md-12 mb-4 branch-card" onclick="window.location='{{ URL::to('brancheDetails/'.$branch->id) }}';" style="cursor: pointer;">

          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
              <img src="{{ URL::to('storage/'.$commonOffer->branch_logo) }}" class="img-fluid rounded hover-shadow cursor" alt="" style="width: 100%;">
              <a href="#!">
                <div class="mask"></div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <td>{{ $branch->branch_name }}</td><br>
                <td>{{ $branch->location }}</td>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>Our Branches</strong></h4>

      <div class="row">
        @foreach($sadhuanas as $branch)
        <div class="col-lg-4 col-md-12 mb-4 branch-card" onclick="window.location='{{ URL::to('brancheDetails/'.$branch->id) }}';" style="cursor: pointer;">

          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
              <img src="{{ URL::to('storage/'.$branch->branch_logo) }}" class="img-fluid rounded hover-shadow cursor" alt="" style="width: 100%;">
              <a href="#!">
                <div class="mask"></div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <td>{{ $branch->branch_name }}</td><br>
                <td>{{ $branch->location }}</td>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
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
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Ninestars</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Ninestars</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer>

</body>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<!-- <script src="assets/js/main.js"></script> -->

</html>