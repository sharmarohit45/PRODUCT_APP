<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControllers;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ProductControllers::class,'index'])->name('products.index');
Route::get('products/create',[ProductControllers::class,'create'])->name('products.create');
Route::post('/products/store',[ProductControllers::class,'store'])->name('products.store');
Route::get('/products/{id}/edit',[ProductControllers::class,'edit']);
Route::put('/products/{id}/update',[ProductControllers::class,'update']);
Route::get('/products/{id}/delete',[ProductControllers::class,'destroy']);
