<?php

use App\Http\Controllers\Api\AdsController;
use App\Http\Controllers\Api\AdsImageController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/users', UserController::class)->middleware('auth:sanctum');
Route::resource('/ads', AdsController::class)->middleware('auth:sanctum');
Route::resource('/ads_image', AdsImageController::class)->middleware('auth:sanctum');
Route::resource('/roles', RolesController::class)->middleware('auth:sanctum');
Route::resource('/branches', BranchController::class)->middleware('auth:sanctum');
Route::resource('/statuses', StatusController::class)->middleware('auth:sanctum');
