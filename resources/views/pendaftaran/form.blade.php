@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Formulir Pendaftaran Event: <strong>{{ $event->nama_kegiatan }}</strong></h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('daftar.submit', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP / WhatsApp</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control">
        </div>

        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="QRIS">QRIS</option>
                <option value="Bayar saat Hari-H">Bayar saat Hari-H</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Bayar</label>
            <input type="number" name="jumlah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Bukti Pembayaran (jika sudah transfer)</label>
            <input type="file" name="bukti_transfer" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
