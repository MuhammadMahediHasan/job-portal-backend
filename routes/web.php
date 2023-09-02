<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\Auth\JobSeekerAuthController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Company\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobSeeker\EducationalInfoController;
use App\Http\Controllers\JobSeeker\ProfessionalInfoController;
use App\Http\Controllers\JobSeeker\SkillController;
use App\Http\Controllers\JobSeeker\UploadResumeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/job-category', [HomeController::class, 'category']);
Route::get('job-details/{slug}', [HomeController::class, 'jobDetails']);
Route::get('jobs', [\App\Http\Controllers\JobController::class, 'index']);
Route::post('contact-us', [HomeController::class, 'contactUs']);

Route::get('/contact-us', function () {
    return view('frontend.pages.contact-us');
});
Route::get('/about-us', function () {
    return view('frontend.pages.about-us');
});
Route::get('/our-services', function () {
    return view('frontend.pages.our-services');
});
Route::get('/privacy-policy', function () {
    return view('frontend.pages.privacy-policy');
});
Route::get('/terms-and-condition', function () {
    return view('frontend.pages.terms-and-condition');
});
Route::get('/help', function () {
    return view('frontend.pages.help');
});
Route::get('/fqas', function () {
    return view('frontend.pages.fqas');
});

//Route::get('/job-seeker/register', function () {
//    return view('frontend.auth.job-seeker-register');
//});


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'loginForm']);
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('logout', [AdminAuthController::class, 'logout']);
    Route::group(['middleware' => ['admin-auth']], function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);
        Route::resource('category', CategoryController::class);
        Route::resource('general-setting', GeneralSettingController::class);
        Route::resource('skill', \App\Http\Controllers\Admin\SkillController::class);
        Route::get('message', [\App\Http\Controllers\Admin\HomeController::class, 'messages']);
        Route::get('employer', [\App\Http\Controllers\Admin\HomeController::class, 'employer']);
        Route::get('jobs', [\App\Http\Controllers\Admin\HomeController::class, 'jobs']);
        Route::get('jobs/{job}/status', [\App\Http\Controllers\Admin\HomeController::class, 'jobStatus']);
        Route::get('job-seeker', [\App\Http\Controllers\Admin\HomeController::class, 'jobSeekers']);
    });
});

Route::prefix('company')->group(function () {
    Route::get('register', [CompanyAuthController::class, 'registerForm']);
    Route::post('register', [CompanyAuthController::class, 'register']);
    Route::get('login', [CompanyAuthController::class, 'loginForm']);
    Route::post('login', [CompanyAuthController::class, 'login']);
    Route::get('logout', [CompanyAuthController::class, 'logout']);

    Route::group(['middleware' => ['company-auth'], 'prefix' => 'profile'], function () {
        Route::get('', [ProfileController::class, 'index']);
        Route::get('/edit', [ProfileController::class, 'edit']);
        Route::resource('/jobs', JobController::class);
        Route::get('/jobs/{id}/apply', [JobController::class, 'apply']);
        Route::get('/change-password', [ProfileController::class, 'changePassword']);
        Route::post('/change-password', [ProfileController::class, 'postChangePassword']);

        Route::get('/user', function () {
            return \Illuminate\Support\Facades\Auth::user();
        });
    });
});

Route::prefix('job-seeker')->group(function () {
    Route::get('register', [JobSeekerAuthController::class, 'registerForm']);
    Route::post('register', [JobSeekerAuthController::class, 'register']);
    Route::get('login', [JobSeekerAuthController::class, 'loginForm']);
    Route::post('login', [JobSeekerAuthController::class, 'login']);
    Route::get('logout', [JobSeekerAuthController::class, 'logout']);
    Route::post('apply', [ApplyController::class, 'store']);

    Route::group(['middleware' => ['job-seeker-auth'], 'prefix' => 'profile'], function () {
        Route::get('', [\App\Http\Controllers\JobSeeker\ProfileController::class, 'index']);

        Route::get('/professional-info', [ProfessionalInfoController::class, 'index']);
        Route::post('/professional-info', [ProfessionalInfoController::class, 'store']);
        Route::get('/professional-info/{id}/delete', [ProfessionalInfoController::class, 'delete']);

        Route::get('/educational-info', [EducationalInfoController::class, 'index']);
        Route::post('/educational-info', [EducationalInfoController::class, 'store']);
        Route::get('/educational-info/{id}/delete', [EducationalInfoController::class, 'delete']);

        Route::get('/skill', [SkillController::class, 'index']);
        Route::post('/skill', [SkillController::class, 'store']);
        Route::get('/skill/{id}/delete', [SkillController::class, 'delete']);

        Route::get('/upload-resume', [UploadResumeController::class, 'index']);
        Route::post('/upload-resume', [UploadResumeController::class, 'store']);
        Route::get('/generate-resume', [UploadResumeController::class, 'generateResume']);
        Route::get('/change-password', [\App\Http\Controllers\JobSeeker\ProfileController::class, 'changePassword']);
        Route::post('/change-password', [\App\Http\Controllers\JobSeeker\ProfileController::class, 'postChangePassword']);
    });
});

//Route::prefix('api/v1')->middleware('cors')->group(function () {
//    /**********************************************
//     ******************* Company ******************
//     *********************************************/
//    Route::prefix('company')->group(function () {
//        Route::post('register', [CompanyAuthController::class, 'register']);
//        Route::post('login', [CompanyAuthController::class, 'login']);
//        Route::post('me', [CompanyAuthController::class, 'authCheck']);
//
//        Route::group(['middleware' => ['auth:company']], function () {
//            Route::post('/jobs', [JobController::class, 'store']);
//            Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
//
//            Route::get('/user', function () {
//                return \Illuminate\Support\Facades\Auth::user();
//            });
//        });
//    });
//
//
//    /**********************************************
//     ****************** Job Seeker ****************
//     *********************************************/
//    Route::prefix('job-seeker')->group(function () {
//        Route::post('register', [CompanyAuthController::class, 'register']);
//        Route::post('login', [CompanyAuthController::class, 'login']);
//
//        Route::group(['middleware' => ['auth:job_seeker']], function () {
//            Route::get('/user', function () {
//                return \Illuminate\Support\Facades\Auth::user();
//            });
//        });
//    });
//
//
//    /**********************************************
//     ****************** Common API ****************
//     *********************************************/
//    Route::get('jobs/{job:slug}', [JobController::class, 'show']);
//    Route::get('job-categories', [JobCategoryController::class, 'index']);
//});
