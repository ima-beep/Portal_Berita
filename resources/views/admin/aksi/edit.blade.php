@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-900">Edit Berita</h2>
    <form method="POST" action="{{ route('admin.berita.update', $berita->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Judul Berita</label>
            <input type="text" name="judul" value="{{ $berita->judul }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Jurusan</label>
            <select name="jurusan" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Sepeda Motor" {{ $berita->jurusan == 'Teknik Sepeda Motor' ? 'selected' : '' }}>Teknik Sepeda Motor</option>
                <option value="Teknik Kendaraan Ringan" {{ $berita->jurusan == 'Teknik Kendaraan Ringan' ? 'selected' : '' }}>Teknik Kendaraan Ringan</option>
                <option value="Agribisnis Tanaman dan Holtikultura" {{ $berita->jurusan == 'Agribisnis Tanaman dan Holtikultura' ? 'selected' : '' }}>Agribisnis Tanaman dan Holtikultura</option>
                <option value="Agribisnis Perbenihan Tanaman" {{ $berita->jurusan == 'Agribisnis Perbenihan Tanaman' ? 'selected' : '' }}>Agribisnis Perbenihan Tanaman</option>
                <option value="Desain Komunikasi Visual" {{ $berita->jurusan == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                <option value="Teknik Komputer dan Jaringan" {{ $berita->jurusan == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                <option value="Rekayasa Perangkat Lunak" {{ $berita->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Kategori</label>
            <select name="kategori" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Sekolah" {{ $berita->kategori == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                <option value="Kecamatan" {{ $berita->kategori == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                <option value="Kabupaten" {{ $berita->kategori == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                <option value="Provinsi" {{ $berita->kategori == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                <option value="Nasional" {{ $berita->kategori == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                <option value="Internasional" {{ $berita->kategori == 'Internasional' ? 'selected' : '' }}>Internasional</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $berita->tanggal }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Penulis</label>
            <input type="text" name="penulis" value="{{ $berita->penulis }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Isi Berita</label>
            <textarea name="isi" class="w-full border rounded px-3 py-2" rows="5" required>{{ $berita->isi }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold text-blue-900">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded px-3 py-2" accept="image/*">
            @if($berita->gambar)
                <div class="mt-2">
                    <span class="text-blue-900 font-semibold">Gambar saat ini:</span><br>
                    <img src="{{ $berita->gambar }}" alt="Gambar Berita" class="rounded-lg shadow mt-2 w-full max-w-xs">
                </div>
            @endif
        </div>
        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded transition">Update Berita</button>
    </form>
    <a href="{{ route('admin.dashboard') }}" class="inline-block mt-6 px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-800">Kembali</a>
</div>
@endsection
