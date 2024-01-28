@extends('Layout.app')
@section('main')
    <div class="container">
        <div class="text-right mt-5">
            <a href="products/create" class="btn btn-dark">new Product</a>
        </div>
         <h1>PRODUCTS PAGE</h1>
         <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col" colspan="2" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr> 
                            <td>{{ $loop->index+1}}</td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->description}}</td>
                        <td><img src="products/{{$product->image}}" 
                            class="rounded-circle" width="50" height="50"></td>
                        <td><a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a></td>
                        <td><a href="products/{{$product->id}}/delete" class="btn btn-danger">Delete</a></td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
         </div>
    </div>
    @endsection
