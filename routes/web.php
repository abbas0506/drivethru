<?php

use Illuminate\Routing\RouteBinding;
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
Route::view('primary', 'admin.primary');

Route::resource('faculties', FacultyController::class)->except(['update', 'show']);
Route::post('faculties_update', [FacultyController::class, 'faculties_update'])->name('faculties_update');

Route::resource('levels', LevelController::class)->except(['update', 'show']);
Route::post('levels_update', [LevelController::class, 'levels_update'])->name('levels_update');

Route::resource('documents', DocumentController::class)->except(['update', 'show']);
Route::post('documents_update', [DocumentController::class, 'documents_update'])->name('documents_update');

Route::resource('scholarships', ScholarshipController::class)->except(['update', 'show']);
Route::post('scholarhips_update', [ScholarshipController::class, 'scholarships_update'])->name('scholarships_update');

Route::resource('councel_types', CouncelTypeController::class);
Route::resource('cities', CityController::class);
Route::resource('papertypes', PaperTypeController::class)->except(['update', 'show']);
Route::post('papertypes_update', [PaperTypeController::class, 'papertypes_update'])->name('papertypes_update');

Route::resource('courses', CourseController::class)->except(['update', 'show']);
Route::post('courses_update', [CourseController::class, 'courses_update'])->name('courses_update');

Route::resource('papers', PaperController::class);

Route::resource('universities', UniversityController::class);
Route::get('uni_courses', [UniversityController::class, 'uni_courses'])->name('uni_courses');
Route::post('fetchLevelsAndCoursesByFacultyId', [UniversityController::class, 'fetchLevelsAndCoursesByFacultyId'])->name('fetchLevelsAndCoursesByFacultyId');
Route::post('fetchCoursesByFacultyAndLevelId', [UniversityController::class, 'fetchCoursesByFacultyAndLevelId'])->name('fetchCoursesByFacultyAndLevelId');
Route::resource('unicourses', UnicourseController::class);
Route::resource('favcourses', FavcourseController::class);
Route::resource('visadocs', VisadocController::class);
Route::resource('admdocs', AdmdocController::class);
Route::resource('scholarship_offers', ScholarshipOfferController::class);
Route::resource('funiversities', FuniversityController::class);
Route::resource('studycosts', StudycostController::class);
Route::resource('expensetypes', ExpensetypeController::class);