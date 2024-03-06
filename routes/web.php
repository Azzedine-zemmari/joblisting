<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//create listing
Route::get('/listing/create',[ListingController::class,'create'])
->middleware('auth');
//store listing
Route::post('/listing',[ListingController::class,'store'])->middleware('auth');


//edit listing
Route::get('/listing/{listing}/edit',[ListingController::class,'edit']);

//update

Route::put('/listing/{listing}',[ListingController::class,'update']);
//destroy
Route::delete('/listing/{listing}',[ListingController::class,'destroy']);

//show Register/create form 
Route::get('/register',[UserController::class,'create'])->middleware('guest');
//store user
Route::post('/users',[UserController::class,'store']);

//Log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//show loggin
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);
//common Resource Routes
//index - Show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - Update listing
//destroy - delete listing


//single listing 
Route::get('/listing/{listing}',[ListingController::class,'show']);