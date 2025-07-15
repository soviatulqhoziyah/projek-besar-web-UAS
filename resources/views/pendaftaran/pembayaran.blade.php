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

.form-input, .form-select, .form-file {
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

.form-input:focus, .form-select:focus, .form-file:focus {
    border-color: #f97316;
}

.form-input::placeholder {
    color: #9ca3af;
}

.form-file {
    cursor: pointer;
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
    <h1>Form Pembayaran Tiket</h1>

    @if(session('success'))
        <div class="success-msg">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <select name="pendaftar_id" class="form-select" required>
                    <option value="">-- Pilih Pendaftar --</option>
                    @foreach($pendaftars as $p)
                        <option value="{{ $p->id }}">{{ $p->nama ?? 'Pendaftar #' . $p->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select name="metode_pembayaran" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Tunai">Tunai</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <input type="number" name="jumlah" class="form-input" 
                   placeholder="Jumlah (Rp)" min="1" required>
        </div>

        <div class="form-group">
            <input type="file" name="bukti_transfer" class="form-file" 
                   accept="image/*" title="Bukti Transfer (jika ada)">
        </div>

        <button type="submit" class="submit-btn">💳 Kirim Pembayaran</button>
    </form>
</div>
@endsection