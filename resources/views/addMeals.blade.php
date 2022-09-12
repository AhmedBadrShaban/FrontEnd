<!-- @extends('layouts.app') -->

<!-- @section('content') -->
<div class="container">
    <h1>add new product</h1>
    <form action="{{url('admin/menu/store')}}" method = "POST" enctype="multipart/form-data">
        @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title" >Product title</label>
                        <input type="text" class="@error('title') is-invalid @enderror form-control" name='title' id="title">
                        @error('title')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="photo"  >Product photo   </label> <br>
                        <input type="file" class="@error('photo') is-invalid @enderror form-control-file" name='photo' id="photo"> 
                        @error('photo')
                            <span style="color:red;" class="alert-danger"> <br>{{ $message}}</span>
                        @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="description" >Brief description</label>
                        <textarea class="@error('description') is-invalid @enderror form-control" name='description' id="description" rows="3"></textarea>
                        @error('description')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                        @enderror
                    </div>
  
                    <br>
                    <div class="form-group col-md-2">
                        <label for="price" >Product price</label>
                        <input type="text" class="@error('price') is-invalid @enderror form-control"  name='price' id="price">
                        @error('price')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control @error('price') is-invalid @enderror" name='type' id="type">
                          @foreach ($types as $type)
                          <option value="{{$type->type_name}}">{{$type->type_name}}</option>
                          @endforeach
                          @error('type')
                            <span style="color:red;" class="alert-danger">{{ $message}}</span>
                          @enderror
                        </select>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- @endsection -->