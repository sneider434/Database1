<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::withCount('registration')->get();
        return view('events.index', compact('events'));
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
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $data['status']        = 1;
        $data['registered_by'] = $request->user()->id;
        Event::create($data);
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show(Event $event)
    {
        $event->load('registration.attendee');
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->registration()->delete();   // avoids foreign key error
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

}
