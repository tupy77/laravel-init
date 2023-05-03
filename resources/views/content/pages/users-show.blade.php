@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear usuario')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nuevo usuario</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('users.update') }}">
          @csrf
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" value="{{ $user->email }}" name="email" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
              <span class="input-group-text" id="basic-default-email2">@example.com</span>
            </div>
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Contraseña antigua</label>
            <input type="password"  name="old_password" class="form-control" id="basic-default-fullname"/>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Contraseña nueva</label>
            <input type="password"  name="new_password" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
