@extends('layouts.tamplate')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    <style>
        .contact-section {
            background: linear-gradient(45deg, #f6f1e7, #e1c87d, #caa851, #a78f5f);
            min-height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .contact-container {
            max-width: 1000px;
            width: 100%;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
        }

        .highlight {
            background: linear-gradient(45deg, #fff9c4, #f9ca24, #ff6b35);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact-card {
            background: rgba(110, 125, 70, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(228, 246, 127, 0.3);
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .info-item {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255, 249, 196, 0.1);
            border-radius: 10px;
            border-left: 4px solid #f9ca24;
        }

        .info-item h5 {
            color: #f9ca24;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .info-item a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-item a:hover {
            color: #ff6b35;
        }

        .text-warning {
            color: #f9ca24 !important;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            color: #fff;
            padding: 0.75rem 1rem;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #f9ca24;
            box-shadow: 0 0 0 0.2rem rgba(249, 202, 36, 0.25);
            color: #fff;
        }

        .btn-primary-gold {
            background: linear-gradient(45deg, #fff9c4, #f9ca24, #ff6b35);
            border: none;
            color: #f3fc90;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(249, 202, 36, 0.3);
            width: 100%;
        }

        .btn-primary-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.5);
            color: #fff9c4;
        }

        @media (max-width: 768px) {
            .contact-header h2 {
                font-size: 2rem;
            }

            .contact-card {
                padding: 1.5rem;
            }
        }

        .alert-success {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-header">
                <h2>Hubungi <span class="highlight">Kami</span></h2>
                <p class="text-center">Kami siap membantu Anda kapan saja</p>
            </div>

            <div class="row g-4">
                <!-- Informasi Kontak -->
                <div class="col-lg-5">
                    <div class="contact-card h-100" style="background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 8px 25px rgb(0 0 0 / 0.1);">
                        <h4 class="text-warning mb-4" style="color: #6f1e51; font-weight: 700;">
                            <i class="fas fa-info-circle me-2"></i>Informasi Kontak
                        </h4>
    
                        <div class="info-item mb-4">
                            <h5 style="font-weight: 600; color: #222;">
                                <i class="fas fa-map-marker-alt me-2" style="color: #f9ca24;"></i>Alamat
                            </h5>
                            <p style="font-size: 1rem; color: #444;">
                                <a href="https://maps.google.com/?q=Politeknik+Negeri+Padang,+Limau+Manis,+Kecamatan+Pauh,+Kota+Padang,+25164" target="_blank" style="color: #d77f12; text-decoration: none; font-weight: 500;">
                                    <strong>Kampus Politeknik Negeri Padang</strong><br>
                                    Limau Manis, Kecamatan Pauh, Kota Padang, 25164
                                    <i class="fas fa-external-link-alt ms-2"></i>
                                </a>
                            </p>
                        </div>
    
                        <div class="info-item mb-4">
                            <h5 style="font-weight: 600; color: #222;">
                                <i class="fas fa-phone me-2" style="color: #f9ca24;"></i>Telepon
                            </h5>
                            <p style="font-size: 1rem; color: #444;">
                                <a href="tel:+62751072590" style="color: #d77f12; text-decoration: none;">Telp. (0751) 72590</a><br>
                                <span class="text-muted" style="color: #999;">Fax. (0751) 72576</span>
                            </p>
                        </div>
    
                        <div class="info-item">
                            <h5 style="font-weight: 600; color: #222;">
                                <i class="fas fa-envelope me-2" style="color: #f9ca24;"></i>Email
                            </h5>
                            <p style="font-size: 1rem;">
                                <a href="mailto:spm@pnp.ac.id" style="color: #d77f12; text-decoration: none;">spm@pnp.ac.id</a>
                            </p>
                        </div>
                    </div>
                </div>

                 <!-- Form Kontak -->
            <div class="col-lg-7">
                <div class="contact-card h-100" style="background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 8px 25px rgb(0 0 0 / 0.1);">
                    <h4 class="text-warning mb-4" style="color: #d78016; font-weight: 700;">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                    </h4>

                    <p style="color: #555; margin-bottom: 25px; font-style: italic;">
                        Sampaikan saran, masukkan, atau keluh kesah Anda. Kami akan mendengarkan dan merespon dengan sepenuh hati!
                    </p>

                    <form action="{{ route('kontak.kirim') }}" method="POST" novalidate>
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required style="border-radius: 8px; border: 1.5px solid #d78016; transition: border-color 0.3s;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required style="border-radius: 8px; border: 1.5px solid #d78016; transition: border-color 0.3s;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="subject" class="form-control form-control-lg" placeholder="Subjek" required style="border-radius: 8px; border: 1.5px solid #d78016; transition: border-color 0.3s;">
                        </div>

                        <div class="mb-4">
                            <textarea name="pesan" rows="5" class="form-control form-control-lg" placeholder="Pesan Anda..." required style="border-radius: 8px; border: 1.5px solid #d78016; transition: border-color 0.3s;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-lg" style="background: #ffa304; color: #fff; border-radius: 8px; font-weight: 700; width: 100%; box-shadow: 0 6px 12px rgb(111 30 81 / 0.4); transition: background 0.3s;">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </form>

                    @if (session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: '{{ session('success') }}',
                                    confirmButtonText: 'Tutup',
                                    confirmButtonColor: '#6f1e51',
                                    backdrop: true
                                });
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>