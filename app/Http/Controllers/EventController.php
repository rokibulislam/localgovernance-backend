<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->get();
        
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $categories = EventCategory::all();
        $types = EventType::all();

        return view('admin.events.create', compact( 'categories', 'types' ) );
    }

    public function store(Request $request)
    {
        // dd( $request->all() );

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'type_id' => 'required|exists:event_types,id',
        ]);


        // dd( $validated );

        $event = new Event();

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->start_date  = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->location = $request->input('location');
        $event->category_id = $request->input('category_id');
        $event->type_id = $request->input('type_id');
        $event->created_by = Auth::id();

        $event->save();
        
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::with('tickets')->findOrFail($id);

        // dd( $event->tickets()->get() );

        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {   
        $categories = EventCategory::all();
        $types = EventType::all();

        return view('admin.events.edit', compact('event', 'categories', 'types' ));
    }


    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'type_id' => 'required|exists:event_types,id',
        ]);

        $event->update($request->all());
        
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }


    public function addTicket(Request $request, $eventId)
    {   
        // dd( $request->quantity );

        $request->validate([
            'type' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        $event = Event::findOrFail($eventId);
    
        $event->tickets()->create([
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('events.show', $eventId)->with('success', 'Ticket added successfully.');
    }


    public function purchase( Request $request, $eventId ) {

        $event = Event::findOrFail($eventId);

        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1'
        ]);


        $ticket = Ticket::findOrFail($request->ticket_id);
        
        if ($ticket->quantity < $request->quantity) {
            return back()->with('error', 'Not enough tickets available.');
        }

        // Adjust the ticket quantity
        $ticket->quantity -= $request->quantity;
        
        $ticket->save();

        // Save the purchase logic or create a booking record

        $mytime = Carbon::now();


          // Create a booking record
        Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'ticket_id' => $request->ticket_id,
            'quantity' => $request->quantity,
            'price'    => $ticket->price * $request->quantity,
            'booking_date' => $mytime->toDateTimeString(),
        ]);

        return back()->with('success', 'Tickets purchased successfully.');
    }
}
