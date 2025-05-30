<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserCotroller;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/logout',[AdminUserCotroller::class,'AdminLogout'])->name('admin.logout');


Route::prefix('admin')->group(function(){


    Route::get('/user/profile',[AdminUserCotroller::class,'UserProfileInformation'])->name('user.profile');
    Route::get('/user/profile/edit',[AdminUserCotroller::class,'UserProfileInformationEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store',[AdminUserCotroller::class,'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/change/password',[AdminUserCotroller::class,'UserChangePassword'])->name('change.password');
    Route::post('/user/update/password',[AdminUserCotroller::class,'UserUpdatePassword'])->name('update.password');
    
});

Route::prefix('information')->group(function(){


    Route::get('/about',[InformationController::class,'AllInformation'])->name('all.information');
    Route::get('/add',[InformationController::class,'AddInformation'])->name('add.information');
    Route::post('/store',[InformationController::class,'StoreInformation'])->name('information.store');
    Route::get('/edit/{id}',[InformationController::class,'EditInformation'])->name('edit.information');
    Route::post('/update/{id}',[InformationController::class,'UpdateInformation'])->name('update.information');
    Route::get('/delete/{id}',[InformationController::class,'DeleteInformation'])->name('delete.information');
    
});



Route::prefix('services')->group(function(){


    Route::get('/all',[ServiceController::class,'AllServices'])->name('all.services');
    Route::get('/add',[ServiceController::class,'AddServices'])->name('add.services');
    Route::post('/store',[ServiceController::class,'StoreService'])->name('store.service');
    Route::get('/edit/{id}',[ServiceController::class,'EditService'])->name('edit.service');
    Route::post('/update/{id}',[ServiceController::class,'UpdateService'])->name('update.service');
    Route::get('/delete/{id}',[ServiceController::class,'DeleteService'])->name('delete.service');
    
});

Route::prefix('projects')->group(function(){


    Route::get('/all',[ProjectsController::class,'AllProjects'])->name('all.projects');
    Route::get('/add',[ProjectsController::class,'AddProject'])->name('add.project');
    Route::post('/store',[ProjectsController::class,'StoreProject'])->name('store.project');
    Route::get('/edit/{id}',[ProjectsController::class,'EditProject'])->name('edit.project');
    Route::post('/update/{id}',[ProjectsController::class,'UpdateProject'])->name('update.project');
    Route::get('/delete/{id}',[ProjectsController::class,'DeleteProject'])->name('delete.project');
    
});
