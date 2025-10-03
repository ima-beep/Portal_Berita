@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Berita</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                    <tr>
                        <td>{{ $berita->id }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->status }}</td>
                        <td>
                            <a href="{{ route('admin.berita.show', $berita->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
