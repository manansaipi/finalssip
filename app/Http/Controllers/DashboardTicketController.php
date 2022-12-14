<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            'ticket_title' => 'required|max:255',
            'body' => 'required',
        ]);
        $validatedData['creator_id'] = auth()->user()->id;
        $validatedData['status_ticket'] = 0;
        $validatedData['solvedby_id'] = 9999;
        $validatedData['feedback'] = "";
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

        if (auth()->user()->id == $ticket->creator_id) {
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

            Ticket::where('id', $ticket->id)
                ->update($validatedData);
            $validatedData['status_ticket'] = 3;



            return redirect('/dashboard/myticket')->with('success', "Your ticket has been updated!");
        } else {
            $validatedData['status_ticket'] = 1;
            if ($ticket->status_ticket == 1) {
                $validatedData = $request->validate([
                    'feedback' => 'required',
                ]);
                $validatedData['status_ticket'] = 2;
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

        Ticket::destroy($ticket->id);

        return redirect('/dashboard/tickets')->with('deleted', "Your ticket has been deleted!");
    }
}
