<table>
  <thead>
  <tr>
      <th>Name</th>
      <th>Description</th>
  </tr>
  </thead>
  <tbody>
  @foreach($devices as $device)
      <tr>
          <td>{{ $device->name }}</td>
          <td>{{ $device->description }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
