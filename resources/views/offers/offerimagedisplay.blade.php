<!-- resources/views/offerdisplay.blade.php -->

@foreach ($offers as $offer)
    <div>
        <h2>{{ $offer->offer_name }}</h2>
        <p>Offer Code: {{ $offer->offer_code }}</p>
        <p>Start Date: {{ $offer->offer_start_date }}</p>
        <p>End Date: {{ $offer->offer_end_date }}</p>

        <!-- Display offer images -->
        <div class="image-gallery">
            @foreach ($offer->images as $key => $image)
                <img src="{{ asset('storage/' . $image->offer_image) }}" onload="openModal();currentSlide({{ $key + 1 }})" class="hover-shadow cursor">
            @endforeach
        </div>
    </div>
@endforeach

<!-- Slide-in Modal HTML -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        @foreach ($offers as $offer)
            @foreach ($offer->images as $key => $image)
                <div class="mySlides">
                    <img src="{{ asset('storage/' . $image->offer_image) }}" class="modal-image">
                </div>
            @endforeach
        @endforeach

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
        width: 400px; /* Set your fixed width here */
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
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
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
        top: 15px;
        right: 35px;
        font-size: 40px;
        color: white;
        z-index: 1;
        cursor: pointer;
    }
</style>

<!-- Slide-in Modal JavaScript -->
<script>
    // Open the modal
    function openModal() {
        document.getElementById('myModal').style.display = 'flex';
    }

    // Close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    // Show slides
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName('mySlides');
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }
        slides[slideIndex - 1].style.display = 'block';
    }
</script>
