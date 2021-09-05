<?php

use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CountryController;
use App\Models\Countryvisadoc;

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
Route::resource('countryvisadocs', Countryvisadoc::class);

Route::get('country_visadocs', [CountryController::class, 'country_visadocs'])->name('country_visadocs');
Route::post('post_country_visadocs', [CountryController::class, 'post_country_visadocs'])->name('post_country_visadocs');
Route::delete('delete_country_visadoc/{id}', [CountryController::class, 'delete_country_visadoc'])->name('delete_country_visadoc');

Route::get('country_scholarships', [CountryController::class, 'country_scholarships'])->name('country_scholarships');
Route::post('post_country_scholarship', [CountryController::class, 'post_country_scholarship'])->name('post_country_scholarship');
Route::delete('delete_country_scholarship/{id}', [CountryController::class, 'delete_country_scholarship'])->name('delete_country_scholarship');

Route::get('country_jobs', [CountryController::class, 'country_jobs'])->name('country_jobs');
Route::post('post_country_job', [CountryController::class, 'post_country_job'])->name('post_country_job');
Route::delete('delete_country_job/{id}', [CountryController::class, 'delete_country_job'])->name('delete_country_job');