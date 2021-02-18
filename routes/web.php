<?php

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

Route::get('/', 'PagesController@root')->name('boot');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::resource('users','UsersController',['only' => ['show','update','edit']]);

Route::resource('topics', 'TopicsController', ['only' => ['index','create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories','CategoriesController',['only' => ['show']]);

Route::post('upload_image','TopicsController@uploadImage')->name('topics.upload_image');

Route::get('topics/{topic}/{slug?}','TopicsController@show')->name('topics.show');