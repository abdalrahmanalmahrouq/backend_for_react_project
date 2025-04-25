<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserCotroller;
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
});
