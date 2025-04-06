<!-- shops.blade.php -->

@foreach($shops as $shop)
  <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center" onclick="window.location='{{ URL::to('shopdetails/'.$shop->id) }}';" style="cursor: pointer;">
    <div class="card shadow p-4" style="height: 185px;">
      <img src="{{ URL::to('storage/'.$shop->shop_logo) }}" style="height:145px" class="m-3" alt="">
    </div>
  </div>
@endforeach
