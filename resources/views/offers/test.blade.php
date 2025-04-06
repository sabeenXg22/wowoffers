<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .offer-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .offer-card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0, 0, 5, 0.1);
    }
  </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wow-Offers</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>
  @extends('layouts.header')

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Branch Offers List</h2>
          <ol>
            <!-- <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
            <li>Portfolio Details</li> -->
          </ol>
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
                <div class="swiper-slide">
                  <img src="{{ URL::to('storage/'.$branches->branch_logo) }}" class="img-fluid rounded hover-shadow cursor" alt="" style="width: 100%;">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="portfolio-info">
              <!-- <td>Name:{{ $branches->branch_name }}</td> -->
              <td><strong>Name :</strong>{{ $branches->branch_name }}</td></br>
              <td><strong>Location :</strong>{{ $branches->location }}</td>
              <!-- <ul>    
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul> -->
            </div>
            <!-- <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div> -->
          </div>




          <div class="row">
            @foreach ($offers as $offer)
            <div class="col-md-3 mb-3" style="cursor: pointer;">
              <div class="card offer-card" onclick="openOfferModal({{ $offer->id }});">
                <div class="card-body text-center">
                  @foreach ($offer->images as $key => $image)
                  <img src="{{  URL::to('storage/' . $image->offer_image) }}" class="img-fluid rounded hover-shadow cursor" alt="" style="width: 100%;">
                  @if ($key == 0)
                  @break
                  @endif
                  @endforeach
                  <p class="mt-3"><strong>Offer Name:</strong> {{ ($offer->offer_name) }}</p>
                  <p class="mt-3"><strong>Start Date:</strong> {{ date('d-m-Y', strtotime($offer->offer_start_date)) }}</p>
                  <p><strong>End Date:</strong> {{ date('d-m-Y', strtotime($offer->offer_end_date)) }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- Slide-in Modal HTML -->
          <div id="myModal" class="modal" data-offer-id="">
            <span class="close" onclick="closeModal()">&#10006;</span>
            <div class="modal-content" id="modal-content-area">
              <!-- Images will be dynamically loaded here using AJAX -->
              <!-- ... -->
              <!-- Slider navigation buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
          </div>



          <!-- Slide-in Modal CSS -->
          <style>
            .modal {
              display: none;
              position: fixed;
              z-index: 1;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: rgb(0, 0, 0);
              background-color: rgba(0, 0, 0, 0.9);
            }

            .modal-content {
              position: relative;
              margin: auto;
              display: flex;
              justify-content: center;
              align-items: center;
              flex-wrap: nowrap;
            }

            .mySlides {
              display: none;
            }

            .modal-image {
              width: 400px;
              /* Set your fixed width here */
              height: auto;
            }

            .prev,
            .next {
              cursor: pointer;
              position: absolute;
              top: 50%;
              width: auto;
              padding: 16px;
              margin-top: -22px;
              color: white;
              font-weight: bold;
              font-size: 50px;
              transition: 0.6s ease;
              border-radius: 5 5px 3px 0;
              user-select: none;
            }

            .prev {
              left: 0;
              border-radius: 3px 0 0 3px;
            }

            .next {
              right: 0;
              border-radius: 3px 0 0 3px;
            }

            .prev:hover,
            .next:hover {
              background-color: rgba(0, 0, 0, 0.8);
            }

            .close {
              position: absolute;
              top: 50px;
              right: 35px;
              font-size: 40px;
              color: white;
              z-index: 1;
              cursor: pointer;
            }
          </style>
          <!-- Slide-in Modal CSS -->


          <!-- Slide-in Modal JavaScript -->
          <script>
            // Declare the variable in the global scope
            var slideIndex = 1;

            // Function to open the modal
            function openModal(offerId) {
              // Set the offerId in the modal data attribute
              document.getElementById('myModal').setAttribute('data-offer-id', offerId);

              // Fetch offer images using AJAX
              fetchOfferImages(offerId);

              // Display the modal
              document.getElementById('myModal').style.display = 'flex';
              currentSlide(1);
            }

            function fetchOfferImages(offerId) {
              
              $.ajax({
                url: '/get-offers-by-id-ajax/' + offerId,
                type: 'GET',
                
                success: function(data) {
                  // Update the content of the modal with the loaded data
                  $('#modal-content-area').html(data);

                  // Call showSlides after the content is loaded
                  showSlides(1);
                },
                error: function(error) {
                  console.error('Error fetching offer images:', error);
                }
              });
            }


            function updateModalContent(data) {
              // Clear existing slides
              var modalContent = document.querySelector('.modal-content');
              modalContent.innerHTML = '';

              // Add new slides based on fetched data
              for (var i = 0; i < data.length; i++) {
                var slide = document.createElement('div');
                slide.className = 'mySlides';
                var img = document.createElement('img');
                img.src = data[i].offer_image;
                img.className = 'modal-image';
                slide.appendChild(img);
                modalContent.appendChild(slide);
              }

              // Add slider navigation buttons
              var prevButton = document.createElement('a');
              prevButton.className = 'prev';
              prevButton.onclick = function() {
                plusSlides(-1);
              };
              prevButton.innerHTML = '&#10094;';
              modalContent.appendChild(prevButton);

              var nextButton = document.createElement('a');
              nextButton.className = 'next';
              nextButton.onclick = function() {
                plusSlides(1);
              };
              nextButton.innerHTML = '&#10095;';
              modalContent.appendChild(nextButton);
            }
            // Function to close the modal
            function closeModal() {
              document.getElementById('myModal').style.display = 'none';
            }

            // Function to navigate to the next or previous slide
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            // Function to display a specific slide
            function currentSlide(n) {
              // alert("sadhu");
              //showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var slides = document.getElementsByClassName('mySlides');

              if (!slides || slides.length === 0) {
                console.error('No slides found.');
                return;
              }

              slideIndex = (n > slides.length) ? 1 : (n < 1) ? slides.length : n;

              for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
              }

              if (slides[slideIndex - 1]) {
                slides[slideIndex - 1].style.display = 'block';
              } else {
                console.error('Invalid slide index:', slideIndex);
              }
            }

            // Function to open modal and set initial slide
            function openOfferModal(offerId) {
              // Ensure offerId is a valid number
              if (!isNaN(offerId)) {
                // Set slideIndex based on the offerId or adjust as needed
                slideIndex = offerId;
                openModal(offerId);
                currentSlide(slideIndex);
              }
            }
          </script>
          <br></br>









        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
















  <!-- *************************************** -->

  <style>
    .mySlides {
      display: none;
    }
  </style>





  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>








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
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>