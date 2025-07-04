@extends('layouts.tamplate')

@section('content')

    @php
        use Illuminate\Support\Str;
        use Carbon\Carbon;
    @endphp

    {{-- ===== Font & Icon CDN ===== --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- ===== STYLE KARTU ===== --}}
    <style>
        * {
            font-family: 'Inter', sans-serif
        }

        body {
            background: linear-gradient(135deg, #fff9c4 0%, #f9ca24 50%, #ff6b35 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        .main-container {
            max-width: 1400px;
            margin: auto;
            padding: 0 20px
        }

        .header {
            text-align: center;
            margin-bottom: 50px
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b35, #f9ca24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card Layout */
        .beasiswa-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }

        .beasiswa-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .1);
            transition: .3s;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .beasiswa-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 30px 60px rgba(255, 107, 53, .2);
        }

        .beasiswa-image {
            aspect-ratio: 4/3;
            background: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .beasiswa-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .badge-deadline {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #ff6b35, #f9ca24);
            color: #fff;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: .75rem;
            font-weight: 600
        }

        .beasiswa-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .beasiswa-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .beasiswa-desc {
            font-size: .95rem;
            color: #4a5568;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .beasiswa-period {
            font-size: .85rem;
            color: #555;
            margin-bottom: 16px;
        }

        .link-daftar a {
            color: #1d4ed8;
            text-decoration: underline;
            font-size: .9rem;
            font-weight: 500
        }

        .admin-actions {
            margin-top: auto;
            display: flex;
            gap: 10px;
            margin-top: 20px
        }

        .btn {
            flex: 1;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px
        }

        .btn-edit {
            background: #f39c12;
            color: #fff
        }

        .btn-edit:hover {
            background: #d35400
        }

        .btn-del {
            background: #e74c3c;
            color: #fff
        }

        .btn-del:hover {
            background: #c0392b
        }

        .empty {
            text-align: center;
            padding: 80px 20px;
            color: #333
        }

        .empty i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: .6;
            color: #ff6b35
        }

        .empty h3 {
            font-size: 1.6rem;
            color: #ff6b35;
            margin: 0;
            margin-bottom: 8px
        }
    </style>

    {{-- ===== CONTENT ===== --}}
    <div class="main-container">

        @if ($beasiswas->count())
            <div class="beasiswa-grid">
                @foreach ($beasiswas as $bws)
                    <div class="beasiswa-card">
                        {{-- Poster --}}
                        <div class="beasiswa-image">
                            @php $img = $bws->poster; @endphp
                            <img src="{{ Str::startsWith($img, ['http://', 'https://']) ? $img : asset('storage/' . $img) }}"
                                alt="Poster {{ $bws->judul }}">
                        </div>

                        {{-- Deadline --}}
                        <span class="badge-deadline">
                            {{ Carbon::parse($bws->tanggal_berakhir)->diffForHumans(null, false, false, 2) }}
                        </span>

                        <div class="beasiswa-body">
                            <div class="beasiswa-title">{{ $bws->judul }}</div>
                            <div class="beasiswa-desc">{{ Str::limit($bws->deskripsi, 100) }}</div>

                            <div class="beasiswa-period">
                                {{ Carbon::parse($bws->tanggal_mulai)->translatedFormat('d M Y') }} –
                                {{ Carbon::parse($bws->tanggal_berakhir)->translatedFormat('d M Y') }}
                            </div>

                            <div class="link-daftar mb-3">
                                @if ($bws->link_daftar)
                                    <a href="{{ $bws->link_daftar }}" target="_blank">Kunjungi link pendaftaran</a>
                                @else
                                    <em>Tautan belum tersedia</em>
                                @endif
                            </div>

                            {{-- Tombol Detail --}}
                            <div class="mb-3">
                                <a href="{{ route('home.beasiswa.detail', $bws->id) }}" class="btn"
                                    style="background:#f3b90b; color:white;">
                                    <i class="fas fa-info-circle"></i> Detail
                                </a>
                            </div>

                            {{-- Aksi admin --}}
                            @can('isAdmin')
                                <div class="admin-actions">
                                    <a href="{{ route('admin.beasiswa.edit', $bws->id) }}" class="btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.beasiswa.destroy', $bws->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus beasiswa ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-del">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-5 d-flex justify-content-center">
                {{ $beasiswas->links() }}
            </div>
        @else
            <div class="empty">
                <i class="fas fa-calendar-times"></i>
                <h3>Belum Ada Beasiswa</h3>
                <p>Silakan cek kembali nanti atau hubungi admin untuk informasi lebih lanjut.</p>
            </div>
        @endif
    </div>

@endsection
