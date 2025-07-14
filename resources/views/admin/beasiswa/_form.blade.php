@php $data = $beasiswa ?? null; @endphp

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" value="{{ old('judul', $data->judul ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $data->tanggal_mulai ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Tanggal Berakhir</label>
    <input type="date" name="tanggal_berakhir" class="form-control" value="{{ old('tanggal_berakhir', $data->tanggal_berakhir ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Link Daftar (optional)</label>
    <input type="url" name="link_daftar" class="form-control" value="{{ old('link_daftar', $data->link_daftar ?? '') }}">
</div>

<div class="mb-3">
    <label>Poster (opsional)</label>
    <input type="file" name="poster" class="form-control">
    @if(isset($data->poster))
        <img src="{{ asset('storage/'.$data->poster) }}" width="100" class="mt-2">
    @endif
</div>

<button class="btn btn-success">Simpan</button>
<a href="{{ route('data_beasiswa.index') }}" class="btn btn-secondary">Kembali</a>
