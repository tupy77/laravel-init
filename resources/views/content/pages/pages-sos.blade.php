@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Sistemas Operativos')

@section('content')
<h4>Sistemas operativos</h4>
<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{ route('sos.create') }}" class="btn btn-primary" style="text-color: white">Añadir nuevo S.O.</a>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Version</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($sos as $so)
            <tr>
              <td>{{ $so->id }}</td>
              <td class="badge bg-label-info me-1">{{ $so->name }}</td>
              <td>{{ $so->version }}</td>
              <td>{{ $so->description }}</td>
              <td>
                  @if ($so->active)
                    <a href="{{ route('sos.switch', $so->id) }}"><span class="badge rounded-pill bg-success">SI</span></a>
                  @else
                  <a href="{{ route('sos.switch', $so->id) }}"><span class="badge rounded-pill bg-dark">NO</span></a>
                  @endif
              </td>
              <td>{{ $so->created_at }}</td>
              <td><a href="{{ route('sos.show', $so->id ) }}">Editar</a> | <a href="{{ route('sos.destroy', $so->id ) }}">Borrar</a></td>
            </tr>
          @endforeach
    </table>
  </div>
</div>
@endsection
