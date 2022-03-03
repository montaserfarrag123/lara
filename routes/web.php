<?php

use App\Http\Controllers\blogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\usereController;

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



Route::middleware(['checkLogin'])->group(function(){

# usres Routes .......
Route::get('user/',[usereController::class,'index']);
Route::get('user/Create',[usereController::class,'create']);
Route::post('user/Store',[usereController::class,'Store']);
Route::get('user/delete/{id}',[usereController::class,'delete']);
Route::get('user/edit/{id}',[usereController::class,'edit']);
Route::put('user/update/{id}',[usereController::class,'update']);
Route::get("user/LogOut",[usereController::class,'LogOut']);


# Blog .....

Route::resource('Blog',blogController::class);

});

Route::get("user/Login",[studentController::class,'login']);
Route::post("user/doLogin",[studentController::class,'doLogin']);









