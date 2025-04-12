<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//For Chart Route
Route::get('/charts',[ChartController::class,'AllOnChart']);

//For Client Review Route
Route::get('/clientreview',[ClientReviewController::class,'AllOnClientReview']);

//For Contact Route
Route::post('/addcontact',[ContactController::class,'addContactinfo']);