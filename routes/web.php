<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-------------------------------------------------
// common resource Routes
//-------------------------------------------------

//index - show all listings
//show - show single listing 
//create - show form to create  new listing 
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - edit listing 

//All listings
Route::get('/', [ListingController::class, 'index']);


//form to create new listing / job vacancies
Route::get('/listings/create', [ListingController::class, 'create']);


//storing post request from a form / submitting a form
Route::post('/listings', [ListingController::class, 'store']);








//single Listing using the Model
Route::get('/listings/{listing}', [ListingController::class, 'show']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
