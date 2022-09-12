<!-- @extends('layouts.app') -->

<!-- @section('content') -->


@foreach ($orders as $order)
<div class="card" style="width: 18rem; ">

  <img class="card-img-top" src="{{$order-> photo}}" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">{{$order-> title}}</h4>
    <p class="card-text">{{$order-> description}}</p>
    <h5 class="card-title" style ="float:left">{{$order-> price}} LE.</h5>
    <a href="" class="btn btn-primary" style ="float:right">Add to cart</a> <br>
    <?php if($order['comment'] == "") : ?>
    <form action="{{url(strval($order-> id).'/feedback')}}" method = "POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
                <div class="form-row">
                    <br>
                    <div class="form-group">
                        <label for="comment" >Comment</label>
                        <textarea class="@error('comment') is-invalid @enderror form-control" name='comment' id="comment" rows="3"></textarea>
                        @error('comment')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                        @enderror
                    </div>
  
                    <br>
                    <div class="form-group col-md-2">
                        <label for="rate" >Rate</label>
                        <input type="text" class="@error('rate') is-invalid @enderror form-control"  name='rate' id="rate">

                    </div>
                    @error('rate')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                    @enderror
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
            

    <?php else : ?>
        <p><br> Comment : <br>{{$order-> comment}} <br>
        <br> Rate : <br>{{$order-> rate}}</p>
    <?php endif; ?>
    </form>
  </div>
</div>
@endforeach

@endsection
