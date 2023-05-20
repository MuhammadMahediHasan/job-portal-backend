<?php

use App\Http\Controllers\Auth\CompanyAuthController;
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
    return view('welcome');
});

Route::prefix('api/v1')->group(function () {
    /**********************************************
     ******************* Company ******************
     *********************************************/
    Route::prefix('company')->group(function () {
        Route::post('register', [CompanyAuthController::class, 'register']);
        Route::post('login', [CompanyAuthController::class, 'login']);

        Route::group(['middleware' => ['auth:company']], function () {
            Route::post('/jobs', [JobController::class, 'store']);
            Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

            Route::get('/user', function () {
                return \Illuminate\Support\Facades\Auth::user();
            });
        });

    });


    /**********************************************
     ****************** Job Seeker ****************
     *********************************************/
    Route::prefix('job-seeker')->group(function () {
        Route::post('register', [CompanyAuthController::class, 'register']);
        Route::post('login', [CompanyAuthController::class, 'login']);

        Route::group(['middleware' => ['auth:job_seeker']], function () {
            Route::get('/user', function () {
                return \Illuminate\Support\Facades\Auth::user();
            });
        });
    });


    /**********************************************
     ****************** Common API ****************
     *********************************************/
    Route::get('jobs/{job:slug}', [JobController::class, 'show']);
});
