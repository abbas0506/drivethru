<?php

use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CountryController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/my', 'layouts.admin');
Route::view('/admin', 'admin.index');
Route::resource('countries', CountryController::class);
Route::get('editcountryvisadocs', [CountryController::class, 'editcountryvisadocs'])->name('editcountryvisadocs');
Route::post('postvisadocs', [CountryController::class, 'postvisadocs'])->name('postvisadocs');