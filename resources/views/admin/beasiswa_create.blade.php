@extends('layouts.tamplate')

@section('content')
<div class="container mt-4">
    <h2>Tambah Beasiswa</h2>

    <form action="{{ route('admin.beasiswa.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Berakhir</label>
            <input type="date" name="tanggal_berakhir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Poster (optional)</label>
            <input type="file" name="poster" class="form-control">
        </div>

        <div class="mb-3">
            <label>Link Pendaftaran</label>
            <input type="url" name="link_daftar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
