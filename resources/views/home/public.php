<!DOCTYPE html>
<html lang="id" class="">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>PORTAL BERITA</title>
		<script src="https://cdn.tailwindcss.com"></script>
		<!-- Tambah Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
		<style>
			body {
				font-family: 'Poppins', sans-serif;
			}
			.font-portal {
				font-family: 'Playfair Display', serif;
			}
		</style>
	</head>
	<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 text-blue-900">
		<!-- Navbar -->
		<header class="bg-blue-50/90 backdrop-blur-md sticky top-0 z-50 shadow">
			<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
				<h1 class="text-2xl font-extrabold text-blue-700 font-portal">PORTAL BERITA</h1>
				<div class="flex items-center gap-4">
					<input type="text" placeholder="Cari berita..." class="px-3 py-2 rounded-lg text-sm border border-blue-200 bg-blue-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300" />
					<a href="/login" class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-900 to-blue-700 text-white font-medium shadow hover:opacity-90 transition">Login</a>
				</div>
			</div>
		</header>

		<!-- Hero -->
		<section class="relative text-center py-20 overflow-hidden">
			<img src="https://source.unsplash.com/1600x600/?news,media" class="absolute inset-0 w-full h-full object-cover opacity-30" alt="Hero" />
			<div class="absolute inset-0 bg-gradient-to-b from-blue-200/60 to-blue-900/60"></div>
			<div class="relative z-10 max-w-3xl mx-auto text-white">
				<h2 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow font-portal">PORTAL BERITA</h2>
				<p class="text-lg md:text-xl mb-6">SMK NEGERI 08 JEMBER</p>
				<div class="flex flex-wrap gap-3 justify-center" id="kategori-group">
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow hover:opacity-90" data-kategori="semua">Semua</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-blue-200 hover:text-blue-900" data-kategori="teknologi">TKR</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-100 hover:text-orange-700" data-kategori="olahraga">TSM</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-300 hover:text-orange-900" data-kategori="pendidikan">TKJ</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-100 hover:text-orange-700" data-kategori="dkv">DKV</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-200 hover:text-orange-900" data-kategori="rpl">RPL</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-300 hover:text-orange-900" data-kategori="atph">ATPH</button>
					<button class="kategori-btn px-5 py-2 rounded-full text-sm font-medium bg-white/30 hover:bg-orange-400 hover:text-orange-900" data-kategori="apt">APT</button>
				</div>
			</div>
		</section>

		<!-- Daftar Berita -->
		<main class="flex-1 max-w-7xl mx-auto px-6 py-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php use App\Models\Berita; $beritaTerbaru = Berita::latest()->take(5)->get(); ?>
			<?php if(count($beritaTerbaru)): ?>
				<?php foreach($beritaTerbaru as $berita): ?>
				<div class="relative bg-white/90 rounded-2xl border border-blue-100 shadow-md overflow-hidden hover:shadow-lg transform hover:-translate-y-2 transition">
					<?php if($berita->gambar): ?>
						<img src="<?= $berita->gambar ?>" alt="<?= $berita->judul ?>" class="w-full h-48 object-cover" />
					<?php endif; ?>
					<div class="p-5">
						<span class="text-xs font-medium text-blue-600 uppercase"><?= $berita->kategori ?></span>
						<h3 class="text-lg font-semibold mb-2">
							<?= $berita->judul ?>
						</h3>
						<p class="text-gray-600 text-sm mb-4">
							<?= 
								strlen($berita->isi) > 120 ? substr($berita->isi,0,120).'...' : $berita->isi
							?>
						</p>
						<span class="block text-xs text-blue-400 mb-2"><?= $berita->tanggal ?></span>
						<span class="block text-xs text-blue-400 mb-2">Penulis: <?= $berita->penulis ?></span>
						<a href="#" class="inline-block text-sm font-medium text-blue-600 hover:underline">Baca selengkapnya →</a>
					</div>
				</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="text-blue-400 text-lg py-20">Belum ada berita.</div>
			<?php endif; ?>
		</main>

		<!-- Footer -->
		<footer class="bg-white/90 backdrop-blur-md border-t border-blue-100 py-6 text-center text-blue-700 text-sm font-portal">
			© 2025 PORTAL BERITA. Semua Hak Dilindungi.
		</footer>
	</body>
</html>
