@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicacion</h4>
@role('admin')
<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{ route('users.create') }}" class="btn btn-primary" style="text-color: white">Crear Usuario</a>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Admin</th>
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
              {{-- <td>{{ $user->hasRole('admin') ? 'Si' : 'No' }}</td> --}}
              <td>
                @if ($user->hasRole('admin'))
                <a href="{{ route('user.switch-role', $user->id) }}">
                  <span class="badge rounded-pill bg-success">Administrador</span></a>
                @else
                  <a href="{{ route('user.switch-role', $user->id) }}">
                  <span class="badge rounded-pill bg-danger">Usuario</span></a>
                @endif
              </td>
              <td>{{ $user->created_at }}</td>
              <td><a href="{{ route('users.show', $user->id ) }}">Editar</a> | <a href="{{ route('users.destroy', $user->id ) }}">Borrar</a></td>
            </tr>
          @endforeach
    </table>
  </div>
</div>
@else
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Acceso denegado</h4>
  <p>No tienes permisos para acceder a esta pagina.</p>
  <hr>
  <p class="mb-0">Si crees que esto es un error, ponte en contacto con el administrador.</p>
</div>
@endrole
@endsection
