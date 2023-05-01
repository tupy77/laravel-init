@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos')

@section('content')
<h4>Tipos de dispositivos</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{route('types.create')}}" class="btn btn-primary">Añadir nuevo tipo</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Activo</th>
          <th>Creado en</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
        <tr>
          <td>{{ $type->id }}</td>
          <td>{{ $type->name }}</td>
          <td>{{ $type->description }}</td>
          <td>
            @if ($type->active)
            <a href="{{route('types.switch', $type->id)}}"><span class="badge rounded-pill bg-info">SÍ</span></a>
            @else
            <a href="{{route('types.switch', $type->id)}}"><span class="badge rounded-pill bg-secondary">NO</span></a>
            @endif
          </td>
          <td>{{ $type->created_at }}</td>
          <td><a href="{{ route('types.show', $type->id) }}">Editar</a> | <a href="{{ route('types.destroy', $type->id) }}">Borrar</a></td>
          {{-- <td>
            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Borrar</button>
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
