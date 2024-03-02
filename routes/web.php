<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//all listing

Route::get('/', function () {
    return view('listings', [
        'listings' => Listing::all()
    ]);
});

//single listing

// Route::get('/listing/{id}',function($id){
//     return view('listing',[
//         'listing' => Listing::find($id)
//     ]);
// });

//Route Model Binding

Route::get('/listing/{listing}',function(Listing $listing){
    return view('listing',[
        'listing'=>$listing
    ]);
});