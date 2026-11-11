@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    @include('layouts.partials.msg')

    <section class="content">
        <div class="container-fluid">

            {{-- Datos del evento --}}
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>{{ $event->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
                    <p><strong>Location:</strong> {{ $event->location }}</p>
                    <p><strong>Description:</strong> {{ $event->description }}</p>
                </div>
            </div>
            {{-- Lista de inscritos --}}
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>Registered attendees</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse($event->registration as $registration)
                        <li>{{ $registration->attendee->name }} {{ $registration->attendee->last_name }}</li>
                        @empty
                        <li>No Registered attendees</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
