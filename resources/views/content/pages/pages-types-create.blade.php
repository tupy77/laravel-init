@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear nuevo tipo')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando un tipo nuevo</h5>
      </div>

      <div class="card-body">

        <form method="POST" action="{{route('types.store')}}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Monitor" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripción</label>
            <input type="text" name="description" class="form-control" id="basic-default-fullname" />
          </div>

          {{-- <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Activo</label>
            <input type="checkbox" name="active" class="form-control" id="basic-default-fullname" />
          </div> --}}


          <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

      </div>

    </div>
  </div>
</div>
@endsection
