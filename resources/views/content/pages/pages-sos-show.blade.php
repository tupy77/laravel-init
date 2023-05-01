@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Modificar sistema operativo')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modificar sistema operativo</h5>
      </div>

      <div class="card-body">

        <form method="POST" action="{{route('sos.update')}}">
          @csrf
          <input type="hidden" name="so_id" value="{{$so->id}}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input so="text" value="{{$so->name}}" name="name" class="form-control" id="basic-default-fullname" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input so="text" value="{{$so->version}}" name="version" class="form-control" id="basic-default-fullname" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input so="text" value="{{$so->description}}" name="description" class="form-control" id="basic-default-fullname" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Activo</label>
            <input so="text" value="{{$so->active}}" name="active" class="form-control" id="basic-default-fullname" />
          </div>

          <button so="submit" class="btn btn-primary">Modificar</button>

        </form>

      </div>

    </div>
  </div>
</div>
@endsection
