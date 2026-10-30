@extends('layouts.app')

@section('title','Attendee List ')

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>@yield('title')</span>
                                <a href="{{ route('attendees.create') }}" class="btn btn-light btn-sm">New Attendee</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                <tr>
                                    <th>Photo</th>
                                    <th width="10px">ID</th>
                                    <th>Name</th>
                                    <th>last_name</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>registered events</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($attendees as $attendee)
                                <tr>
                                    <td>
                                    @if($attendee->image)
                                    <img src="{{ asset('uploads/attendees/' . $attendee->image) }}"
                                         alt="Foto" style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                                    @endif
                                    </td>
                                    <td>{{ $attendee->id }}</td>
                                    <td>{{ $attendee->name }}</td>
                                    <td>{{ $attendee->last_name }}</td>
                                    <td>{{ $attendee->email }}</td>
                                    <td>{{ $attendee->phone }}</td>
                                    <td>{{ $attendee->registration_count }}</td>
                                    <td>{{ $attendee->status}}</td>


                                    <td>
                                        <a href="{{ route('attendees.edit', $attendee) }}" class="btn btn-info btn-sm" title="Editar">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('attendees.show', $attendee) }}" class="btn btn-success btn-sm" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('attendees.destroy', $attendee) }}" method="POST"
                                              onsubmit="return confirm('¿Eliminar este Asistente?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
