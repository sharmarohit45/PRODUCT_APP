@extends('Layout.app')
@section('main')
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
         <strong>{{$message}}</strong>
      </div>
          
      @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card m-5 p-3">
                    <form method="POST" action="/products/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" value={{old('name')}}>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"  rows="4" value="{{old('description')}}"></textarea>
                            @if ($errors->has('description'))
                                          <span class="text-danger">{{$errors->first('description')}}</span>                  
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" value={{old('image')}}>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection