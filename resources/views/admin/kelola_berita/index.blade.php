@extends('layouts.app') {{-- kalau ada layout, kalau tidak hapus baris ini --}}

@section('content')
<div class="container mx-auto p-8 bg-white min-h-screen">
  <h2 class="text-2xl font-bold mb-6 text-blue-900">Kelola Berita (Reporter)</h2>
  <a href="{{ route('reporter.berita.create') }}" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-4 py-2 rounded transition mb-4 inline-block">+ Tambah Berita</a>
  <table class="min-w-full border border-blue-900 rounded-lg overflow-hidden">
    <thead>
      <tr class="bg-blue-100 text-blue-900">
        <th class="py-2 px-4">No</th>
        <th class="py-2 px-4">Judul</th>
        <th class="py-2 px-4">Kategori</th>
        <th class="py-2 px-4">Tanggal</th>
        <th class="py-2 px-4">Username</th>
        <th class="py-2 px-4">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($beritas as $index => $berita)
        <tr class="border-b">
          <td class="py-2 px-4">{{ $index + 1 }}</td>
          <td class="py-2 px-4">{{ $berita->judul }}</td>
          <td class="py-2 px-4">{{ $berita->kategori }}</td>
          <td class="py-2 px-4">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</td>
          <td class="py-2 px-4">{{ $berita->penulis }}</td>
          <td class="py-2 px-4">
            <a href="{{ route('reporter.berita.edit', $berita->id) }}" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-3 py-1 rounded transition">Edit</a>
            <form action="{{ route('reporter.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-blue-100 hover:bg-blue-200 text-blue-900 font-semibold px-3 py-1 rounded transition ml-2" onclick="return confirm('Yakin hapus berita ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="py-4 px-4 text-center text-blue-400">Belum ada berita</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
