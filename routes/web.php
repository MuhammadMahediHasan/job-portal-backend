<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\Auth\JobSeekerAuthController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Company\ProfileController;
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

Route::get('/', function () {
    return view('frontend.components.home');
});


Route::get('/job-seeker/register', function () {
    return view('frontend.auth.job-seeker-register');
});

Route::prefix('company')->group(function () {
    Route::get('register', [CompanyAuthController::class, 'registerForm']);
    Route::post('register', [CompanyAuthController::class, 'register']);
    Route::get('login', [CompanyAuthController::class, 'loginForm']);
    Route::post('login', [CompanyAuthController::class, 'login']);
    Route::get('logout', [CompanyAuthController::class, 'logout']);

    Route::group(['middleware' => ['auth:company']], function () {
        Route::get('profile', [ProfileController::class, 'index']);
        Route::get('profile/edit', [ProfileController::class, 'edit']);
        Route::resource('profile/jobs', JobController::class);

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

    Route::group(['middleware' => ['auth:job_seeker']], function () {
        Route::get('profile', [\App\Http\Controllers\JobSeeker\ProfileController::class, 'index']);

        Route::get('profile/professional-info', [ProfessionalInfoController::class, 'index']);
        Route::post('profile/professional-info', [ProfessionalInfoController::class, 'store']);
        Route::get('profile/professional-info/{id}/delete', [ProfessionalInfoController::class, 'delete']);

        Route::get('profile/educational-info', [EducationalInfoController::class, 'index']);
        Route::post('profile/educational-info', [EducationalInfoController::class, 'store']);
        Route::get('profile/educational-info/{id}/delete', [EducationalInfoController::class, 'delete']);

        Route::get('profile/skill', [SkillController::class, 'index']);
        Route::post('profile/skill', [SkillController::class, 'store']);
        Route::get('profile/skill/{id}/delete', [SkillController::class, 'delete']);

        Route::get('profile/upload-resume', [UploadResumeController::class, 'index']);
        Route::post('profile/upload-resume', [UploadResumeController::class, 'store']);
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
