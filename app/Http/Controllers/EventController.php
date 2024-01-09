<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

use Symphony\Component\Console\Input;

class EventController extends Controller
{

    //user section 
    public function home()
    {
        $events = Event::all();
        return view('/event', ['events' => $events]);
    }


    /*user Managent*/

    public function manage()
    {
        $events = Event::all();
        return view('events.manage')->with('events', $events);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'tickets' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ticket_price' => 'required|string',
            'ticket_series' => 'required|string',
        ]);

        // Handle image upload
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'tickets' => $request->input('tickets'),
            'remaining_tickets' => $request->input('tickets'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'start_time' => $request->input('start_time'),
            'image' => $imageName, // Set the 'image' attribute
            'ticket_price' => $request->input('ticket_price'),
            'ticket_series' => $request->input('ticket_series'),
        ]);

        return redirect()->route('events.manage')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'tickets' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow it to be optional
            'ticket_price' => 'required|string',
            'ticket_series' => 'required|string',
        ]);

        // Update only if the image is provided
        if ($request->hasFile('image')) {
            // Handle image upload
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'tickets' => $request->tickets,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'image' => $imageName, // Save the image name
                'ticket_price' => $request->ticket_price,
                'ticket_series' => $request->ticket_series
            ]);
        } else {
            // Update without changing the image
            $event->update($request->except('image'));
        }

        return redirect()->route('events.manage')->with('success', 'Event updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.manage')->with('success', 'Event deleted successfully');
    }
}
