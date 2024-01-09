<?php

namespace App\Http\Controllers;

use App\Mail\TicketConfirmation;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function manage()
    {
        $eventId = Event::pluck('id')->first();
        $tickets = Ticket::all();
        $event = Event::find($eventId); // Replace $eventId with the actual event ID

        return view('bookings.manage')->with('tickets', $tickets)->with('event', $event);
    }

    public function create($eventId)
    {
        $tickets = Ticket::get('id');
        $events = Event::findOrFail($eventId);
        $users = User::all(); // You may want to retrieve users based on your logic

        return view('bookings.create', compact('events', 'users','tickets'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'event_id' => 'required',
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'ticket_count' => 'required',
        ]);
        
        $event = Event::select('end_date', 'remaining_tickets')->where('id', $request['event_id'])->first();
        $endData = explode(" ", $event['end_date']);
        $tickets = $event['remaining_tickets'] - $request['ticket_count'];

        Event::where('id', $request['event_id'])->update(['remaining_tickets' => $tickets]);
       
        $ticket = new Ticket();
        $ticket->event_id = $request['event_id'];
        $ticket->name = $request->input('name');
        $ticket->mobile = $request->input('mobile_no');
        $ticket->email = $request->input('email');
        $ticket->ticket_count = $request->input('ticket_count');
        $ticket->booking_date = Carbon::now()->toDateString();
        $ticket->expiry_date = $endData[0];
    

        $ticket->save();

        // Send email with ticket details
        $mailData = [
            'ticket' => $ticket,
            // Add any other data you want to pass to the email view
        ];
        $adminEmail = $request->input('email');
        Mail::to($adminEmail)->send(new TicketConfirmation($mailData));

        return redirect()->route('events.show', $request->input('event_id'))
            ->with('success', 'Tickets booked successfully! An email has been sent.');
    }
}
