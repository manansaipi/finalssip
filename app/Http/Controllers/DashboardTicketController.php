<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Telegram\Bot\Laravel\Facades\Telegram;

class DashboardTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_all_tickets', [
            'active' => 'tickets',
            'tickets' => Ticket::all(),
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

        // return $request->file('image')->store('post-image');
        $validatedData = $request->validate([
            'ticket_title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('ticket-images');
        }

        $validatedData['creator_id'] = auth()->user()->id;
        $validatedData['status_ticket'] = 0;

        // store ticket
        $ticket = Ticket::create($validatedData);

        $ticket_id = $ticket->id;

        //create user(auth) notifications
        // Notification::create([
        //     'user_id' => auth()->user()->id,
        //     'ticket_id' => $ticket_id,
        //     'message' => 'New Ticket !',
        // ]);


        // take all admins
        $admins = User::whereIn('position_id', [1, 2])->get();

        // store notifications to db for all admins
        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'creator_id' => auth()->user()->id,
                'ticket_id' => $ticket_id,
                'message' => 'created new ticket !',
            ]);
        }

        Telegram::sendMessage([
            'chat_id' => 1714741980,
            'text' => auth()->user()->name . ' created new ticket !',
        ]);
        return redirect('/dashboard/myticket')->with('success', "Your ticket has been added!");
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket, Request $request,)
    {
        DB::beginTransaction(); // Start a database transaction

        $notification_id = $request->notification_id; // $request->notification_id is a string

        if (strpos($notification_id, '[')) { // check the string if contain '[]' then convert them into an array
            $notification_id = json_decode($request->notification_id); // string'[1, 2, 3]' to array of number
            Notification::where('user_id', auth()->user()->id)
                ->whereIn('id', $notification_id) // whereIn check value inside an array
                ->update([
                    'is_read' => true
                ]);
        } else { // else the string doesn't contain '[]' means that is an int
            Notification::where('user_id', auth()->user()->id)
                ->where('id', $notification_id)
                ->update([
                    'is_read' => true
                ]);
        }
        DB::commit(); // Commit the transaction. this will wait till all actions success before continue to the next part

        return view('dashboard.detail_ticket', [
            'active' => 'tickets',
            'ticket' => $ticket,
            'total_notif' => Notification::where('user_id', auth()->user()->id)
                ->where('is_read', false)
                ->count(),
            'notifications' => Notification::where('user_id', auth()->user()->id)
                ->where('is_read', false)
                ->get()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {

        if (auth()->user()->id == $ticket->creator_id) { //update my ticket
            //cancel my ticket
            if ($request->status_ticket == 3) {
                $validatedData['status_ticket'] = 3;
                Ticket::where('id', $ticket->id)
                    ->update($validatedData);
                return redirect('/dashboard/myticket')->with('deleted', "Ticket canceled!");
            }
            $validatedData = $request->validate([
                'ticket_title' => 'required|max:255',
                'body' => 'required',
            ]);
            //edit my ticket
            Ticket::where('id', $ticket->id)
                ->update($validatedData);
            return redirect('/dashboard/myticket')->with('success', "Your ticket has been updated!");
        } else {  //update user ticket by IT Employee or CEO
            // if (auth()->guest() || auth()->user()->position->name == "Employee") {
            //     abort(403);
            // }
            $this->authorize('admin'); // using gate, logic same like above
            $validatedData['status_ticket'] = 1; //CONFIRM TICKET
            if ($ticket->status_ticket == 1) { // solved ticket goes here
                $validatedData = $request->validate([
                    'feedback' => 'required',
                ]);
                $validatedData['status_ticket'] = 2; //SOLVED TICKET
                $validatedData['solvedby_id'] = auth()->user()->id;
                Ticket::where('id', $ticket->id)
                    ->update($validatedData);
                Notification::create([
                    'user_id' => $ticket->creator->id,
                    'creator_id' => auth()->user()->id,
                    'ticket_id' => $ticket->id,
                    'message' => 'has solved',
                ]);
                return redirect('/dashboard/tickets')->with('success', "Successfully solved the ticket!");
            }
            // confirm ticket
            Ticket::where('id', $ticket->id)
                ->update($validatedData);
            Notification::create([
                'user_id' => $ticket->creator->id,
                'creator_id' => auth()->user()->id,
                'ticket_id' => $ticket->id,
                'message' => 'has confirm',
            ]);
            return redirect('/dashboard/tickets')->with('success', "Successfully confirmed the ticket!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {

        if (auth()->guest() || auth()->user()->position->name == "Employee") {
            abort(403);
        }
        //delete old image in the storage when CEO || IT Employee deleting user ticket 
        if ($ticket->image) {
            Storage::delete($ticket->image);
        }
        Ticket::destroy($ticket->id);

        return redirect('/dashboard/tickets')->with('deleted', "Ticket has been deleted!");
    }
}
