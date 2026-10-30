@extends('layouts.app')

@section('title','Crear Asistente')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partials.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('attendees.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                {{-- Fila 1: name + last_name (6 + 6 = 12) --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Nombre <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="name" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="last_name">Apellido <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="last_name" name="last_name"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('last_name') }}">
                                            @error('last_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Fila 2: email + phone (6 + 6 = 12) --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Correo <strong style="color:red;">(*)</strong></label>
                                            <input type="email" id="email" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="phone">Teléfono</label>
                                            <input type="text" id="phone" name="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- Fila 3: foto --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Foto</label>
                                            <input type="file" id="image" name="image" accept="image/*"
                                                   class="form-control-file @error('image') is-invalid @enderror">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Fila 4: eventos --}}
                                <div class="form-group">
                                    <label>Inscribir en eventos</label>
                                    @forelse($events as $event)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                               id="event_{{ $event->id }}" name="events[]" value="{{ $event->id }}"
                                               {{ in_array($event->id, old('events', [])) ? 'checked' : '' }}>
                                        <label for="event_{{ $event->id }}" class="custom-control-label">
                                            {{ $event->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}
                                        </label>
                                    </div>
                                    @empty
                                    <p class="text-muted">No hay eventos creados</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('attendees.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
