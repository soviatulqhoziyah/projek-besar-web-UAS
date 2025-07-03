@extends('layouts.tamplate')
<style>
    .hero-section {
        background: linear-gradient(135deg, #fff9c4, #f4f4f4, #e8f5e8);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: -50%;
        background: radial-gradient(circle, rgba(255,235,59,0.1), transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate { 100% { transform: rotate(360deg); }}

    .hero-content {
        position: relative;
        z-index: 2;
        animation: slideIn 0.8s ease-out;
    }

    @keyframes slideIn { 
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, #ff6b35, #f9ca24, #6c5ce7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: #555;
    }

    .btn-gradient {
        background: linear-gradient(45deg, #ff6b35, #f9ca24);
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255,107,53,0.3);
        text-decoration: none;
        margin: 0 10px;
        display: inline-flex;
        align-items: center;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        color: white;
    }

    .btn-outline {
        border: 2px solid #ff6b35;
        color: #ff6b35;
        background: rgba(255,255,255,0.8);
        padding: 13px 28px;
        border-radius: 30px;
        transition: all 0.3s ease;
        text-decoration: none;
        margin: 0 10px;
        display: inline-flex;
        align-items: center;
    }

    .btn-outline:hover {
        background: linear-gradient(45deg, #ff6b35, #f9ca24);
        color: white;
        transform: translateY(-3px);
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(255,235,59,0.2), rgba(255,107,53,0.1));
        animation: float 6s ease-in-out infinite;
    }

    .shape:nth-child(1) { width: 80px; height: 80px; top: 15%; left: 15%; }
    .shape:nth-child(2) { width: 120px; height: 120px; top: 70%; right: 20%; animation-delay: 2s; }
    .shape:nth-child(3) { width: 60px; height: 60px; bottom: 15%; left: 25%; animation-delay: 4s; }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }

    @media (max-width: 768px) {
        .hero-content h1 { font-size: 2.2rem; }
        .btn-gradient, .btn-outline { display: block; margin: 10px auto; width: 200px; justify-content: center; }
        .shape { display: none; }
    }
</style>

<section class="hero-section">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    
    <div class="hero-content">
        <h1>InfoEvent PNP</h1>
        <p>Platform informasi kegiatan dan event mahasiswa<br>Politeknik Negeri Padang</p>
        
        <div>
            <a href="{{ route('home.homepage') }}" class="btn-gradient">
                <i class="fas fa-calendar-alt me-2"></i>Lihat Event
            </a>
            <a href="{{ route('home.kontak') }}" class="btn-outline">
                <i class="fas fa-phone me-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>