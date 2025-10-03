@extends('layouts.app') {{-- kalau ada layout, kalau tidak hapus baris ini --}}

@section('content')
<div class="container">
  <h2>Kelola Berita (Reporter)</h2>
  <a href="{{ route('reporter.berita.create') }}" class="btn btn-tambah">+ Tambah Berita</a>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Username</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($beritas as $index => $berita)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $berita->judul }}</td>
          <td>{{ $berita->kategori }}</td>
          <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</td>
          <td>{{ $berita->penulis }}</td>
          <td>
            <a href="{{ route('reporter.berita.edit', $berita->id) }}" class="btn btn-edit">Edit</a>
            <form action="{{ route('reporter.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin hapus berita ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">Belum ada berita</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
