@extends('layouts.tamplate')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    * { font-family: 'Inter', sans-serif; }

    body {
        background: linear-gradient(135deg, #fff9c4 0%, #f9ca24 50%, #ff6b35 100%);
        min-height: 100vh;
        margin: 0;
    }

    .form-container {
        max-width: 800px;
        margin: 40px auto;
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: 700;
        background: linear-gradient(45deg, #ff6b35, #f9ca24);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 30px;
        text-align: center;
        font-size: 2.5rem;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        outline: none;
    }

    .btn-success {
        background: linear-gradient(135deg, #ff6b35, #f9ca24);
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        padding: 12px 25px;
        font-size: 1rem;
        transition: 0.3s;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #f9ca24, #ff6b35);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
    }
</style>

<div class="container">
    <div class="form-container">
        <h2>Tambah Beasiswa</h2>

        <form action="{{ route('admin.beasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="poster">Poster (optional)</label>
                <input type="file" name="poster" class="form-control">
            </div>

            <div class="mb-3">
                <label for="link_daftar">Link Pendaftaran</label>
                <input type="url" name="link_daftar" class="form-control">
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
