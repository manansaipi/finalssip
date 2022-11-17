<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function showAllUsers()
    {
        return view('dashboard.allusers', [
            'users' => User::all(),
            'active' => 'all users'
        ]);
    }
    public function showUsersInBA()
    {
        return view('dashboard.allusers', [
            'users' => User::all(),
            'active' => 'BA'
        ]);
    }
}
