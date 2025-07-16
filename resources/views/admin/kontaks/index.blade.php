@extends('layouts.tamplate')

@section('content')
<div class="container mt-5">
    <h2>Data Kontak Masuk</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Pesan</th>
                <th>Waktu Dikirim</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kontaks as $index => $kontak)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kontak->nama }}</td>
                    <td>{{ $kontak->email }}</td>
                    <td>{{ $kontak->subject }}</td>
                    <td>{{ $kontak->pesan }}</td>
                    <td>{{ $kontak->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data kontak masuk</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
