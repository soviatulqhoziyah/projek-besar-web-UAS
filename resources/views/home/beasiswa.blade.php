@extends('layouts.tamplate')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        @if (Auth::user()->role === 'super_admin')
            <a href="{{ route('beasiswa.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus me-2"></i>Tambah Beasiswa
            </a>
        @endif
    @endauth

    <h2 class="mb-3">Data Beasiswa</h2>

    <style>
        .table td.ellipsis {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .table img {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
        }
    </style>

    <table class="table table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Poster</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Link Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beasiswas as $i => $beasiswa)
                <tr>
                    <td>{{ $beasiswas->firstItem() + $i }}</td>
                    <td>
                        @if(Str::startsWith($beasiswa->poster, ['http://', 'https://']))
                            <img src="{{ $beasiswa->poster }}" alt="poster">
                        @else
                            <img src="{{ asset('storage/' . $beasiswa->poster) }}" alt="poster">
                        @endif
                    </td>
                    <td class="ellipsis" title="{{ $beasiswa->judul }}">{{ $beasiswa->judul }}</td>
                    <td class="ellipsis" title="{{ $beasiswa->deskripsi }}">{{ Str::limit($beasiswa->deskripsi, 100) }}</td>
                    <td>{{ \Carbon\Carbon::parse($beasiswa->tanggal_mulai)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($beasiswa->tanggal_berakhir)->format('d M Y') }}</td>
                    <td>
                        @if ($beasiswa->link_daftar)
                            <a href="{{ $beasiswa->link_daftar }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data beasiswa</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $beasiswas->links() }}
    </div>
</div>
@endsection
