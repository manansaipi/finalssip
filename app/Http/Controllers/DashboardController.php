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

    public function building_ATable()
    {
        return view('dashboard.building_A', [
            'title' => 'Building_A',
            'active' => 'BA'
        ]);
    }

    public function usersTable()
    {
        return view('dashboard.allusers', [
            'title' => 'All Users',
            'active' => 'all users'
        ]);
    }
}
