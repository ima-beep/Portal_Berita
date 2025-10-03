<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal Berita')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #f8fafc;
            color: #173a6e;
        }
    </style>
</head>
<body class="min-h-screen bg-blue-50">
    <header class="bg-blue-900 text-white py-4 px-6 mb-8">
        <h1 class="text-2xl font-bold">Admin Portal Berita</h1>
    </header>
    <main class="container mx-auto px-4">
        @yield('content')
    </main>
</body>
</html>
