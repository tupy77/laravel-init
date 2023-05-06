<h1>Dispositivos</h1>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Serial number</th>
    </tr>
  </thead>
  <tbody class="table-border-bottom-0">
    @foreach ($devices as $device)

    <tr>
      <th>{{ $device->id}}</th>
      <th>{{ $device->name}}</th>
      <th>{{ $device->description}}</th>
    </tr>

    @endforeach
  </tbody>
</table>
