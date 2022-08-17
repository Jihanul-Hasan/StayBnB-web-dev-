<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\RequestController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', function () {
    return view('post');
});

//Home 
Route::get('/staybnb', [HomePageController::class, 'home'])->name('auth.home');



//register 
Route::post('/home', [UserController::class, 'store'])->name('auth.store');

//login
// Route::post('/auth/login',[UserController:: class,'login'])->name('auth.login');
Route::post('/auth/dashboard', [UserController::class, 'check'])->name('auth.login');

//Logout
Route::get('/home', [UserController::class, 'logout'])->name('auth.logout');


//profile
Route::get('/auth/dashboard/profile/{id}', [UserController::class, 'profile'])->name('auth.profile');




Route::get('/users', [UserController::class, 'allusers']);



//host
Route::get('/auth/dashboard/host/{id}', [UserController::class, 'host'])->name('auth.host');
Route::post('/auth/dashboard/host/posts/{id}', [PostController::class, 'store'])->name('auth.host.posts');


//search
Route::get('/auth/dashboard/search/{id}', [UserController::class, 'search'])->name('auth.search');
Route::post('/auth/dashboard/search/{id}', [SearchController::class, 'getSearchResult']);

//detailed View
Route::get('/auth/dashboard/search/posts/{id}', [PostController::class, 'detailedView']);

//Request
Route::post('/auth/dashboard/search/posts/{id}', [RequestController::class, 'store']);

//all Ads
Route::get('/index/{parmalink}', [UserController::class, 'allads'])->name('ads');




Route::get('/auth/dashboard', [UserController::class, 'dash']);



//Middle Ware
// Route::group(['middleware' => ['AuthCheck']], function () {

Route::get('/staybnb/signup', [UserController::class, 'register'])->name('auth.register');


//dashboad
Route::get('/auth/dashboard', [UserController::class, 'dashboard'])->name('auth.dashboard');
// });
