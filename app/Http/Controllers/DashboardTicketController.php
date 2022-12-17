<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        Ticket::create($validatedData);

        return redirect('/dashboard/myticket')->with('success', "Your ticket has been added!");
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('dashboard.detail_ticket', [
            'active' => 'tickets',
            'ticket' => $ticket
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
            if (auth()->guest() || auth()->user()->position->name == "Employee") {
                abort(403);
            }
            $validatedData['status_ticket'] = 1; //CONFIRM TICKET
            if ($ticket->status_ticket == 1) {
                $validatedData = $request->validate([
                    'feedback' => 'required',
                ]);
                $validatedData['status_ticket'] = 2; //SOLVED TICKET
                $validatedData['solvedby_id'] = auth()->user()->id;
                Ticket::where('id', $ticket->id)
                    ->update($validatedData);
                return redirect('/dashboard/tickets')->with('success', "Successfully solved the ticket!");
            }
            Ticket::where('id', $ticket->id)
                ->update($validatedData);
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
