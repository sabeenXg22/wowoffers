<!-- @foreach ($images as $image)
    <div class="mySlides">              
        <img src="{{ asset('storage/' . $image->offer_image) }}" class="modal-image">
    </div>
@endforeach -->


<!-- Update your modal content area -->
<div class="modal-content" id="modal-content-area">
    @foreach ($images as $image)
        <div class="mySlides">
            <img src="{{ asset('storage/' . $image->offer_image) }}" class="modal-image">
        </div>
    @endforeach

    <!-- Slider navigation buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- Slide-in Modal JavaScript -->
<script>
    // Update the modal content based on the fetched data
    function updateModalContent(data) {
        // Clear existing slides
        var modalContent = document.querySelector('.modal-content');
        modalContent.innerHTML = data;

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
                updateModalContent(data);

                // Call showSlides after the content is loaded
                showSlides(1);
            },
            error: function(error) {
                console.error('Error fetching offer images:', error);
            }
        });
    }
    
    // ... (rest of your existing JavaScript code)
</script>
