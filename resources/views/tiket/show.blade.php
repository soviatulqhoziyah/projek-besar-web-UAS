@extends('layouts.tamplate')

@section('content')
<style>
.ticket-container {
    max-width: 500px;
    margin: 2rem auto;
    background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
    border-radius: 20px;
    padding: 2px;
    box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
}

.ticket-content {
    background: white;
    border-radius: 18px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.ticket-content::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(249, 115, 22, 0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.ticket-header {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}

.ticket-title {
    font-size: 2rem;
    font-weight: bold;
    color: #f97316;
    margin-bottom: 0.5rem;
}

.ticket-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.info-item {
    background: #fef7ed;
    padding: 1rem;
    border-radius: 12px;
    border-left: 4px solid #f97316;
}

.info-label {
    font-size: 0.8rem;
    color: #9ca3af;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 0.3rem;
}

.info-value {
    color: #374151;
    font-weight: 600;
}

.event-section {
    background: #f97316;
    margin: 1.5rem -2rem;
    padding: 1.5rem 2rem;
    color: white;
    position: relative;
    z-index: 1;
}

.event-section::before,
.event-section::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 20px;
    height: 20px;
    background: white;
    border-radius: 50%;
    transform: translateY(-50%);
}

.event-section::before { left: -10px; }
.event-section::after { right: -10px; }

.event-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.event-details {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    opacity: 0.9;
}

.price-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
    position: relative;
    z-index: 1;
}

.price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #f97316;
}

.print-btn {
    width: 100%;
    background: #f97316;
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: all 0.3s;
    position: relative;
    z-index: 1;
}

.print-btn:hover {
    background: #ea580c;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(249, 115, 22, 0.4);
}

/* Hide non-ticket elements when printing */
@media print {
    body * {
        visibility: hidden;
    }

    .ticket-container,
    .ticket-container * {
        visibility: visible;
    }

    .ticket-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .print-btn,
    .navbar,
    .footer,
    .non-print {
        display: none !important;
    }
}

@media (max-width: 600px) {
    .ticket-info { grid-template-columns: 1fr; }
    .event-details { flex-direction: column; gap: 0.5rem; }
    .price-status { flex-direction: column; gap: 1rem; }
}
</style>

<div class="ticket-container">
    <div class="ticket-content">
        <div class="ticket-header">
            <div class="ticket-title">🎟️ Tiket Masuk</div>
        </div>

        <div class="ticket-info">
            <div class="info-item">
                <div class="info-label">Nama</div>
                <div class="info-value">{{ $pendaftar->nama_lengkap }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $pendaftar->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">No HP</div>
                <div class="info-value">{{ $pendaftar->no_hp }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Instansi</div>
                <div class="info-value">{{ $pendaftar->instansi ?? '-' }}</div>
            </div>
        </div>

        <div class="event-section">
            <div class="event-title">{{ $pendaftar->event->nama_kegiatan }}</div>
            <div class="event-details">
                <div>📅 {{ $pendaftar->event->tanggal_kegiatan }}</div>
                <div>📍 {{ $pendaftar->event->lokasi }}</div>
            </div>
        </div>

        <div class="price-status">
            <div class="price">Rp {{ number_format($pendaftar->event->insert, 0, ',', '.') }}</div>
        </div>

        <button onclick="window.print()" class="print-btn">🖨️ Cetak Tiket</button>
    </div>
</div>
@endsection
