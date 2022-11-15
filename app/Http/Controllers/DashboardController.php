<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    public function showAllUsers()
    {
        return view('dashboard.allusers', [
            'title' => 'All Users',
            'active' => 'all users'
        ]);
    }
}
