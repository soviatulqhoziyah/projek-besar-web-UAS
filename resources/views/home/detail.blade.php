@extends('layouts.tamplate')

@section('content')

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
.event-detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.event-hero {
    position: relative;
    height: 400px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.event-hero img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.event-hero-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    padding: 40px 30px 30px;
    color: white;
}

.event-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.event-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 0.9rem;
}

.meta-item i {
    color: #60a5fa;
}

.content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    margin-top: 30px;
}

.main-content {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.info-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border-left: 4px solid #4f46e5;
}

.info-card h4 {
    color: #1f2937;
    margin-bottom: 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.info-card h4 i {
    color: #4f46e5;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f3f4f6;
    color: #4b5563;
}

.info-list li:last-child {
    border-bottom: none;
}

.info-list li i {
    width: 20px;
    text-align: center;
    color: #6b7280;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: #4f46e5;
}

.description-text {
    line-height: 1.8;
    color: #4b5563;
    font-size: 1rem;
    text-align: justify;
    margin-bottom: 25px;
}

.benefits-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.benefit-item {
    background: #f8fafc;
    padding: 15px;
    border-radius: 12px;
    border-left: 3px solid #10b981;
    display: flex;
    align-items: center;
    gap: 12px;
}

.benefit-item i {
    color: #10b981;
    font-size: 1.1rem;
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.btn-modern {
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #4338ca, #6d28d9);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    color: white;
    text-decoration: none;
}

.btn-secondary {
    background: transparent;
    color: #6b7280;
    border: 2px solid #e5e7eb;
}

.btn-secondary:hover {
    background: #f9fafb;
    color: #374151;
    border-color: #d1d5db;
    text-decoration: none;
}

.btn-whatsapp {
    background: linear-gradient(135deg, #25d366, #128c7e);
    color: white;
}

.btn-whatsapp:hover {
    background: linear-gradient(135deg, #1ebe57, #0f7b70);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    color: white;
    text-decoration: none;
}

.contact-highlight {
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: white;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    margin-top: 20px;
}

.contact-highlight h5 {
    margin-bottom: 10px;
    font-weight: 600;
}

.contact-highlight p {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .content-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .event-title {
        font-size: 2rem;
    }
    
    .event-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-modern {
        justify-content: center;
    }
    
    .benefits-list {
        grid-template-columns: 1fr;
    }
}

</style>

<div class="event-detail-container">
    <!-- Hero Section -->
    <div class="event-hero">
        <img src="{{ Str::startsWith($event->image, ['http://', 'https://']) ? $event->image : asset('storage/'.$event->image) }}" 
             alt="{{ $event->nama_kegiatan }}">
        
        <div class="event-hero-overlay">
            <h1 class="event-title">{{ $event->nama_kegiatan }}</h1>
            
            <div class="event-meta">
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>{{ \Carbon\Carbon::parse($event->tanggal_kegiatan)->translatedFormat('d F Y') }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $event->waktu }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $event->tempat }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Main Content -->
        <div class="main-content">
            <div class="section-title">
                <i class="fas fa-info-circle"></i>
                <span>Tentang Kegiatan</span>
            </div>
            
            <div class="description-text">
                {{ $event->deskripsi }}
            </div>

            @if($event->benefitnya)
                <div class="section-title">
                    <i class="fas fa-star"></i>
                    <span>Manfaat & Keuntungan</span>
                </div>
                
                <div class="benefits-list">
                    @php
                        $benefits = array_filter(array_map('trim', explode('.', $event->benefitnya)));
                    @endphp
                    
                    @if(count($benefits) > 1)
                        @foreach($benefits as $benefit)
                            @if(!empty($benefit))
                                <div class="benefit-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $benefit }}</span>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ $event->benefitnya }}</span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="action-buttons">
                <a href="#" class="btn-modern btn-primary">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar Sekarang</span>
                </a>
                
                <a href="{{ route('home.homepage') }}" class="btn-modern btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Event Info Card -->
            <div class="info-card">
                <h4>
                    <i class="fas fa-calendar-alt"></i>
                    Detail Acara
                </h4>
                
                <ul class="info-list">
                    <li>
                        <i class="fas fa-calendar"></i>
                        <div>
                            <strong>Tanggal</strong><br>
                            <span>{{ \Carbon\Carbon::parse($event->tanggal_kegiatan)->translatedFormat('d F Y') }}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Waktu</strong><br>
                            <span>{{ $event->waktu }}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Lokasi</strong><br>
                            <span>{{ $event->tempat }}</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Contact Info Card -->
            <div class="info-card">
                <h4>
                    <i class="fas fa-headset"></i>
                    Kontak & Bantuan
                </h4>
                
                <div class="contact-highlight">
                    <h5>Hubungi Kami</h5>
                    <p>{{ $event->contact_person }}</p>
                </div>
                
            </div>

           
        </div>
    </div>
</div>

@endsection