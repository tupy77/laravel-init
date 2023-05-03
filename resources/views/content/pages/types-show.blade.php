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
        <h5 class="mb-0">Modificar Tipo</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('types.update') }}">
          @csrf
          <input type="hidden" name="type_id" value="{{ $type->id }}">

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" value="{{ $type->name }}" name="name" class="form-control" id="basic-default-fullname"/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input type="text" value="{{ $type->description }}" name="description" class="form-control" id="basic-default-fullname"/>
          </div>

          <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
