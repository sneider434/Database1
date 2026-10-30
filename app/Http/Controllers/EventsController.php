<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Attendee;


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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'location'    => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['status']        = 1;
        $data['registered_by'] = $request->user()->id;
        Event::create($data);   // antes: $request->all()
        return redirect()->route('events.index')->with('success', 'Evento creado correctamente');
    }

    public function show(Event $event)
    {
        $event->load('registration.attendee');
        $attendees = Attendee::orderBy('name')->get();
        return view('events.show', compact('event', 'attendees'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'location'    => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente');
    }

    public function destroy(Event $event)
    {
        $event->registration()->delete();   // evita error de llave foránea
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente');
    }

    public function inscribir(Request $request, Event $event)
    {
        $data = $request->validate([
            'attendee_id' => 'required|exists:attendees,id',
            'notes'       => 'nullable|string',
        ]);

        // evita duplicados
        if ($event->registration()->where('attendee_id', $data['attendee_id'])->exists()) {
            return back()->with('error', 'Ese asistente ya está inscrito');
        }

        $event->registration()->create([
            'attendee_id'       => $data['attendee_id'],
            'registration_date' => now(),
            'notes'             => $data['notes'] ?? null,
            'registered_by'     => $request->user()->id,
        ]);

        return redirect()->route('events.show', $event)->with('success', 'Asistente inscrito');
    }

}
