<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('guest.home');
}); */

//?Rotta autenticazione 
Auth::routes(['register'=>true]);
//? ROute PER ADMIN
Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts','PostController');
    
    Route::resource('categories','CategoryController');


});

//? ROUTE PER LE ROTTE QUALSIASI ECCEZIONE  
Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*');