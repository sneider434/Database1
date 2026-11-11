<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\Registration;

class HomeController extends Controller
{
    public function index()
    {
        $totalEvents        = Event::count();
        $totalAttendees     = Attendee::count();
        $totalRegistrations = Registration::count();
        $upcomingEvents     = Event::where('start_date', '>=', now())->count();

        return view('home', compact(
            'totalEvents', 'totalAttendees', 'totalRegistrations', 'upcomingEvents'
        ));
    }
}
