<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductControllers extends Controller
{
    public function index(){
       
         return view('products.index',['products'=>Product::get()]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        //dd($request->all());
        //VALIDATION
        $request->validate([
            'name' =>'required',
            'description'=> 'required',
            'image'=>'required|mimes:jpeg,jpg,gif|max:10000',
        ]);
       $imageName=time().'.'.$request->image->extension();
       $request->image->move(public_path('products'),$imageName);
       $product = new Product;
       $product->image = $imageName;
       $product->name = $request->name;
       $product->description = $request->description;
       $product->save();
       return back()->withSuccess('PRODUCT CREATED !!!!!');
    }
    public function edit($id){
    //   dd($id);
       $product = Product::where('id',$id)->first();
       return view('Products.edit',['product' => $product]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' =>'required',
            'description'=> 'required',
            'image'=>'nullable|mimes:jpeg,jpg,gif|max:10000',
        ]);
       $product = Product::where('id',$id)->first();
       if(isset($request->image)){
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product->image = $imageName;
       }
       
       $product->name = $request->name;
       $product->description = $request->description;
       $product->save();
       return back()->withSuccess('PRODUCT UPDATED !!!!!');

    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted !!!!!');
    }
}
