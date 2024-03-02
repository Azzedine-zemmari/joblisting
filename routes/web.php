<?php

use App\Http\Controllers\ListingController;
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

Route::get('/',[ListingController::class,'index']);

//single listing

// Route::get('/listing/{id}',function($id){
//     return view('listing',[
//         'listing' => Listing::find($id)
//     ]);
// });

//create listing
Route::get('/listing/create',[ListingController::class,'create']);
//store listing
Route::post('/listing',[ListingController::class,'store']);

//single listing 
Route::get('/listing/{listing}',[ListingController::class,'show']);

//common Resource Routes
//index - Show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - Update listing
//destroy - delete listing

