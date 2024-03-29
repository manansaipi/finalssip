<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardTicketController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


use App\Models\Category;
use App\Models\Ticket;
use App\Models\Position;
use App\Models\Country;
use App\Models\Notification;
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

Route::get('/welcome', function () {
    return view('welcome', []);
});


Route::get('/',  [LoginController::class, 'index'])->name('login')->middleware('guest'); //loginpage
Route::post('/',  [LoginController::class, 'login'])->middleware('guest'); //loginpage

Route::post('/logout',  [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/home', function () {
    return view('dashboard.home', [
        'title' => 'Home',
        'active' => 'home',
        'waiting_tickets' => Ticket::where('status_ticket', 0)->get(),
        'inProgress_tickets' => Ticket::where('status_ticket', 1)->get(),
        'solved_tickets' => Ticket::where('status_ticket', 2)->get(),
        'canceled_tickets' => Ticket::where('status_ticket', 3)->get(),


        'waiting_ticketsMy' => Ticket::where('status_ticket', 0)->where('creator_id', auth()->user()->id)->get(),
        'inProgress_ticketsMy' => Ticket::where('status_ticket', 1)->where('creator_id', auth()->user()->id)->get(),
        'solved_ticketsMy' => Ticket::where('status_ticket', 2)->where('creator_id', auth()->user()->id)->get(),
        'canceled_ticketsMy' => Ticket::where('status_ticket', 3)->where('creator_id', auth()->user()->id)->get(),


    ]);
})->middleware('auth');

Route::get('/dashboard/myprofile', function () {
    return view('dashboard.edit_myprofile', [
        'active' => 'myprofile',
        'positions' => Position::all(),
        'countries' => DB::table('countries')->orderBy('name')->get()
    ]);
})->middleware('auth');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth');

Route::resource('/dashboard/tickets', DashboardTicketController::class)->middleware('auth');

Route::get('/dashboard/myticket', function () {
    return view('dashboard.table_myticket', [
        'active' => 'myticket',
        'tickets' => Ticket::where('creator_id', auth()->user()->id)->get()
    ]);
})->middleware('auth');

Route::get('/dashboard/myticket/{ticket:id}', function (Ticket $ticket) {
    return view('dashboard.detail_ticket', [
        'active' => 'myticket',
        'ticket' => $ticket
    ]);
})->middleware('auth');
































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
