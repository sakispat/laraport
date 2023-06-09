<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\EventUserController;
use App\Http\Controllers\API\TopicController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\InstructorController;
use App\Http\Controllers\API\TestCompainController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

Route::middleware('jwt.auth:api')->group(function () {
    Route::get('myaccount', [UserController::class, 'myaccount']);
});

Route::middleware('auth:api')->group(function () {
    Route::resource('testcompains', TestCompainController::class);
    Route::resource('events', EventController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('eventusers', EventUserController::class);
});
