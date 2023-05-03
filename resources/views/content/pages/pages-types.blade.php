@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos')

@section('content')
<h4>Tipos de dispositivos</h4>
<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{ route('types.create') }}" class="btn btn-primary" style="text-color: white">Añadir nuevo tipo</a>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($types as $type)
            <tr>
              <td>{{ $type->id }}</td>
              <td class="badge bg-label-info me-1">{{ $type->name }}</td>
              <td>{{ $type->description }}</td>
              <td>
                  @if ($type->active)
                    <a href="{{ route('types.switch', $type->id) }}"><span class="badge rounded-pill bg-success">SI</span></a>
                  @else
                  <a href="{{ route('types.switch', $type->id) }}"><span class="badge rounded-pill bg-dark">NO</span></a>
                  @endif
              </td>
              <td>{{ $type->created_at }}</td>
              <td><a href="{{ route('types.show', $type->id ) }}">Editar</a> | <a href="{{ route('types.destroy', $type->id ) }}">Borrar</a></td>
            </tr>
          @endforeach
    </table>
  </div>
</div>
@endsection
