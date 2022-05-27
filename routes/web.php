<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('login');
    // return view('admin.master');
})->name('login');


Route::post('/do/login',[LoginController::class,'doLogin'])->name('doLogin');

Route::group(['prefix'=>'/admin','middleware'=>'auth'],function(){

    Route::get('/dashboard', function () {
        return view('admin.master');
    })->name('admin.dashboard');
    
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');


});
