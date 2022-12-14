<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_all_users', [
            'title' => 'All Users',
            'active' => 'all users',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.detail_user', [
            'title' => 'All Users',
            'active' => 'all users',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:125',
        ];
        if ($request->username != $user->username) {
            $rules['username'] = ['required', 'min:4', 'max:25', 'unique:users'];
        }
        $validatedData = $request->validate($rules);
        $validatedData['country_id'] = $request->country;
        $validatedData['age'] = $request->age;
        $validatedData['instagram'] = $request->instagram;
        $validatedData['github'] = $request->github;
        $validatedData['birthday'] = $request->birthday;
        $validatedData['bio'] = $request->bio;

        User::where('id', auth()->user()->id)
            ->update($validatedData);
        return redirect('/home')->with('success', "Profile updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
