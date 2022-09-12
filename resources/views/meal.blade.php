<!-- @extends('layouts.app') -->

<!-- @section('content') -->

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src='{{$meal-> photo}}' alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">{{$meal-> title}}</h4>
    <p class="card-text">{{$meal-> description}}</p>
    <p class="card-text">Rating : {{$meal-> rate}}</p>
    <h5 class="card-title" style='float: left;'>{{$meal-> price}} LE.</h5>
    <a href="{{url('/cart')}}" style='float: right;' class="btn btn-primary">Add to cart</a>
  </div>
</div>
<!-- @endsection -->
