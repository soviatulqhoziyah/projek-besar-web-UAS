@extends('layouts.tamplate')

@section('content')
    <div class="container mt-4">
        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah hanya untuk super_admin --}}
        @auth
            @if (Auth::user()->role === 'super_admin')
                <a href="{{ route('admin.beasiswa.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-graduation-cap me-2"></i>Tambahkan Beasiswa
                </a>
            @endif
        @endauth

        <h2 class="mb-2">Data Beasiswa</h2>

        <style>
            .table td.ellipsis {
                max-width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
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
                @forelse ($beasiswas as $i => $item)
                    <tr>
                        <td>{{ $beasiswas->firstItem() + $i }}</td>

                        {{-- Poster --}}
                        <td>
                            @if ($item->poster)
                                <img src="{{ asset('storage/' . $item->poster) }}" alt="{{ $item->judul }}"
                                    style="max-width:80px; max-height:80px;">
                            @endif
                        </td>

                        <td class="ellipsis" title="{{ $item->judul }}">{{ $item->judul }}</td>
                        <td class="ellipsis" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d M Y') }}</td>
                        <td class="ellipsis" title="{{ $item->link_daftar }}">
                            <a href="{{ $item->link_daftar }}" target="_blank">Lihat</a>
                        </td>

                        {{-- Aksi --}}
                        <td class="text-nowrap">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('admin.beasiswa.edit', $item->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('admin.beasiswa.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus beasiswa ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data beasiswa</td>
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
