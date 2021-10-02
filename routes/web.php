<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CouncelTypeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PaperTypeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UnicourseController;
use App\Http\Controllers\FavcourseController;
use App\Http\Controllers\VisadocController;
use App\Http\Controllers\AdmdocController;
use App\Http\Controllers\ScholarshipOfferController;
use App\Http\Controllers\FuniversityController;
use App\Http\Controllers\StudycostController;
use App\Http\Controllers\ExpensetypeController;
use App\Http\Controllers\LivingcostController;
use App\Http\Controllers\NationalController;
use App\Http\Controllers\ProfileController;
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
Route::view('primary', 'admin.primary');

Route::resource('faculties', FacultyController::class);
Route::resource('levels', LevelController::class);
Route::resource('documents', DocumentController::class);
Route::resource('scholarships', ScholarshipController::class);
Route::resource('councel_types', CouncelTypeController::class);
Route::resource('cities', CityController::class);
Route::resource('papertypes', PaperTypeController::class);
Route::resource('courses', CourseController::class);
Route::resource('papers', PaperController::class);

Route::resource('countries', CountryController::class);
Route::resource('favcourses', FavcourseController::class);
Route::resource('visadocs', VisadocController::class);
Route::resource('admdocs', AdmdocController::class);
Route::resource('scholarship_offers', ScholarshipOfferController::class);
Route::resource('funiversities', FuniversityController::class);
Route::resource('studycosts', StudycostController::class);
Route::resource('expensetypes', ExpensetypeController::class);
Route::resource('livingcosts', LivingcostController::class);


Route::resource('universities', UniversityController::class);
Route::get('uni_courses', [UniversityController::class, 'uni_courses'])->name('uni_courses');
Route::post('fetchLevelsAndCoursesByFacultyId', [UniversityController::class, 'fetchLevelsAndCoursesByFacultyId'])->name('fetchLevelsAndCoursesByFacultyId');
Route::post('fetchCoursesByFacultyAndLevelId', [UniversityController::class, 'fetchCoursesByFacultyAndLevelId'])->name('fetchCoursesByFacultyAndLevelId');
Route::post('fetchCoursesByLevelId', [UniversityController::class, 'fetchCoursesByLevelId'])->name('fetchCoursesByLevelId');
Route::resource('unicourses', UnicourseController::class);

//user api

Route::resource('national', NationalController::class);
Route::get('fetchUniversitiesByCourseId', [NationalController::class, 'fetchUniversitiesByCourseId'])->name('fetchUniversitiesByCourseId');
Route::view('finalizeApplication', 'students.national.finalize');
Route::resource('profiles', ProfileController::class);