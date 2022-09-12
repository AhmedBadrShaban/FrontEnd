@extends('layouts.app')

@section('content')
<div class="container">
    <h1>add new product</h1>
    <form action="{{url('admin/menu/storeType')}}" method = "POST" enctype="multipart/form-data">
        @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type_name" >Type title</label>
                        <input type="text" class="@error('type_name') is-invalid @enderror form-control" name='type_name' id="type_name">
                        @error('type_name')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                        @enderror
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection