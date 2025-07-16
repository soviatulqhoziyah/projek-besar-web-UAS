@extends('layouts.tamplate')

@section('content')
<style>
.event-detail {
    max-width: 800px;
    margin: 2rem auto;
    background: #fff7ed;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.event-detail h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #f97316;
    margin-bottom: 1rem;
}

.event-detail .info {
    margin-bottom: 1rem;
    font-size: 1rem;
    color: #374151;
}

.event-detail .info label {
    font-weight: 600;
    display: block;
    margin-bottom: 0.3rem;
    color: #6b7280;
}

.event-detail .info p {
    margin: 0;
}

.btn-daftar {
    display: inline-block;
    margin-top: 1.5rem;
    background: #f97316;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
}

.btn-daftar:hover {
    background: #ea580c;
}
</style>

<div class="event-detail">
    <h1>{{ $event->nama_kegiatan }}</h1>

    <div class="info">
        <label>Tanggal Kegiatan</label>
        <p>{{ \Carbon\Carbon::parse($event->tanggal_kegiatan)->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="info">
        <label>Lokasi</label>
        <p>{{ $event->lokasi }}</p>
    </div>

    <div class="info">
        <label>Deskripsi</label>
        <p>{{ $event->deskripsi }}</p>
    </div>

    <div class="info">
        <label>Harga Tiket</label>
        <p>Rp {{ number_format($event->insert, 0, ',', '.') }}</p>
    </div>

    <a href="{{ route('pendaftaran.form', $event->id) }}" class="btn-daftar">
        Daftar Sekarang
    </a>
</div>
@endsection
