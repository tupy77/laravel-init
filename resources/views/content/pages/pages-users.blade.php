@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicación</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{route('users.create')}}" class="btn btn-primary">Crear usuario</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Creado en</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
          <td>Editar | Borrar</td>
          <td>
            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Borrar</button>
            </form> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    </table>
  </div>
</div>
@endsection
