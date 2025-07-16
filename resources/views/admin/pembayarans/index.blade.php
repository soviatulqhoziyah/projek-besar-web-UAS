@extends('layouts.tamplate')

@section('content')
<div class="container mt-5">
    <h2>Data Pembayaran</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pendaftar</th>
                <th>Email</th>
                <th>Event</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayarans as $index => $bayar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $bayar->pendaftar->nama_lengkap }}</td>
                    <td>{{ $bayar->pendaftar->email }}</td>
                    <td>{{ $bayar->pendaftar->event->nama_kegiatan ?? '-' }}</td>
                    <td>{{ ucfirst($bayar->metode_pembayaran) }}</td>
                    <td>
                        @if ($bayar->bukti_transfer)
                            <a href="{{ asset('storage/' . $bayar->bukti_transfer) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data pembayaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
