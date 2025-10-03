<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Berita - Portal Berita</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 text-blue-900 min-h-screen">
  
  <!-- Container -->
  <div class="max-w-3xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold text-blue-900 text-center mb-8">Edit Berita</h1>
    
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white/90 rounded-2xl shadow-lg p-8 border border-blue-900 space-y-6">
      @csrf
      @method('PUT')

      <!-- Judul -->
      <div>
        <label for="judul" class="block text-sm font-medium text-blue-900 mb-2">Judul</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}"
          class="w-full px-4 py-2 rounded-lg border border-blue-900 text-blue-900 focus:ring-2 focus:ring-blue-300 focus:outline-none">
      </div>

      <!-- Isi -->
      <div>
        <label for="isi" class="block text-sm font-medium text-blue-900 mb-2">Isi Berita</label>
        <textarea id="isi" name="isi" rows="6"
          class="w-full px-4 py-2 rounded-lg border border-blue-900 text-blue-900 focus:ring-2 focus:ring-blue-300 focus:outline-none">{{ old('isi', $berita->isi) }}</textarea>
      </div>

      <!-- Gambar -->
      <div>
        <label for="gambar" class="block text-sm font-medium text-blue-900 mb-2">Ganti Gambar</label>
        <input type="file" id="gambar" name="gambar" accept="image/*"
          class="w-full px-4 py-2 rounded-lg border border-blue-900 bg-white text-blue-900 focus:ring-2 focus:ring-blue-300 focus:outline-none">
        @if($berita->gambar)
          <p class="text-sm text-gray-500 mt-2">Gambar saat ini: 
            <span class="text-purple-600 underline">{{ $berita->gambar }}</span>
          </p>
        @endif
      </div>

      <!-- Jurusan -->
      <div>
        <label for="jurusan" class="block text-sm font-medium text-blue-900 mb-2">Jurusan</label>
        <select id="jurusan" name="jurusan"
          class="w-full px-4 py-2 rounded-lg border border-blue-900 focus:ring-2 focus:ring-blue-300 focus:outline-none">
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

      <!-- Kategori -->
      <div>
        <label for="kategori" class="block text-sm font-medium text-blue-900 mb-2">Kategori</label>
        <select id="kategori" name="kategori"
          class="w-full px-4 py-2 rounded-lg border border-blue-900 focus:ring-2 focus:ring-blue-300 focus:outline-none">
          <option value="">-- Pilih Kategori --</option>
          <option value="Sekolah" {{ $berita->kategori == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
          <option value="Kecamatan" {{ $berita->kategori == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
          <option value="Kabupaten" {{ $berita->kategori == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
          <option value="Provinsi" {{ $berita->kategori == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
          <option value="Nasional" {{ $berita->kategori == 'Nasional' ? 'selected' : '' }}>Nasional</option>
          <option value="Internasional" {{ $berita->kategori == 'Internasional' ? 'selected' : '' }}>Internasional</option>
        </select>
      </div>

      <!-- Tanggal -->
      <div>
        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}"
          class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
      </div>

      <!-- Penulis -->
      <div>
        <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
        <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
          class="w-full px-4 py-2 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-300 focus:outline-none">
      </div>

      <!-- Tombol Submit -->
      <div class="flex justify-between">
        <a href="{{ route('admin.berita.index') }}"
          class="px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow hover:bg-gray-300 transition">
          Batal
        </a>
        <button type="submit"
          class="px-6 py-3 bg-gradient-to-r from-purple-400 to-pink-300 text-white font-medium rounded-lg shadow hover:opacity-90 transition">
          Update Berita
        </button>
      </div>
    </form>
  </div>
</body>
</html>
