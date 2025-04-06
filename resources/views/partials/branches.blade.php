<!-- shops.blade.php -->

<!-- @foreach($branches as $branch)
  <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center" onclick="window.location='{{ URL::to('brancheDetails/'.$branch->id) }}';" style="cursor: pointer;">
    <div class="card shadow p-4" style="height: 185px;">
      <img src="{{ URL::to('storage/'.$branch->branch_logo) }}" style="height:145px" class="m-3" alt="">
    </div>
  </div>
@endforeach -->


<!-- 
 @foreach($branches as $branch)
  <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4 text-center" onclick="window.location='{{ URL::to('brancheDetails/'.$branch->id) }}';" style="cursor: pointer;">
    <div class="card shadow p-4" style="height: 250px;">
      <img src="{{ URL::to('storage/'.$branch->branch_logo) }}" class="img-fluid w-75 mt-3 mb-2" alt="">
      <div class="mt-3">
        <p class="font-weight-bold">{{ $branch->branch_name }}</p>
      </div>
    </div>
  </div>
@endforeach  -->
<!-- shops.blade.php -->

@foreach($branches as $branch)
  <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4 text-center" onclick="window.location='{{ URL::to('brancheDetails/'.$branch->id) }}';" style="cursor: pointer;">
    <div class="card shadow p-4" style="height: 250px;">
      <img src="{{ URL::to('storage/'.$branch->branch_logo) }}" class="img-fluid w-75 mt-3 mb-2" alt="">
      <div class="mt-3">
        <p class="font-weight-bold">{{ $branch->branch_name }}</p>
      </div>
    </div>
  </div>
@endforeach

