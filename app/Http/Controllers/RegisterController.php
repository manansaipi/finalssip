<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }


    public function store(Request $request)
    {

        $validatedData =  $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:4', 'max:25', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'

        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        //or
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull');
        return redirect('/')->with('success', 'Registration successfull');
    }
    // or
    // public function store()
    // {
    //     return request()->all();
    // }
}
