<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ProjectsController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//For Chart Route
Route::get('/charts',[ChartController::class,'AllOnChart']);

//For Client Review Route
Route::get('/clientreview',[ClientReviewController::class,'AllOnClientReview']);

//For Contact Route
Route::post('/addcontact',[ContactController::class,'addContactinfo']);

//For Course Route
Route::get('/coursehome',[CourseController::class,'AllOnCourseHome']);
Route::get('/courseall',[CourseController::class,'AllCourses']);
Route::post('/oncourse',[CourseController::class,'OnSelectCourse']);

//For Footer Route
Route::get('/footerdata',[FooterController::class,'AllFooterData']);

//For Information Route
Route::get('/informationdata',[InformationController::class,'AllInformationData']);

//For Services Route
Route::get('/servicesdata',[ServiceController::class,'AllServicesData']);

//For Project Route
Route::get('/prjecthomedata',[ProjectsController::class,'AllOnProjectHome']);
Route::get('/projectalldata',[ProjectsController::class,'AllOnProjectAllData']);
Route::post('/onproject',[ProjectsController::class,'OnSelectProject']);

//For HomePage Route
Route::get('/home/video',[HomePageController::class,'SelectVideo']);
Route::get('/totalhome',[HomePageController::class,'SelectTotalHome']);
Route::get('/techhome',[HomePageController::class,'SelectTechHome']);
Route::get('/homepage/title',[HomePageController::class,'SelectHomeTitle']);
