@extends('layouts.tamplate')

@section('content')
<div class="container mt-5">
    <h2>Data Pendaftar</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Instansi</th>
                <th>Status Pendaftaran</th>
                <th>Status Pembayaran</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftars as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_lengkap }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->instansi ?? '-' }}</td>
                    <td>{{ ucfirst($p->status_pendaftaran) }}</td>
                    <td>{{ ucfirst($p->status_pembayaran) }}</td>
                    <td>{{ $p->event->nama_kegiatan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data pendaftar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
