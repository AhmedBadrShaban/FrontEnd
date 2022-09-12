@extends('layouts.admin')

@section('content')



<div class="card" style="width: 14rem; ">
  <img class="card-img-top" style="padding:25px;"src='{{$meal-> photo}}' alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">{{$meal-> title}}</h4>
    <p class="card-text">{{$meal-> description}}</p>
    <p class="card-text">Rating : {{$meal-> rate}}</p>
    <h5 class="card-title" style='float: left;'>{{$meal-> price}} LE.</h5>
    
  </div>
</div>
@endsection
