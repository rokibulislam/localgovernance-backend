<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('event')->get();
        return response()->json($tickets);
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'quantity_available' => 'required|integer'
        ]);

        $ticket = Ticket::create($request->all());
        return response()->json($ticket, 201);
    }

    /**
     * Display the specified ticket.
     *
     * @param  Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return response()->json($ticket);
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'type' => 'string',
            'price' => 'numeric',
            'quantity_available' => 'integer'
        ]);

        $ticket->update($request->all());
        return response()->json($ticket);
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param  Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json(null, 204);
    }
}