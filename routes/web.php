<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\Auth\JobSeekerAuthController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobController;
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
    Route::get('register', [CompanyAuthController::class, 'index']);
    Route::post('register', [CompanyAuthController::class, 'register']);
    Route::get('login', [CompanyAuthController::class, 'index']);
    Route::post('login', [CompanyAuthController::class, 'login']);
    Route::get('logout', [CompanyAuthController::class, 'logout']);

    Route::group(['middleware' => ['auth:company']], function () {
        Route::post('/jobs', [JobController::class, 'store']);
        Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

        Route::get('/user', function () {
            return \Illuminate\Support\Facades\Auth::user();
        });
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
