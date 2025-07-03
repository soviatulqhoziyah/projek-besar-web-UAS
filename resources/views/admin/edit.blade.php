@extends('layouts.tamplate')   {{-- ganti jika nama layout berbeda --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Event</h2>

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="row g-3">
        @csrf @method('PUT')

        {{-- ==== Gambar ==== --}}
        <div class="col-md-6">
            <label class="form-label">Gambar (jpg/png, maks 2 MB)</label>
            <input type="file"
                   name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if($event->image)
                <div class="mt-2">
                    <small>Gambar saat ini:</small><br>
                    <img src="{{ asset('storage/'.$event->image) }}"
                         style="max-width:120px; border:1px solid #ccc;">
                </div>
            @endif
        </div>

        {{-- ==== Nama Kegiatan ==== --}}
        <div class="col-md-6">
            <label class="form-label">Nama Kegiatan</label>
            <input type="text"
                   name="nama_kegiatan"
                   class="form-control @error('nama_kegiatan') is-invalid @enderror"
                   value="{{ old('nama_kegiatan', $event->nama_kegiatan) }}">
            @error('nama_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Deskripsi ==== --}}
        <div class="col-12">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi"
                      rows="3"
                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $event->deskripsi) }}</textarea>
            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Tanggal & Waktu ==== --}}
        <div class="col-md-4">
            <label class="form-label">Tanggal Kegiatan</label>
            <input type="date"
                   name="tanggal_kegiatan"
                   class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                   value="{{ old('tanggal_kegiatan', $event->tanggal_kegiatan) }}">
            @error('tanggal_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Waktu</label>
            <input type="time"
                   name="waktu"
                   class="form-control @error('waktu') is-invalid @enderror"
                   value="{{ old('waktu', $event->waktu) }}">
            @error('waktu') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Tempat</label>
            <input type="text"
                   name="tempat"
                   class="form-control @error('tempat') is-invalid @enderror"
                   value="{{ old('tempat', $event->tempat) }}">
            @error('tempat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Tanggal Pendaftaran ==== --}}
        <div class="col-md-4">
            <label class="form-label">Tanggal Pendaftaran</label>
            <input type="date"
                   name="tanggal_pendaftaran"
                   class="form-control @error('tanggal_pendaftaran') is-invalid @enderror"
                   value="{{ old('tanggal_pendaftaran', $event->tanggal_pendaftaran) }}">
            @error('tanggal_pendaftaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Insert ==== --}}
        <div class="col-md-4">
            <label class="form-label">Insert (oleh)</label>
            <input type="text"
                   name="insert"
                   class="form-control @error('insert') is-invalid @enderror"
                   value="{{ old('insert', $event->insert) }}">
            @error('insert') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Contact Person ==== --}}
        <div class="col-md-4">
            <label class="form-label">Contact Person</label>
            <input type="text"
                   name="contact_person"
                   class="form-control @error('contact_person') is-invalid @enderror"
                   value="{{ old('contact_person', $event->contact_person) }}">
            @error('contact_person') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Benefit ==== --}}
        <div class="col-12">
            <label class="form-label">Benefit</label>
            <textarea name="benefitnya"
                      rows="2"
                      class="form-control @error('benefitnya') is-invalid @enderror">{{ old('benefitnya', $event->benefitnya) }}</textarea>
            @error('benefitnya') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- ==== Tombol ==== --}}
        <div class="col-12 text-end">
            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.data_events') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
