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
                            @yield('title')
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Attendee</th>
                                    <th width="60px">Estado</th>
                                    <th width="90px">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendees as $attendee)
                                <tr>
                                    <td>{{ $attendee->id }}</td>
                                    <td>{{ $attendee->name }}</td>
                                    <td>
                                        {{ $attendee->status}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                        <form class="d-inline delete-form" action="#"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
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
