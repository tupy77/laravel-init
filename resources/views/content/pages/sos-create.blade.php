@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Sistema Operativo')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Nuevo Sistema Operativo</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('sos.store') }}">
          @csrf

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input so="text" name="name" class="form-control" id="basic-default-fullname" value="{{ old('name') }}" placeholder="Windows 11 Pro" required/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Version</label>
            <input so="" name="version" class="form-control" id="basic-default-fullname" value="{{ old('version') }}" placeholder="2.13" required/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input so="" name="description" class="form-control" id="basic-default-fullname" value="{{ old('description') }}"/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Activo</label>
            <input so="checkbox" name="active" class="form-control" id="basic-default-fullname"/>
          </div>
          <button so="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
