<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
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
        return view('dashboard.table_building', [
            'title' => 'Building_A',
            'active' => 'BA',
            'users' => User::all(),
            'rooms' => Room::where('building_id', 1)->get()
        ]);
    }

    public function building_BTable()
    {
        return view('dashboard.table_building', [
            'title' => 'Building_B',
            'active' => 'BB',
            'rooms' => Room::where('building_id', 2)->get()
        ]);
    }

    public function building_CTable()
    {
        return view('dashboard.table_building', [
            'title' => 'Building_C',
            'active' => 'BC',
            'rooms' => Room::where('building_id', 3)->get()
        ]);
    }

    public function all_tickets()
    {
        return view('dashboard.table_tickets', [
            'title' => 'All Tickets',
            'active' => 'all tickets',
            'users' => User::all(),
        ]);
    }

    public function my_tickets()
    {
        return view('dashboard.table_tickets', [
            'title' => 'My Tickets',
            'active' => 'my tickets',
            'users' => User::all(),
        ]);
    }

    public function all_users()
    {
        return view('dashboard.table_all_users', [
            'title' => 'All Users',
            'active' => 'all users',
            'users' => User::all(),
        ]);
    }
}
