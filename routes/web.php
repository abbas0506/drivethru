<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//middleware classes
use App\http\Middleware\Admin;
use App\http\Middleware\Student;

use App\Http\Controllers\UserController;


use App\Http\Controllers\CountryController;

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

use App\Http\Controllers\PdfController;
use App\Http\Controllers\CounsellingController;
use App\Http\Controllers\FindCountriesByNameController;
use App\Http\Controllers\FindCountriesByCourseController;
use App\Http\Controllers\FindUniversitiesByNameController;
use App\Http\Controllers\FindUniversitiesByCourseController;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FbController;


use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\CounsellingRequestController;
use App\Http\Controllers\AdmissionRequestController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BankpaymentController;
use App\Http\Controllers\CounsellingResponseController;
use App\Http\Controllers\GuestQueryController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QueryResponseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VerifyBankPaymentController;
use App\Http\Controllers\VideoController;
use App\Models\Video;

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

// Route::permanentRedirect('/', 'public');

Route::get('/', function () {
    $video = Video::first();
    if (session('usertype')) {
        if (session('usertype') == 'admin')
            return redirect('admin');
        if (session('usertype') == 'representative')
            return redirect('representative');
        else
            return view('index', compact('video'));
    } else
        return view('index', compact('video'));
});

Route::view('admission', 'index-pages.admission');
Route::view('services', 'index-pages.services');
Route::view('about', 'index-pages.about');
Route::view('blog', 'index-pages.blog');
Route::view('contact', 'index-pages.contact');

Route::post('subscribers', [SubscriberController::class, 'store'])->name('subscribers.store');
Route::view('subscription.success', 'index-pages.success_subscription');
Route::view('signup.success', 'index-pages.success_signup');
Route::view('guestquery.success', 'index-pages.success_guestquery');
Route::post('guestqueries', [GuestQueryController::class, 'store'])->name('guestqueries.store');
Route::get('facebook.redirect', [FbController::class, 'redirect']);
Route::get('facebook.callback', [FbController::class, 'callback']);

Auth::routes();

Route::view('main', '');
//public routes
Route::resource('users', UserController::class);
Route::view('signin', 'index-pages.signin');
Route::view('signup', 'index-pages.signup');
Route::post('signin', [UserController::class, 'signin'])->name('signin');
Route::get('signout', [UserController::class, 'signout']);

//**student and admin middleware have been registered in app/http/kernel.php

//admin middleware
Route::group(['middleware' => 'admin'], function () {
    Route::view('admin', 'admin.index');
    Route::view('admin/changepw', 'admin.changepw');

    Route::view('primary', 'admin.primary.index');
    Route::resource('faculties', FacultyController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('cities', CityController::class);
    Route::resource('papertypes', PaperTypeController::class);
    Route::resource('courses', CourseController::class);
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
});

//representative middleware
Route::group(['middleware' => 'representative'], function () {
    Route::resource('representative', RepresentativeController::class);
    Route::view('r/changepw', 'representative.changepw');
    Route::resource('news', NewsController::class);
    Route::resource('advertisements', AdvertisementController::class);
    Route::resource('sitevideo', VideoController::class);
    Route::resource('closing', ClosingController::class);
    Route::get('closing/courselist/{id}', [ClosingController::class, 'courselist']);
    Route::resource('papers', PaperController::class);
    Route::resource('counselling/requests', CounsellingRequestController::class);
    Route::resource('admission/requests', AdmissionRequestController::class);
    Route::resource('registrations', RegistrationController::class);
    Route::resource('verifybankpayments', VerifyBankPaymentController::class);
    Route::resource('queryresponses', QueryResponseController::class);
    Route::resource('counsellingresponses', CounsellingResponseController::class);
});


//student middleware
Route::group(['middleware' => 'student'], function () {
    Route::view('student-dashboard', 'student.dashboard');
    Route::get('switch/{mode}', function ($mode) {
        session(['mode' => $mode,]);
        return redirect('student-dashboard');
    });

    Route::get('uni_courses', [UniversityController::class, 'uni_courses'])->name('uni_courses');
    Route::resource('applications', ApplicationController::class);
    Route::get('applications_success', [ApplicationController::class, 'success'])->name('applications_success');
    Route::get("application_download/{id}", [ApplicationController::class, 'download'])->name("application_download");
    Route::resource('profiles', ProfileController::class);
    Route::view('change-pw', 'student.profile.personal.changepw');
    Route::view('change-pic', 'student.profile.personal.changepic');
    Route::post('change_pic', [ProfileController::class, 'change_pic'])->name("change_pic");
    Route::resource('academics', AcademicController::class);
    Route::get('past-papers', [PaperController::class, 'download'])->name('past-papers');
    Route::resource('counselling', CounsellingController::class);

    Route::resource('finduniversitiesbyname', FindUniversitiesByNameController::class);
    Route::get('finduniversitiesbyname_fetch', [FindUniversitiesByNameController::class, 'fetch'])->name("finduniversitiesbyname_fetch");
    Route::get('finduniversitiesbyname_report/{id}', [FindUniversitiesByNameController::class, 'report'])->name("finduniversitiesbyname_report");
    Route::get('finduniversitiesbyname_apply/{id}', [FindUniversitiesByNameController::class, 'apply'])->name("finduniversitiesbyname_apply");

    Route::resource('finduniversitiesbycourse', FindUniversitiesByCourseController::class);
    Route::get('finduniversitiesbycourse_search', [FindUniversitiesByCourseController::class, 'search'])->name("finduniversitiesbycourse_search");
    Route::get('finduniversitiesbycourse_report', [FindUniversitiesByCourseController::class, 'report'])->name("finduniversitiesbycourse_report");
    Route::get('finduniversitiesbycourse_apply', [FindUniversitiesByCourseController::class, 'apply'])->name("finduniversitiesbycourse_apply");
    Route::post('fetchCoursesByFacultyId', [CourseController::class, 'fetchCoursesByFacultyId'])->name('fetchCoursesByFacultyId');

    Route::resource('findcountriesbyname', FindCountriesByNameController::class);
    Route::get('findcountriesbyname_search', [FindCountriesByNameController::class, 'search'])->name("findcountriesbyname_search");
    Route::get('findcountriesbyname_report/{id}', [FindCountriesByNameController::class, 'report'])->name("findcountriesbyname_report");
    Route::get('findcountriesbyname_apply/{id}', [FindCountriesByNameController::class, 'apply'])->name("findcountriesbyname_apply");

    Route::resource('findcountriesbycourse', FindCountriesByCourseController::class);
    Route::get('findcountriesbycourse_search', [FindCountriesByCourseController::class, 'search'])->name("findcountriesbycourse_search");
    Route::get('findcountriesbycourse_countrypreview/{id}', [FindCountriesByCourseController::class, 'countrypreview'])->name("findcountriesbycourse_countrypreview");
    Route::get('findcountriesbycourse_report}', [FindCountriesByCourseController::class, 'report'])->name("findcountriesbycourse_report");
    Route::get('findcountriesbycourse_apply', [FindCountriesByCourseController::class, 'apply'])->name("findcountriesbycourse_apply");
    //payments
    Route::resource('bankpayments', BankpaymentController::class);
    Route::get('payments/create/{id}', [PaymentController::class, 'create']);
    Route::get('feevoucher/{id}', [ApplicationController::class, 'voucher'])->name('feevoucher');
});