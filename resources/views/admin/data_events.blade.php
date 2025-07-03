@extends('layouts.tamplate') {{-- ganti jika nama layout berbeda --}}

@section('content')
    <div class="container mt-4">
        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mb-4">Data Kegiatan</h2>

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
                    <th>Image</th>
                    <th>Nama Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Tgl. Pendaftaran</th>
                    <th>Insert</th>
                    <th>Kontak Person</th>
                    <th>Benefit</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($events as $i => $event)
                    <tr>
                        <td>{{ $events->firstItem() + $i }}</td>

                        {{-- Image --}}
                        <td>
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->nama_kegiatan }}"
                                     style="max-width:80px; max-height:80px;">
                            @endif
                        </td>

                        <td class="ellipsis" title="{{ $event->nama_kegiatan }}">{{ $event->nama_kegiatan }}</td>
                        <td class="ellipsis" title="{{ $event->deskripsi }}">{{ $event->deskripsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->tanggal_kegiatan)->format('d M Y') }}</td>
                        <td>{{ $event->waktu }}</td>
                        <td class="ellipsis" title="{{ $event->tempat }}">{{ $event->tempat }}</td>
                        <td>{{ $event->tanggal_pendaftaran }}</td>
                        <td class="ellipsis" title="{{ $event->insert }}">{{ $event->insert }}</td>
                        <td class="ellipsis" title="{{ $event->contact_person }}">{{ $event->contact_person }}</td>
                        <td class="ellipsis" title="{{ $event->benefitnya }}">{{ $event->benefitnya }}</td>

                        {{-- Aksi --}}
                        <td class="text-nowrap">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $events->links() }}
        </div>
    </div>
@endsection
