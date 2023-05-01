@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear nuevo usuario')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando un usuario nuevo</h5>
      </div>

      <div class="card-body">

        <form method="POST" action="{{route('users.store')}}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre completo</label>
            <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" name="email" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
              <span class="input-group-text" id="basic-default-email2">@example.com</span>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Contraseña</label>
            <input type="password" name="password" class="form-control" id="basic-default-password"  />
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Repita contraseña</label>
            <input type="password" name="password2" class="form-control" id="basic-default-company"  />
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

      </div>

    </div>
  </div>
</div>
@endsection
