@extends('layouts.tamplate') {{-- atau layouts.admin jika kamu punya --}}
@section('content')
    <div class="container">
        <h4>Data Beasiswa</h4>
        @auth
            @if (Auth::user()->role === 'super_admin')
                <a href="{{ route('data_beasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Beasiswa</a>
            @endif
        @endauth

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Poster</th>
                    {{-- <th>Link</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        {{-- <td>{{ $d->id }}</td> --}}
                        <td>{{ $d->judul }}</td>
                        <td>{{ Str::limit(strip_tags($d->deskripsi), 50) }}</td>
                        <td>{{ $d->tanggal_mulai }} - {{ $d->tanggal_berakhir }}</td>
                        <td>
                            @if ($d->poster)
                                <img src="{{ asset('storage/' . $d->poster) }}" width="80">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        {{-- <td>
                            @if ($d->link_daftar)
                                <a href="{{ $d->link_daftar }}" target="_blank">Daftar</a>
                            @else
                                -
                            @endif
                        </td> --}}
                        <td style="display: flex; gap: 5px; align-items: center;">
                            <a href="{{ route('data_beasiswa.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('data_beasiswa.destroy', $d->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus?')" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
