<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Berita - Portal Berita</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 text-blue-900 min-h-screen">

  <!-- Container -->
  <div class="max-w-6xl mx-auto py-16 px-6">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-blue-900 text-center">Kelola Berita</h1>
  <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-800">Kembali</a>
  </div>

    <!-- Tabel -->
  <div class="overflow-x-auto bg-white/90 rounded-2xl shadow-lg border border-blue-200">
  <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gradient-to-r from-blue-200 to-blue-100 text-blue-900">
            <th class="px-6 py-3 font-semibold">Judul</th>
            <th class="px-6 py-3 font-semibold">Isi</th>
            <th class="px-6 py-3 font-semibold">Gambar</th>
            <th class="px-6 py-3 font-semibold">Kategori</th>
            <th class="px-6 py-3 font-semibold">Tanggal</th>
            <th class="px-6 py-3 font-semibold">Penulis</th>
            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($beritas as $berita)
          <tr class="border-b border-blue-100 hover:bg-blue-50/50">
            <td class="px-6 py-4">{{ $berita->judul }}</td>
            <td class="px-6 py-4">{{ $berita->isi }}</td>
            <td class="px-6 py-4">
              @if($berita->gambar)
                <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="rounded-lg shadow w-20 h-14 object-cover">
              @else
                <span class="text-blue-300">-</span>
              @endif
            </td>
            <td class="px-6 py-4">{{ $berita->kategori }}</td>
            <td class="px-6 py-4">{{ $berita->tanggal }}</td>
            <td class="px-6 py-4">{{ $berita->penulis }}</td>
            <td class="px-6 py-4 text-center space-x-2">
              <a href="{{ route('berita.edit', $berita->id) }}" class="px-3 py-1 text-sm bg-yellow-600/80 text-white rounded-lg shadow hover:bg-yellow-700 transition">Edit</a>
              <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 text-sm bg-red-600/80 text-white rounded-lg shadow hover:bg-red-700 transition" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="px-6 py-10 text-center text-blue-400">Belum ada berita.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
