<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

use App\Models\Category;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/',  [LoginController::class, 'index'])->name('login')->middleware('guest'); //loginpage
Route::post('/',  [LoginController::class, 'login'])->middleware('guest'); //loginpage

Route::post('/logout',  [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/home', function () {
    return view('dashboard.home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
})->middleware('auth');

// Route::get('/dashboard/users', DashboardController::class, 'all_users')->middleware('auth');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth');

Route::get('/home2', function () {
    return view('home_', [
        'title' => 'Home',
        'active' => 'home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name"  => "Abdul Mannan",
        "email" => "abdul.saipi@student"
    ]);
});
Route::get('/blog', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [PostController::class, 'showListCategories']);

Route::get('/categories/{category:slug}', [PostController::class, 'showPostBaseOnCategory']);

Route::get('/authors/{author:username}', [PostController::class, 'showPostBaseOnUser']);
