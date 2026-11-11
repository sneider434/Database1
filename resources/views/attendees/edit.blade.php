@extends('layouts.app')

@section('title','Edit Attendee')

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
                        <form method="POST" action="{{ route('attendees.update', $attendee) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                {{-- Fila 1: name + last_name (6 + 6 = 12) --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="name" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('name',$attendee->name) }}">
                                            @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="last_name" name="last_name"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('last_name',$attendee->last_name) }}">
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
                                            <label for="email">Email <strong style="color:red;">(*)</strong></label>
                                            <input type="email" id="email" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('email',$attendee->email) }}">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" id="phone" name="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   autocomplete="off" value="{{ old('phone',$attendee->phone) }}">
                                            @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Photo</label>

                                            @if($attendee->image)
                                            <div class="mb-2">
                                                <img src="{{ asset('uploads/attendees/' . $attendee->image) }}"
                                                     alt="Foto actual" style="max-width:120px; border-radius:8px;">
                                            </div>
                                            @endif

                                            <input type="file" id="image" name="image" accept="image/*"
                                                   class="form-control-file @error('image') is-invalid @enderror">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="evento">Register for events</label>
                                    <select id="evento" name="events[]" class="form-control" multiple="multiple"
                                            data-placeholder="Seleccione eventos" style="width:100%;">
                                        @foreach($events as $event)
                                        <option value="{{ $event->id }}"
                                                {{ in_array($event->id, old('events', $inscritos)) ? 'selected' : '' }}>
                                            {{ $event->name }} - {{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('attendees.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
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
