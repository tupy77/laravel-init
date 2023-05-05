@php
use App\Models\Type;

$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dispositivos')

@section('content')
    <h4>Dispositivos</h4>
    {{-- {{ $users }} --}}
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a class="btn btn-secondary" href="{{ route('pages-devices-create') }}">Añadir Dispositivo</a>
            <a class="btn btn-warning" href="{{ route('pages-devices-export') }}">XLMS</a>
            <a class="btn btn-warning" href="{{ route('pages-devices-export-view') }}">XLMS from View</a>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($devices as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td><span class="icon {{ Type::find($item->type_id)->icon }}"></span></td>

                            <td>
                                @if ($item->active)
                                    <a href="{{ route('pages-devices-switch', $item->id) }}">
                                    <span class="badge bg-success">Activo</span></a>
                                @else
                                    <a href="{{ route('pages-devices-switch', $item->id) }}">
                                    <span class="badge bg-danger">Inactivo</span></a>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('pages-devices-show', $item->id) }}">Editar</a> | <a
                                    href="{{ route('pages-devices-destroy', $item->id) }}">Elimninar</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>




@endsection
