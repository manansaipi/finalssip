<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DashboardTicketController;


function clean($string)
{
    $string = str_replace(' ', '-', $string);

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
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

        // $this->authorize('ceo'); //<--- using Gates
        if (auth()->guest() || auth()->user()->position->name !== "CEO") {
            abort(403);
        }
        return view('dashboard.edit_user', [
            'title' => 'All Users',
            'active' => 'all users',
            'users' => User::all(),
            'edit_user' => $user,
            'positions' => Position::all(),
            'countries' => DB::table('countries')->orderBy('name')->get()
        ]);
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
        // $image = $request->file('image');
        // // $path = $file->store('uploads', 'gcs');
        // dd($image->store('images', 'gcs'));
        if (auth()->user()->id == $user->id) { // edit my profile
            $rules = [
                'name' => 'required|max:125',
                'image' => 'image'
            ];
            if ($request->username != $user->username) { //user change username
                $rules['username'] = ['required', 'min:4', 'max:25', 'unique:users'];
            }

            $validatedData = $request->validate($rules);
            $validatedData['country_id'] = $request->country;
            $validatedData['age'] = $request->age;
            $validatedData['instagram'] = Str::lower(clean($request->instagram));
            $validatedData['github'] = Str::lower(clean($request->github));
            $validatedData['birthday'] = $request->birthday;
            $validatedData['bio'] = $request->bio;
            if ($request->file('image')) { //user change image
                //delete old photo in the storage when user update their photo profile 
                if ($user->image && $user->image != 'user-images/undraw_profile.svg') { // && = if old image != default photo profile
                    Storage::delete($user->image);
                }
                $validatedData['image'] = $request->file('image')->store('user-images');
            }
            User::where('id', auth()->user()->id)
                ->update($validatedData);
            return redirect('/home')->with('success', "Profile updated!");
        } else { //edit user profile by CEO
            if (auth()->guest() || auth()->user()->position->name !== "CEO") {
                abort(403);
            }
            $rules = [
                'name' => 'required|max:125',
                'image' => 'image'
            ];
            if ($request->username != $user->username) {
                $rules['username'] = ['required', 'min:4', 'max:25', 'unique:users'];
            }
            $validatedData = $request->validate($rules);
            $validatedData['position_id'] = $request->position;
            $validatedData['country_id'] = $request->country;
            $validatedData['age'] = $request->age;
            $validatedData['instagram'] = Str::lower(clean($request->instagram));
            $validatedData['github'] = Str::lower(clean($request->github));
            $validatedData['birthday'] = $request->birthday;
            $validatedData['bio'] = $request->bio;
            if ($request->file('image')) { //user change image
                //delete old photo in the storage when updating user photo profile by CEO 
                if ($user->image && $user->image != 'user-images/undraw_profile.svg') { // && = if old image != default photo profile 
                    Storage::delete($user->image);
                }
                $validatedData['image'] = $request->file('image')->store('user-images');
            }
            User::where('id', $user->id)
                ->update($validatedData);
            return redirect('/dashboard/users')->with('success', "Profile updated!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->guest() || auth()->user()->position->name !== "CEO") {
            abort(403);
        }
        $tickets = Ticket::where('creator_id', $user->id)->get(); //get user ticket
        foreach ($tickets as $ticket) {
            Ticket::destroy($ticket->id); //deleting user ticket
        }
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('deleted', "User has been deleted!");
    }
}
