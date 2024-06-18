<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'ticket','event'])->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $events = Event::where('tickets_available', '>', 0)->get();

        return view('admin.bookings.create', compact('events'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        
        // Check if enough tickets are available
        if ($ticket->quantity_available < $request->quantity) {
            return response()->json(['message' => 'Not enough tickets available'], 400);
        }

        $booking = new Booking();
        $booking->user_id = Auth::id(); // assuming users are authenticated
        $booking->ticket_id = $request->ticket_id;
        $booking->quantity = $request->quantity;
        $booking->save();

        // Update ticket availability
        $ticket->quantity_available -= $request->quantity;
        $ticket->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking successful');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        

        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Booking $booking)
    {

    }
}