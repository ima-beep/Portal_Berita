<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Portal Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #fff;
            color: #0d1a38;
        }
        .sidebar {
            background: #0d1a38;
            border-right: 2px solid #0d1a38;
        }
        .sidebar a {
            color: #fff;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-radius: 6px;
            margin-bottom: 8px;
            transition: background 0.2s;
            display: block;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #173a6e;
            color: #fff;
        }
        .header {
            background: #173a6e;
            border-bottom: 2px solid #0d1a38;
            box-shadow: 0 2px 8px rgba(13,26,56,0.08);
        }
        .header button {
            background: #0d1a38;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            padding: 0.7rem 1.5rem;
            margin-left: 1rem;
            box-shadow: 0 2px 8px rgba(13,26,56,0.12);
            transition: background 0.2s;
        }
        .header button:hover {
            background: #173a6e;
        }
        .card {
            background: #fff;
            border: 2px solid #173a6e;
            color: #173a6e;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(13,26,56,0.08);
            padding: 2rem 1rem;
            text-align: center;
            font-weight: 600;
        }
        .card .count {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #173a6e;
        }
        .card .label {
            font-size: 1.1rem;
            color: #173a6e;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="sidebar w-64 min-h-screen py-8 px-6 flex flex-col gap-6">
            <nav class="flex flex-col gap-2 text-left">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} pl-0">
                    Dashboard
                </a>
                <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }} pl-0">
                    Kelola Berita
                </a>
                <a href="{{ route('admin.reporters.index') }}" class="{{ request()->routeIs('admin.reporters.*') ? 'active' : '' }} pl-0">
                    Kelola Reporter
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="header sticky top-0 z-50 flex justify-end items-center px-8 py-4">
                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </header>

            <!-- Dashboard Content -->
            <main class="flex-1 px-8 py-10">
                <h2 class="text-3xl font-bold mb-8" style="color:#173a6e;">Dashboard Admin</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                    <div class="card">
                        <div class="count">{{ $totalBerita ?? 0 }}</div>
                        <div class="label">Total Berita</div>
                    </div>
                    <div class="card">
                        <div class="count">{{ $totalReporter ?? 0 }}</div>
                        <div class="label">Reporter</div>
                    </div>
                    <div class="card">
                        <div class="count">{{ $totalUser ?? 0 }}</div>
                        <div class="label">User Terdaftar</div>
                    </div>
                </div>

                <div class="flex justify-end mb-8">
                    <a href="{{ route('admin.berita.create') }}" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-5 py-2 rounded transition">
                        + Tambah Berita
                    </a>
                </div>

                <!-- Berita Terbaru -->
                <div class="bg-white border-2 border-blue-900 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-xl font-bold mb-4 text-blue-900">Berita Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="bg-blue-100 text-blue-900">
                                    <th class="py-2 px-4 text-left">Judul</th>
                                    <th class="py-2 px-4 text-left">Jurusan</th>
                                    <th class="py-2 px-4 text-left">Kategori</th>
                                    <th class="py-2 px-4 text-left">Tanggal</th>
                                    <th class="py-2 px-4 text-left">Penulis</th>
                                    <th class="py-2 px-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($beritaTerbaru ?? [] as $berita)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $berita->judul }}</td>
                                        <td class="py-2 px-4">{{ $berita->jurusan ?? '-' }}</td>
                                        <td class="py-2 px-4">{{ $berita->kategori }}</td>
                                        <td class="py-2 px-4">{{ $berita->created_at->format('d-m-Y') }}</td>
                                        <td class="py-2 px-4">{{ $berita->penulis }}</td>
                                        <td class="py-2 px-4">
                                            <a href="{{ route('admin.berita.show', $berita->id) }}" class="text-blue-900 hover:underline">Detail</a>
                                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="ml-2 text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-blue-400">Belum ada berita terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Konten tambahan dashboard --}}
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
