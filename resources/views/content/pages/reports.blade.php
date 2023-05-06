@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes en pdf')

@section('content')
<h4>Reporte en PDF</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{ route('reports.create') }}" class="btn btn-primary">Crear nuevo Reporte</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Creado en</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($reports as $report)
        <tr>
        </tr>
        <td>{{$report->id}}</td>
        <td>{{$report->created_at}}</td>
        <td>
          <a href="{{$report->url}}">Download</a> | <a href="{{ route('reports.destroy', $report->id) }}">Borrar</a>
        </td>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
