@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Sistemas Operativos')

@section('content')
<h4>Sistemas Operativos</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{route('sos.create')}}" class="btn btn-primary">Añadir nuevo tipo</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Versión</th>
          <th>Descripción</th>
          <th>Activo</th>
          <th>Creado en</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sos as $so)
        <tr>
          <td>{{ $so->id }}</td>
          <td>{{ $so->name }}</td>
          <td>{{ $so->version }}</td>
          <td>{{ $so->description }}</td>
          <td>
            @if ($so->active)
            <a href="{{route('sos.switch', $so->id)}}"><span class="badge rounded-pill bg-info">SÍ</span></a>
            @else
            <a href="{{route('sos.switch', $so->id)}}"><span class="badge rounded-pill bg-secondary">NO</span></a>
            @endif
          </td>
          <td>{{ $so->created_at }}</td>
          <td><a href="{{ route('sos.show', $so->id) }}">Editar</a> | <a href="{{ route('sos.destroy', $so->id) }}">Borrar</a></td>
          {{-- <td>
            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button so="submit" class="btn btn-danger">Borrar</button>
            </form>
          </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>

    </table>
  </div>
</div>
@endsection
