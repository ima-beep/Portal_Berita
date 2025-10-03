@extends('layouts.app') {{-- kalau ada layout utama, kalau tidak bisa hapus --}}

@section('content')
<div class="container" style="max-width:900px; margin:30px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 class="title" style="font-size:28px; font-weight:bold; color:#5d3b8c; margin-bottom:10px;">
        {{ $berita->judul }}
    </h1>

    <div class="meta" style="font-size:14px; color:#777; margin-bottom:20px;">
        <span><strong>Kategori:</strong> {{ $berita->kategori }}</span>
        <span><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</span>
        <span><strong>Penulis:</strong> {{ $berita->penulis }}</span>
    </div>

    @if($berita->gambar)
        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar Berita" class="image"
             style="width:100%; max-height:400px; object-fit:cover; border-radius:10px; margin-bottom:20px;" />
    @endif

    <div class="content" style="font-size:16px; line-height:1.7; color:#444; text-align:justify;">
        {!! nl2br(e($berita->isi)) !!}
    </div>

    <div class="btn-container" style="margin-top:30px; text-align:center;">
        <a href="{{ route('reporter.berita.edit', $berita->id) }}" class="btn btn-edit"
           style="background:#3498db; color:#fff; padding:10px 20px; border-radius:8px; text-decoration:none; margin:5px;">
           ✏️ Edit
        </a>
        <form action="{{ route('reporter.berita.publish', $berita->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-publish"
                style="background:#8e44ad; color:#fff; padding:10px 20px; border-radius:8px; border:none; margin:5px; cursor:pointer;">
                ✅ Publikasikan
            </button>
        </form>
        <form action="{{ route('reporter.berita.draft', $berita->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-draft"
                style="background:#f39c12; color:#fff; padding:10px 20px; border-radius:8px; border:none; margin:5px; cursor:pointer;">
                📝 Simpan sebagai Draft
            </button>
        </form>
    </div>
</div>
@endsection
