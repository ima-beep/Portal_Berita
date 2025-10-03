@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Kelola Berita</h2>
    <a href="{{ route('admin.berita.create') }}" 
       class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded">
       + Tambah Berita
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto bg-white border-2 border-blue-900 rounded-lg shadow">
    <table class="w-full border-collapse">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="px-4 py-2 border border-blue-900">No</th>
                <th class="px-4 py-2 border border-blue-900">Judul</th>
                <th class="px-4 py-2 border border-blue-900">Jurusan</th>
                <th class="px-4 py-2 border border-blue-900">Kategori</th>
                <th class="px-4 py-2 border border-blue-900">Tanggal</th>
                <th class="px-4 py-2 border border-blue-900">Penulis</th>
                <th class="px-4 py-2 border border-blue-900">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $index => $berita)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border border-blue-900 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-2 border border-blue-900">{{ $berita->judul }}</td>
                <td class="px-4 py-2 border border-blue-900">{{ $berita->jurusan}}</td>
                <td class="px-4 py-2 border border-blue-900">{{ $berita->kategori }}</td>
                <td class="px-4 py-2 border border-blue-900">{{ $berita->tanggal }}</td>
                <td class="px-4 py-2 border border-blue-900">{{ $berita->penulis }}</td>
                <td class="px-4 py-2 border border-blue-900 text-center">
                    <a href="{{ route('admin.berita.edit', $berita->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                onclick="return confirm('Yakin ingin menghapus berita ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-6 border border-blue-900 text-center text-gray-500">
                    Belum ada berita.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
