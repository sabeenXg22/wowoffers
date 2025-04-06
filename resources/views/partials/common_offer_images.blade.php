@foreach ($images as $image)
    <div class="mySlides">              
        <img src="{{ asset('storage/' . $image->offer_image) }}" class="modal-image">
    </div>
@endforeach


