@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner"><h3>{{ $totalEvents }}</h3><p>Events</p></div>
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <a href="{{ route('events.index') }}" class="small-box-footer">View events <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner"><h3>{{ $totalAttendees }}</h3><p>Attendees</p></div>
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <a href="{{ route('attendees.index') }}" class="small-box-footer">View attendees <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner"><h3>{{ $totalRegistrations }}</h3><p>Registrations</p></div>
                        <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                        <a href="{{ route('events.index') }}" class="small-box-footer">View details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner"><h3>{{ $upcomingEvents }}</h3><p>Upcoming events</p></div>
                        <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                        <a href="{{ route('events.index') }}" class="small-box-footer">View events <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
