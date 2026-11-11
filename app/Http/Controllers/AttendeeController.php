<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests\AttendeeRequest;


class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = Attendee::withCount('registration')->get();
        return view('attendees.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::orderBy('start_date')->get();
        return view('attendees.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendeeRequest $request)
    {
        $data = $request->validated();


        $imagename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = Str::slug($request->name) . '-' . Carbon::now()->toDateString()
                . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/attendees'), $imagename);
        }


        $attendeeData = collect($data)->except('events')->all();
        $attendeeData['image']         = $imagename;
        $attendeeData['status']        = 1;
        $attendeeData['registered_by'] = $request->user()->id;

        $attendee = Attendee::create($attendeeData);



        foreach ($request->input('events', []) as $eventId) {
            Registration::create([
                'attendee_id'       => $attendee->id,
                'event_id'          => $eventId,
                'registration_date' => now(),
                'registered_by'     => $request->user()->id,
            ]);
        }

        return redirect()->route('attendees.index')->with('success', 'Attendee created successfully');

    }
    public function show(Attendee $attendee)
    {
        $attendee->load('registration.event');
        return view('attendees.show', compact('attendee'));
    }
    public function edit(Attendee $attendee)
    {
        $events    = Event::orderBy('start_date')->get();
        $inscritos = $attendee->registration()->pluck('event_id')->toArray();
        return view('attendees.edit', compact('attendee', 'events', 'inscritos'));
    }

    public function update(AttendeeRequest $request, Attendee $attendee)
    {

        $data = $request->validated();

        $attendeeData = collect($data)->except(['events', 'image'])->all();

        if ($request->hasFile('image')) {

            if ($attendee->image && file_exists(public_path('uploads/attendees/' . $attendee->image))) {
                unlink(public_path('uploads/attendees/' . $attendee->image));
            }

            $image = $request->file('image');
            $imagename = Str::slug($request->name) . '-' . Carbon::now()->toDateString()
                . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/attendees'), $imagename);

            $attendeeData['image'] = $imagename;
        }

        $attendee->update($attendeeData);

        $nuevos  = collect($request->input('events', []))->map(fn ($id) => (int) $id);
        $actuales = $attendee->registration()->pluck('event_id');


        $attendee->registration()->whereNotIn('event_id', $nuevos)->delete();


        foreach ($nuevos->diff($actuales) as $eventId) {
            $attendee->registration()->create([
                'event_id'          => $eventId,
                'registration_date' => now(),
                'registered_by'     => $request->user()->id,
            ]);
        }

        return redirect()->route('attendees.index')->with('success', 'Attendee updated successfully');

    }


    public function destroy(Attendee $attendee)
    {
        $attendee->registration()->delete();
        if ($attendee->image && file_exists(public_path('uploads/attendees/' . $attendee->image))) {
            unlink(public_path('uploads/attendees/' . $attendee->image));
        }
        $attendee->delete();
        return redirect()->route('attendees.index')->with('success', 'Attendee deleted successfully');
    }
}
