<?php

use App\Models\User;
use App\Models\Sport;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardSportController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostCommentController;

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

// Halaman Home
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});


// Halaman Economics
Route::get('/economics', function () {
    return view('economics', [
        "title" => "Economics"
    ]);
});


// Halaman Sports
Route::get('/sports', [SportController::class, 'index']);


//Halaman single sports
Route::get('/sports/{sport:slug}', [SportController::class, 'show']);
Route::post('/sports/{sport:slug}', [SportController::class, 'sportcomment']);


// Halaman category
Route::get('/sports?category={category:slug}', function(Category $category){
    return view('sports', [
        'title' => $category->name,
        'sports' => $category->sports,
        'category' => $category->name
    ]);
});

// Halaman Authors
Route::get('/sports?author={author:username}', function(User $author){
    return view('sports', [
        'title' => 'Sports',
        'sports' => $author->sports->load('category', 'author'),
    ]);
});




// Halaman Technology
Route::get('/technology', function () {
    return view('technology', [
        "title" => "Technology"
    ]);
});


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// Resource Profile
// Route::get('/dashboard/profile', [RegisterController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');

// Resource Sport
Route::get('/dashboard/sports/checkSlug', [DashboardSportController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/sports', DashboardSportController::class)->middleware('auth');



// Comments
// Route::post('/comment', [PostCommentController::class, 'store']);