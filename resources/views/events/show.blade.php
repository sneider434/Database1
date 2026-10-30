@extends('layouts.app')

@section('title', 'Detalle del Evento')

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
                    <p><strong>Fecha:</strong> {{ $event->start_date , \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}</p>
                    <p><strong>Lugar:</strong> {{ $event->location }}</p>
                    <p><strong>Descripción:</strong> {{ $event->description }}</p>
                </div>
            </div>

            {{-- Formulario para inscribir --}}
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>Inscribir asistente</h3>
                </div>
                <form method="POST" action="{{ route('events.inscribir', $event) }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attendee_id">Asistente</label>
                                    <select name="attendee_id" id="attendee_id"
                                            class="form-control @error('attendee_id') is-invalid @enderror" required>
                                        <option value="">Seleccione asistente</option>
                                        @foreach($attendees as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }} {{ $a->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('attendee_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="notes">Notas</label>
                                    <input type="text" name="notes" id="notes" class="form-control"
                                           placeholder="Opcional" value="{{ old('notes') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Inscribir</button>
                        <a href="{{ route('events.index') }}" class="btn btn-danger btn-flat">Atras</a>
                    </div>
                </form>
            </div>

            {{-- Lista de inscritos --}}
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>Asistentes inscritos</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse($event->registration as $registration)
                        <li>{{ $registration->attendee->name }} {{ $registration->attendee->last_name }}</li>
                        @empty
                        <li>Sin asistentes inscritos</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
