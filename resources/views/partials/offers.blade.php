
        @foreach ($offers as $offer)
    <div class="col-md-3 mb-3" style="cursor: pointer;">
        <div class="card offer-card" onclick="openOfferModal({{ $offer->id }});">
            <div class="card-body text-center">
                <div id="carousel{{ $offer->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($offer->images as $key => $image)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <img src="{{ URL::to('storage/' . $image->offer_image) }}" class="img-fluid rounded hover-shadow cursor" alt="" style="width: 100%;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel{{ $offer->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel{{ $offer->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
                <p class="mt-3"><strong>Start Date:</strong> {{ date('d-m-Y', strtotime($offer->offer_start_date)) }}</p>
                <p><strong>End Date:</strong> {{ date('d-m-Y', strtotime($offer->offer_end_date)) }}</p>

                <!-- Accessing branch_name through the relationship -->
                <p><strong>Branch Name:</strong> {{ $offer->offers->branch_name }}</p>
            </div>
        </div>
    </div>
@endforeach

  <div class=" col-6 col-lg-3 mix district1 px-2">
          <div  class="card border-5 mix box-item">
            <a href="webimg/offer1.jpg" data-lightbox="gallery" data-title="offer">
              <img src="webimg/offer1.jpg" alt="" class="img-fluid" />
            </a>
          </div>
        </div>



        
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
              background-size: 1px;
              background-color: red;
              cursor: pointer;
              position: absolute;
              top: 50%;
              width: auto;
              padding: 1px;
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

          
          </style>
          <!-- Slide-in Modal CSS -->


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
          