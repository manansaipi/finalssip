<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TableController;
use App\Models\Post;
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

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/building_a', [DashboardController::class, 'building_ATable'])->middleware('auth');

Route::get('/building_b', [DashboardController::class, 'building_BTable'])->middleware('auth');

Route::get('/building_c', [DashboardController::class, 'building_CTable'])->middleware('auth');

Route::get('/alltickets', [DashboardController::class, 'all_tickets'])->middleware('auth');

Route::get('/mytickets', [DashboardController::class, 'my_tickets'])->middleware('auth');

Route::get('/allusers', [DashboardController::class, 'all_users'])->middleware('auth');

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
