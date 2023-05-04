@php
  $configData = Helper::appClasses();
  $options = [
    (object)['deviceType' => 'Monitor','value' => 'valbx bx-tv', 'dataIcon' => 'datbx bx-tv'],
      (object)['deviceType' => 'Ordenador','value' => 'bx bx-desktop', 'dataIcon' => 'bx bx-desktop'],
      (object)['deviceType' => 'Impresora','value' => 'bx bx-printer', 'dataIcon' => 'bx bx-printer'],
      (object)['deviceType' => 'Movil','value' => 'bx bx-mobile', 'dataIcon' => 'bx bx-mobile'],
      (object)['deviceType' => 'Router/Switch','value' => 'bx bx-hdd', 'dataIcon' => 'bx bx-hdd'],
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
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-chex" name="deviceType">
              @foreach($options as $option)
                  <option value="{{ $option->value }}" data-icon="{{ $option->dataIcon}}">{{ $option->deviceType }}</option>
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
