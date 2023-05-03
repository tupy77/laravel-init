@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Modificar tipo')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modificar tipo</h5>
      </div>

      <div class="card-body">

        <form method="POST" action="{{route('types.update')}}">
          @csrf
          <input type="hidden" name="type_id" value="{{$type->id}}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" value="{{$type->name}}" name="name" class="form-control" id="basic-default-fullname" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input type="text" value="{{$type->description}}" name="description" class="form-control" id="basic-default-fullname" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Activo</label>
            <input type="text" value="{{$type->active}}" name="active" class="form-control" id="basic-default-fullname" />
          </div>

          <button type="submit" class="btn btn-primary">Modificar</button>

        </form>

      </div>

    </div>
  </div>
</div>
@endsection
