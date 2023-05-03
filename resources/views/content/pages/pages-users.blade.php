@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicacion</h4>
<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{ route('users.create') }}" class="btn btn-primary" style="text-color: white">Crear Usuario</a>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td class="badge bg-label-info me-1">{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at }}</td>
              <td><a href="{{ route('users.show', $user->id ) }}">Editar</a> | <a href="{{ route('users.destroy', $user->id ) }}">Borrar</a></td>
            </tr>
          @endforeach
    </table>
  </div>
</div>
@endsection
