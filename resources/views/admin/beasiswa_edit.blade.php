@extends('layouts.tamplate')

@section('content')

<!-- Font dan Styling -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #fff9c4 0%, #f9ca24 50%, #ff6b35 100%);
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
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 30px;
    }

    label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        outline: none;
    }

    .btn-warning {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        padding: 12px 25px;
        font-size: 1rem;
        transition: 0.3s;
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #e67e22, #f39c12);
        box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
    }

    .preview-img {
        margin-top: 10px;
        border-radius: 8px;
        max-width: 150px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }

    .form-note {
        font-size: 0.85rem;
        color: #888;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .text-end {
        text-align: end;
    }
</style>

<!-- FORM -->
<div class="container">
    <div class="form-container">
        <h2>Edit Beasiswa</h2>

        <form action="{{ route('admin.beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul">Judul Beasiswa</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $beasiswa->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $beasiswa->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $beasiswa->tanggal_mulai) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" class="form-control" value="{{ old('tanggal_berakhir', $beasiswa->tanggal_berakhir) }}" required>
            </div>

            <div class="mb-3">
                <label for="poster">Poster</label>
                <input type="file" id="poster" name="poster" class="form-control">
                <small class="form-note">Kosongkan jika tidak ingin mengganti.</small>

                @if ($beasiswa->poster)
                    <div class="mt-2">
                        <strong>Poster Saat Ini:</strong><br>
                        <img src="{{ asset('storage/' . $beasiswa->poster) }}" alt="Poster Beasiswa" class="preview-img">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="link_daftar">Link Pendaftaran</label>
                <input type="url" id="link_daftar" name="link_daftar" class="form-control" value="{{ old('link_daftar', $beasiswa->link_daftar) }}">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
