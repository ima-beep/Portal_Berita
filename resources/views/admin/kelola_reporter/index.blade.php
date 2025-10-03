@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Kelola Reporter</h2>
  <a href="{{ route('reporters.create') }}" class="btn btn-tambah">+ Tambah Reporter</a>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reporters as $reporter)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $reporter->username }}</td>
        <td>
          <a href="{{ route('reporters.edit', $reporter->id) }}" class="btn btn-edit">Edit</a>
          <form action="{{ route('reporters.destroy', $reporter->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
