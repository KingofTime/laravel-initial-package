<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users/trash', [UserController::class, 'onlyTrashed']);
Route::post('users/trash/{id}', [UserController::class, 'restore']);
Route::delete('users/trash/{id}', [UserController::class, 'forceDelete']);
Route::apiResource('users', UserController::class);

Route::apiResource('profiles', ProfileController::class);
Route::apiResource('reports', ReportController::class);
