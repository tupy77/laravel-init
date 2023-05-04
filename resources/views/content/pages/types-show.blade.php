@php
$configData = Helper::appClasses();
$options = [
    (object)['name' => 'Monitor', 'value' => 'bx bx-tv', 'dataIcon' => 'bx bx-tv'],
      (object)['name' => 'Ordenador', 'value' => 'bx bx-desktop', 'dataIcon' => 'bx bx-desktop'],
      (object)['name' => 'Impresora', 'value' => 'bx bx-printer', 'dataIcon' => 'bx bx-printer'],
      (object)['name' => 'Movil', 'value' => 'bx bx-mobile', 'dataIcon' => 'bx bx-mobile'],
      (object)['name' => 'Router/Switch', 'value' => 'bx bx-hdd', 'dataIcon' => 'bx bx-hdd'],
  ];
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

          <div class="mb-3">
            <label for="selectpickerIcons" class="form-label">Icono</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"  data-tick-icon="bx-chex" data-style="btn-default" name="deviceType">
              @foreach($options as $option)
                  <option value="{{ $option->value }}" @if($type->icon == $option->value) selected @endif data-icon="{{ $option->dataIcon}}">{{ $option->name }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
