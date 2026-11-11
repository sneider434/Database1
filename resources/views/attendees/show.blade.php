@extends('layouts.app')

@section('title', 'Attendee details')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    @include('layouts.partials.msg')

    <section class="content">
        <div class="container-fluid">

            {{-- Data --}}
            <div class="card">

                <div class="card-header bg-secondary">
                    <h3>{{ $attendee->name }} {{ $attendee->last_name }}</h3>
                </div>
                <div class="card-body">
                    @if($attendee->image)
                    <img src="{{ asset('uploads/attendees/'.$attendee->image) }}" alt="Photo" style="max-width:150px;">
                    @endif
                    <p><strong>Email:</strong> {{ $attendee->email }}</p>
                    <p><strong>Phone:</strong> {{ $attendee->phone }}</p>
                </div>
            </div>

            {{-- Events--}}
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>Registered events</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse($attendee->registration as $registration)
                        <li>
                            {{ $registration->event->name }} -
                            {{ \Carbon\Carbon::parse($registration->event->start_date)->format('Y-m-d') }}
                        </li>
                        @empty
                        <li> No Registered events</li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('attendees.index') }}" class="btn btn-danger btn-flat">Back</a>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
