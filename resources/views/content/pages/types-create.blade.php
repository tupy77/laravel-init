@php
  $configData = Helper::appClasses();
  $opciones = [
    (object)['name' => 'Monitor','value' => 'bx bx-tv', 'dataIcon' => 'bx bx-tv'],
      (object)['name' => 'Ordenador','value' => 'bx bx-desktop', 'dataIcon' => 'bx bx-desktop'],
      (object)['name' => 'Impresora','value' => 'bx bx-printer', 'dataIcon' => 'bx bx-printer'],
      (object)['name' => 'Movil','value' => 'bx bx-mobile', 'dataIcon' => 'bx bx-mobile'],
      (object)['name' => 'Router/Switch','value' => 'bx bx-hdd', 'dataIcon' => 'bx bx-hdd'],
  ];
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear usuario')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nuevo tipo</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('types.store') }}">
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
            <input type="text" name="name" class="form-control" id="basic-default-fullname" value="{{ old('name') }}" placeholder="Monitor" required/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input type="" name="description" class="form-control" id="basic-default-fullname" value="{{ old('description') }}"/>
          </div>

          <div class="mb-3">
            <label for="selectpickerIcons" class="form-label">Icono</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx">
              @foreach($opciones as $opcion)
                  <option value="{{ $opcion->value }}" data-icon="{{ $opcion->dataIcon}}">{{ $opcion->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Activo</label>
            <input type="checkbox" name="active" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
