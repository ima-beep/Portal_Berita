@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
  <h1 class="text-3xl font-bold text-purple-700 text-center mb-8">Tambah Berita Baru</h1>
  
  <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" 
        class="bg-white/90 rounded-2xl shadow-lg p-8 border border-purple-100 space-y-6">
    @csrf
    

    <!-- Judul -->
    <div>
      <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
      <input type="text" id="judul" name="judul" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
    </div>

    <!-- Jurusan -->
    <div>
      <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
      <input type="text" id="jurusan" name="jurusan" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
    </div

    <!-- Isi -->
    <div>
      <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
      <textarea id="isi" name="isi" rows="6" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none"></textarea>
    </div>

    <!-- Gambar -->
    <div>
      <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
      <input type="file" id="gambar" name="gambar" accept="image/*"
        class="w-full px-4 py-2 rounded-lg border border-purple-200 bg-white focus:ring-2 focus:ring-purple-300 focus:outline-none">
    </div>

    <!-- Kategori -->
    <div>
      <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
      <select id="kategori" name="kategori" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
        <option value="">-- Pilih Kategori --</option>
        <option value="ekonomi">Ekonomi</option>
        <option value="teknologi">Teknologi</option>
        <option value="olahraga">Olahraga</option>
        <option value="pendidikan">Pendidikan</option>
      </select>
    </div>

    <!-- Tanggal -->
    <div>
      <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
      <input type="date" id="tanggal" name="tanggal" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
    </div>

    <!-- Penulis -->
    <div>
      <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
      <input type="text" id="penulis" name="penulis" required
        class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
    </div>

    <!-- Tombol Submit -->
    <div class="text-center">
      <button type="submit"
        class="px-6 py-3 bg-gradient-to-r from-purple-400 to-pink-300 text-white font-medium rounded-lg shadow hover:opacity-90 transition">
        Simpan Berita
      </button>
    </div>
  </form>
</div>
@endsection
