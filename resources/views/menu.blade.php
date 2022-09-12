@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success container">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{route('Product.MyCart')}}" style="color: black; text-decoration: none">
        <div style="
    padding: 1em;
    font-size: 1.1em;
    font-weight: bold;
    display: flex;
    justify-content: right">
            <i class="fa-solid fa-cart-shopping" style="margin-right: 0.5em; display: flex;
            align-items: center"></i>Shopping Cart
        </div>
    </a>
    <div style="display: flex">
    @foreach($meals as $meal)

    <div class="card" style="width: 14rem; margin-left: 1em; ">
        <img class="card-img-top" style="padding:25px;" src="{{$meal-> photo}}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$meal-> title}}</h4>
            <p class="card-text">{{$meal-> description}}</p>
            <p class="card-text">Rating : {{$meal-> rate}}</p>
            <h5 class="card-title" style ="float:left">{{$meal->price}} LE.</h5>
            <a href="{{route('Product.shoppingCart',$meal->id)}}" class="btn btn-primary" style ="float:right">Add to cart</a>
        </div>
    </div>
        @endforeach
    </div>


        <br>

@endsection()
