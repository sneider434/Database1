@extends('layouts.app')

@section('title','Crear Evento')

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
                        <form method="POST" action="{{ route('events.store') }}">
                            @csrf
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">name <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="name" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="Por ejemplo, Conferencia anual"
                                                   autocomplete="off"  value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="start_date">start_date <strong style="color:red;">(*)</strong></label>
                                            <input type="date" id="start_date" name="start_date"
                                                   class="form-control @error('start_date') is-invalid @enderror"
                                                   value="{{ old('start_date') }}">
                                            @error('start_date')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="location">location <strong style="color:red;">(*)</strong></label>
                                            <input type="text" id="location" name="location"
                                                   class="form-control @error('location') is-invalid @enderror"
                                                   placeholder="Por ejemplo, Auditorio principal"
                                                   autocomplete="off"  value="{{ old('location') }}">
                                            @error('location')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Fila 2: description (12) --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Descripción</label>
                                            <textarea id="description" name="description" rows="4"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      placeholder="Describe brevemente el evento">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('events.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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
