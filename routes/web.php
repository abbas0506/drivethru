<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//middleware classes
use App\http\Middleware\Admin;
use App\http\Middleware\Student;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ScholarshipController;
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
use App\Http\Controllers\FindUniversityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicController;
use App\http\Controllers\ApplicationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CounsellingController;
use App\Http\Controllers\FindCountryController;
use App\Http\Controllers\FindUniversityByNameController;

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

//public routes
Route::resource('users', UserController::class);
Route::view('signin', 'users.signin');
Route::view('signup', 'users.signup');
Route::view('signup_success', 'users.signup_success');
Route::post('signin', [UserController::class, 'signin'])->name('signin');
Route::get('signout', [UserController::class, 'signout']);

//Route::resource('unicourses', UnicourseController::class);
//**student and admin middleware have been registered in app/http/kernel.php

//admin middleware
//Route::group(['middleware' => 'admin'], function () {
Route::view('admin', 'admin.index');
Route::view('primary', 'admin.primary.index');
Route::resource('faculties', FacultyController::class);
Route::resource('levels', LevelController::class);
Route::resource('documents', DocumentController::class);
Route::resource('scholarships', ScholarshipController::class);
Route::resource('cities', CityController::class);
Route::resource('papertypes', PaperTypeController::class);
Route::resource('courses', CourseController::class);
Route::resource('papers', PaperController::class);

Route::resource('universities', UniversityController::class);
Route::resource('unicourses', UnicourseController::class);
Route::post('fetchCoursesByFacultyId', [CourseController::class, 'fetchCoursesByFacultyId'])->name('fetchCoursesByFacultyId');

//Route::post('fetchCoursesByFacultyId', [CourseController::class, 'fetchCoursesByFacultyId'])->name('fetchCoursesByFacultyId');
Route::post('fetchXUnicoursesByFacultyId', [UnicourseController::class, 'fetchXUnicoursesByFacultyId'])->name('fetchXUnicoursesByFacultyId');

Route::resource('countries', CountryController::class);
Route::resource('favcourses', FavcourseController::class);
Route::resource('visadocs', VisadocController::class);
Route::resource('admdocs', AdmdocController::class);
Route::resource('scholarship_offers', ScholarshipOfferController::class);
Route::resource('funiversities', FuniversityController::class);
Route::resource('studycosts', StudycostController::class);
Route::resource('expensetypes', ExpensetypeController::class);
Route::resource('livingcosts', LivingcostController::class);
//});

//student middleware
//Route::group(['middleware' => 'student'], function () {
Route::view('national_dashboard', 'user.national.dashboard');
Route::view('international_dashboard', 'user.international.dashboard');

Route::get('uni_courses', [UniversityController::class, 'uni_courses'])->name('uni_courses');
//Route::resource('unicourses', UnicourseController::class);
Route::resource('finduniversity', FindUniversityController::class);
Route::get('fetchUniversities', [FindUniversityController::class, 'fetchUniversities'])->name('fetchUniversities');
Route::view('finalizeApplication', 'students.national.finalize');
Route::resource('applications', ApplicationController::class);
Route::get('applications_success', [ApplicationController::class, 'success'])->name('applications_success');
Route::get("application_download", [ApplicationController::class, 'download'])->name("application_download");
Route::get("finduni_download", [FindUniversityController::class, 'download'])->name("finduni_download");
Route::resource('profiles', ProfileController::class);
Route::resource('academics', AcademicController::class);
Route::view('change_pic', 'user.profile.personal.change_pic')->name('change_pic');
Route::post('change_pic', [ProfileController::class, 'change_pic'])->name("change_pic");
Route::get('download_past_papers', [PaperController::class, 'download'])->name('download_past_papers');
Route::resource('counselling', CounsellingController::class);
Route::resource('findcountry', FindCountryController::class);
Route::get("findcountry_autosearch", [FindCountryController::class, 'autosearch'])->name("findcountry_autosearch");
Route::get("findcountry_countrydetail/{id}", [FindCountryController::class, 'countrydetail'])->name("findcountry_countrydetail");
Route::get("apply", [FindCountryController::class, 'apply'])->name("apply");

Route::get('switch/{mode}', function ($mode) {
    session([
        'mode' => $mode,
    ]);
    if ($mode == 0) return redirect('national_dashboard');
    if ($mode == 1) return redirect('international_dashboard');
});

Route::view('changepw', 'user.profile.personal.changepw');

Route::resource('finduniversitiesbyname', FindUniversityByNameController::class);
Route::get('finduniversitiesbyname_fetch', [FindUniversityByNameController::class, 'fetch'])->name("finduniversitiesbyname_fetch");
Route::get('finduniversitiesbyname_report/{id}', [FindUniversityByNameController::class, 'report'])->name("finduniversitiesbyname_report");
Route::get('finduniversitiesbyname_apply/{id}', [FindUniversityByNameController::class, 'apply'])->name("finduniversitiesbyname_apply");
//});