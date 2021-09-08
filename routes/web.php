<?php

use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DocumentController;
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
Route::resource('user', UserController::class);

Route::view('admin', 'admin.index');
Route::resource('countries', CountryController::class);
Route::resource('countryvisadocs', Countryvisadoc::class);

Route::get('country_visadocs', [CountryController::class, 'country_visadocs'])->name('country_visadocs');
Route::post('post_country_visadocs', [CountryController::class, 'post_country_visadocs'])->name('post_country_visadocs');
Route::delete('delete_country_visadoc/{id}', [CountryController::class, 'delete_country_visadoc'])->name('delete_country_visadoc');

Route::get('country_scholarships', [CountryController::class, 'country_scholarships'])->name('country_scholarships');
Route::post('post_country_scholarship', [CountryController::class, 'post_country_scholarship'])->name('post_country_scholarship');
Route::delete('delete_country_scholarship/{id}', [CountryController::class, 'delete_country_scholarship'])->name('delete_country_scholarship');

Route::get('country_jobs', [CountryController::class, 'country_jobs'])->name('country_jobs');
Route::post('post_country_jobs', [CountryController::class, 'post_country_jobs'])->name('post_country_jobs');
Route::view('primary', 'admin.primary');

Route::resource('faculties', FacultyController::class)->except(['update', 'show']);
Route::post('faculties_update', [FacultyController::class, 'faculties_update'])->name('faculties_update');

Route::resource('levels', LevelController::class)->except(['update', 'show']);
Route::post('levels_update', [LevelController::class, 'levels_update'])->name('levels_update');

Route::resource('documents', DocumentController::class)->except(['update', 'show']);
Route::post('documents_update', [DocumentController::class, 'documents_update'])->name('documents_update');

Route::resource('scholarships', ScholarshipController::class)->except(['update', 'show']);
Route::post('scholarhips_update', [ScholarshipController::class, 'scholarships_update'])->name('scholarships_update');