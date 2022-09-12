<!-- @extends('layouts.app') -->
<!-- @section('content') -->

    @if (session('status'))
        <div class="alert alert-success container">
            {{ session('status') }}
        </div>
    @endif
    <div style="display: flex; justify-content: right; padding-right: 2em;">
        <a href="{{route('Meals.Get')}}" style="color: black; text-decoration: none">
            <div style=" padding: 0.5em; font-size: 1.1em; font-weight: bold; display: flex; justify-content: right">
                <i class="fa-solid fa-utensils" style="margin-right: 0.5em; display: flex; align-items: center"></i>Menu
            </div>
        </a>

        <a href=" {{url('stripe')}}" style="color: black; text-decoration: none">
            <div style="padding: 0.5em;font-size: 1.1em;font-weight: bold;display: flex;justify-content: right">
                <i class="fa-solid fa-cash-register" style="margin-right: 0.5em; display: flex;
                align-items: center"></i>Checkout
            </div>
        </a>
    </div>
    <div class="container" style="display: flex">

        @foreach($cards as $card)
            <div class="card" style="padding: 1.2em;
    margin-right: 1em;">
                <p style="display: none">
                    {{$c = \App\Models\Cart::where('meal_id',$card->meal_id)->where('user_id',Auth::id())->get()->count()}}
                </p>
                <p style="display: none">
                    {{$n = \App\Models\Meal::where('id',$card->meal_id)->get()->first()}}


                </p>

                <p>name of products: {{$n['title']}}</p>
                <p>count of products: {{$c}}</p>
                <p>price of products: {{$c * $n['price']}}</p>
                <a href="{{route('product.del',$card->meal_id)}}">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </div>
        @endforeach
    </div>
    <p class="container">total Price:{{\App\Models\Bank::where('userid',Auth::id())->get()->first()->totalPrice}}</p>
<!-- @endsection -->
