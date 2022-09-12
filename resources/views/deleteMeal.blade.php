@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src='{{$meal-> photo}}' alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">{{$meal-> title}}</h4>
    <p class="card-text">{{$meal-> description}}</p>
    <p class="card-text">Rating : {{$meal-> rate}}</p>
    <h5 class="card-title" >{{$meal-> price}} LE.</h5>
    <form  action="{{url('admin/menu/'.strval($meal-> id).'/destroy')}}" method="post">
            @csrf
            @method('DELETE')
        <input type="submit" class="btn btn-danger" style='float: right;' value="Delete" >
    </form>
    <a href="{{url('admin/menu')}}" style='float: left;' class="btn btn-outline-secondary">Cancel</a>
  
    </div>
</div>
@endsection
