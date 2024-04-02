<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});
// Route::view('/welcome','signin');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/invoices',InvoicesController::class);
Route::resource('/sections',SectionsController::class);
Route::get('/section/{id}',[SectionsController::class,'getproducts']);
Route::resource('/products',ProductController::class);
Route::resource('/status',StatusController::class);
