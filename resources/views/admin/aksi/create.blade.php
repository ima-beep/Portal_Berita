
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Portal Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #fff;
            color: #0d1a38;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-blue-50">
    <div class="max-w-xl w-full bg-white border-2 border-blue-900 rounded-lg shadow p-4">
        <h2 class="text-2xl font-bold mb-6 text-blue-900">Tambah Berita</h2>
            <form method="POST" action="{{ route('admin.berita.store') }}" class="max-w-xl mx-auto">
                @csrf
                <div class="flex flex-wrap gap-6 mb-4">
                    <div class="flex-1 min-w-[220px]">
                        <label class="block mb-1 font-semibold text-blue-900">Judul Berita</label>
                        <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="flex-1 min-w-[220px]">
                        <label class="block mb-1 font-semibold text-blue-900">Jurusan</label>
                        <select name="jurusan" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                            <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                            <option value="Agribisnis Tanaman dan Holtikultura">Agribisnis Tanaman dan Holtikultura</option>
                            <option value="Agribisnis Perbenihan Tanaman">Agribisnis Perbenihan Tanaman</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[220px]">
                        <label class="block mb-1 font-semibold text-blue-900">Kategori</label>
                        <select name="kategori" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Kecamatan">Kecamatan</option>
                            <option value="Kabupaten">Kabupaten</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[220px]">
                        <label class="block mb-1 font-semibold text-blue-900">Tanggal</label>
                        <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="flex-1 min-w-[220px]">
                        <label class="block mb-1 font-semibold text-blue-900">Penulis</label>
                        <input type="text" name="penulis" class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold text-blue-900">Isi Berita</label>
                    <textarea name="isi" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
                </div>
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded transition w-full mt-4">Simpan Berita</button>
                <a href="{{ route('admin.dashboard') }}" class="inline-block w-full mt-2 px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-800 text-center">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
