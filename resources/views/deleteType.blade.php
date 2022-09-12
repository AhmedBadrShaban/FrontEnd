<!-- @extends('layouts.app') -->

<!-- @section('content') -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h4 class="card-title">{{$type-> type_name}}</h4>
    <form  action="{{url('admin/menu/'.strval($type-> id).'/destroyType')}}" method="post">
            @csrf
            @method('DELETE')
        <input type="submit" class="btn btn-danger" style='float: right;' value="Delete" >
    </form>
    <a href="{{url('admin/menu')}}" style='float: left;' class="btn btn-outline-secondary">Cancel</a>
  
    </div>
</div>
<!-- @endsection -->
