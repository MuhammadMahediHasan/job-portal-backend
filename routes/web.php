<?php

use App\Http\Controllers\Auth\CompanyAuthController;
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
    Route::prefix('company')->group(function () {
        Route::post('register', [CompanyAuthController::class, 'register']);
        Route::post('login', [CompanyAuthController::class, 'login']);
    });
});
