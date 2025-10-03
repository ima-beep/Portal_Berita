<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Portal Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-[Poppins]">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-8 border border-blue-900">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">Detail Berita</h2>

            <div class="mb-4">
                <span class="font-semibold text-blue-900">Judul:</span>
                <p class="text-gray-800">{{ $berita->judul }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-blue-900">Kategori:</span>
                <p class="text-gray-800">{{ $berita->kategori }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-blue-900">Tanggal:</span>
                <p class="text-gray-800">{{ $berita->tanggal }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-blue-900">Penulis:</span>
                <p class="text-gray-800">{{ $berita->penulis }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-blue-900">Isi Berita:</span>
                <div class="text-gray-800 border rounded p-3 bg-gray-50">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
            </div>

            @if($berita->gambar)
            <div class="mb-6">
                <span class="font-semibold text-blue-900">Gambar:</span>
                <img src="{{ asset('storage/'.$berita->gambar) }}" class="rounded shadow mt-2 max-h-96">
            </div>
            @endif

            <div class="flex justify-between mt-6">
                <a href="{{ route('admin.berita.index') }}" 
                   class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded">Kembali</a>
                <a href="{{ route('admin.berita.edit', $berita->id) }}" 
                   class="bg-yellow-500 hover:bg-yellow-400 text-white px-4 py-2 rounded">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>
