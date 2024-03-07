<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts', [ContactsController::class, 'get']);
Route::get('/conversation/{id}', [ContactsController::class, 'getMessagesFor']);
Route::post('/conversation/send', [ContactsController::class, 'send']);
Route::get('/users/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::put('/change-profileimg/{id}',[App\Http\Controllers\HomeController::class, 'updateProfileImg']);
