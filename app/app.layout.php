<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    @vite('resources/css/app.css') {{-- kalau pakai Vite --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-blue-600 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="{{ url('/') }}" class="font-bold">Portal Berita</a>
            <div>
                <a href="{{ route('admin.berita.index') }}" class="px-3">Dashboard</a>
                <a href="{{ route('admin.berita.create') }}" class="px-3">Tambah Berita</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 px-4">
        @yield('content')
    </main>

</body>
</html>
