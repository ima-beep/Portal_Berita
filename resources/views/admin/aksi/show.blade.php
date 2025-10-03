@extends('admin.layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-900">Detail Berita</h2>
    <div class="bg-white border-2 border-blue-900 rounded-lg shadow p-6">
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Judul:</span>
            <span>{{ $berita->judul }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Jurusan:</span>
            <span>{{ $berita->jurusan }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Kategori:</span>
            <span>{{ $berita->kategori }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Tanggal:</span>
            <span>{{ $berita->tanggal }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Penulis:</span>
            <span>{{ $berita->penulis }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Isi Berita:</span>
            <div class="mt-2 text-gray-800">{{ $berita->isi }}</div>
        </div>
        @if($berita->gambar)
        <div class="mb-4">
            <span class="font-semibold text-blue-900">Gambar:</span><br>
            <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="rounded-lg shadow mt-2 w-full max-w-xs">
        </div>
        @endif
    </div>
    <a href="{{ route('admin.dashboard') }}" class="inline-block mt-6 px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-800">Kembali</a>
</div>
@endsection
