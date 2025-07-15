@extends('layouts.tamplate')

@section('content')
<style>
.form-container {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.form-row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    flex: 1;
}

.form-input {
    width: 100%;
    padding: 1rem 1.5rem;
    border: 2px solid #fed7aa;
    border-radius: 20px;
    background: #fafafa;
    font-size: 16px;
    color: #374151;
    outline: none;
    transition: border-color 0.3s;
}

.form-input:focus {
    border-color: #f97316;
}

.form-input::placeholder {
    color: #9ca3af;
}

.submit-btn {
    width: 100%;
    padding: 1rem 2rem;
    background: #f97316;
    color: white;
    border: none;
    border-radius: 20px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
    margin-top: 1rem;
}

.submit-btn:hover {
    background: #ea580c;
}

.success-msg {
    background: #d1fae5;
    border: 1px solid #6ee7b7;
    color: #065f46;
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
}

.error-msg {
    color: #dc2626;
    font-size: 14px;
    margin-top: 0.5rem;
}

h1 {
    text-align: center;
    color: #374151;
    margin-bottom: 2rem;
    font-size: 24px;
    font-weight: 700;
}

@media (max-width: 768px) {
    .form-row { flex-direction: column; }
}
</style>

<div class="form-container">
    <h1>Form Pendaftaran {{ $event->nama_kegiatan }}</h1>

    @if(session('success'))
        <div class="success-msg">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pendaftaran.submit', $event->id) }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <input type="text" name="nama_lengkap" class="form-input" 
                       placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap') 
                    <div class="error-msg">{{ $message }}</div> 
                @enderror
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-input" 
                       placeholder="Email" value="{{ old('email') }}">
                @error('email') 
                    <div class="error-msg">{{ $message }}</div> 
                @enderror
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <input type="text" name="no_hp" class="form-input" 
                   placeholder="No HP" value="{{ old('no_hp') }}">
            @error('no_hp') 
                <div class="error-msg">{{ $message }}</div> 
            @enderror
        </div>
        
        <div class="form-group" style="margin-bottom: 1rem;">
            <input type="text" name="instansi" class="form-input" 
                   placeholder="Instansi (Opsional)" value="{{ old('instansi') }}">
            @error('instansi') 
                <div class="error-msg">{{ $message }}</div> 
            @enderror
        </div>
        

        <button type="submit" class="submit-btn">✈️ Daftar</button>
    </form>
</div>
@endsection