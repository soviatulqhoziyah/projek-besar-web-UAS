@extends('layouts.tamplate')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ===== BASE ===== */
*{font-family:'Inter',sans-serif}
body{
    background:linear-gradient(135deg,#fff9c4 0%,#f9ca24 50%,#ff6b35 100%);
    min-height:100vh;
    margin:0;
    padding:10px 0;
}
.main-container{
    max-width:1400px;
    margin:0 auto;
    padding:0 20px;
}

/* ===== HEADER ===== */
.header-section{text-align:center;margin-bottom:60px;color:#333}
.header-section h1{
    font-size:3.5rem;font-weight:700;margin-bottom:15px;
    background:linear-gradient(45deg,#ff6b35,#f9ca24);
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    text-shadow:0 4px 15px rgba(0,0,0,.1)
}
.header-section p{font-size:1.2rem;opacity:.8;max-width:600px;margin:0 auto;line-height:1.6}

/* ===== FILTER ===== */
.filter-section{
    background:rgba(255,255,255,.3);backdrop-filter:blur(20px);
    border-radius:20px;padding:25px;margin-bottom:40px;
    border:1px solid rgba(255,107,53,.2)
}
.filter-controls{display:flex;gap:15px;flex-wrap:wrap;align-items:center}
.filter-item{flex:1;min-width:200px}
.filter-item select,.filter-item input{
    width:100%;padding:12px 16px;border:1px solid rgba(255,107,53,.3);
    border-radius:12px;background:rgba(255,255,255,.9);font-size:.95rem;transition:.3s
}
.filter-item select:focus,.filter-item input:focus{
    outline:none;border-color:#ff6b35;box-shadow:0 0 0 3px rgba(255,107,53,.1)
}

/* ===== GRID SIZE ===== */
:root{
    --card-width:300px;
    --card-gap:20px;
}
.events-grid{gap:var(--card-gap);}
.event-card{flex:0 0 var(--card-width);}

/* ===== CARD ===== */
.event-card{
    background:rgba(255,255,255,.95);border-radius:24px;overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,.1);
    transition:.4s cubic-bezier(.175,.885,.32,1.275);
    border:1px solid rgba(255,255,255,.2);position:relative
}
.event-card::before{
    content:'';position:absolute;top:0;left:0;right:0;height:4px;
    background:linear-gradient(90deg,#fff9c4,#f9ca24,#ff6b35,#f9ca24);
    background-size:300% 100%;animation:gradient-shift 3s ease-in-out infinite
}
@keyframes gradient-shift{0%,100%{background-position:0 50%}50%{background-position:100% 50%}}
.event-card:hover{transform:translateY(-10px) scale(1.02);box-shadow:0 30px 60px rgba(255,107,53,.2)}

/* ===== FOTO ===== */
.event-image{
    position:relative;
    aspect-ratio:4/3;
    overflow:hidden;
}
.event-image img{
    width:100%;height:100%;
    object-fit:contain;
    transition:transform .4s;
}
.event-card:hover .event-image img{transform:scale(1.05)}

/* ===== BADGE & ISI ===== */
.event-badge{
    position:absolute;top:15px;right:15px;
    background:linear-gradient(135deg,#ff6b35,#f9ca24);color:#fff;
    padding:8px 16px;border-radius:20px;font-size:.8rem;font-weight:600;backdrop-filter:blur(10px)
}
.event-content{padding:25px}
.event-title{
    font-size:1.3rem;font-weight:700;color:#1a202c;margin-bottom:10px;line-height:1.3;
    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden
}
.event-description{
    color:#64748b;font-size:.95rem;line-height:1.5;margin-bottom:20px;
    display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden
}
.event-details{display:flex;flex-direction:column;gap:12px;margin-bottom:25px}
.detail-item{display:flex;align-items:center;gap:12px;font-size:.9rem;color:#4a5568}
.detail-icon{
    width:18px;height:18px;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,#ff6b35,#f9ca24);color:#fff;border-radius:50%;font-size:.7rem;flex-shrink:0
}
.event-actions{display:flex;gap:12px}
.btn-modern{
    flex:1;padding:12px 20px;border:none;border-radius:12px;font-weight:600;font-size:.9rem;
    text-decoration:none;text-align:center;transition:.3s;position:relative;overflow:hidden
}
.btn-outline{background:transparent;border:2px solid #ff6b35;color:#ff6b35}
.btn-outline:hover{background:#ff6b35;color:#fff;transform:translateY(-2px);box-shadow:0 8px 25px rgba(255,107,53,.3)}
.btn-primary{background:linear-gradient(135deg,#ff6b35,#f9ca24);color:#fff}
.btn-primary:hover{
    background:linear-gradient(135deg,#f9ca24,#ff6b35);
    transform:translateY(-2px);box-shadow:0 8px 25px rgba(255,107,53,.4);color:#fff
}

/* ===== HORIZONTAL SCROLL GRID ===== */
.events-grid{
    display:flex;flex-wrap:nowrap;overflow-x:auto;padding-bottom:10px;
    scroll-snap-type:x mandatory
}
.event-card{scroll-snap-align:start}

.events-grid::-webkit-scrollbar{height:8px}
.events-grid::-webkit-scrollbar-track{background:transparent}
.events-grid::-webkit-scrollbar-thumb{background:rgba(255,107,53,.3);border-radius:4px}
.events-grid{scrollbar-width:thin;scrollbar-color:rgba(255,107,53,.3) transparent}

/* ===== PAGINATION ===== */
.pagination-wrapper{display:flex;justify-content:center;margin-top:50px}
.pagination{
    background:rgba(255,255,255,.2);backdrop-filter:blur(20px);
    border-radius:20px;padding:15px 25px;border:1px solid rgba(255,107,53,.2)
}
.pagination .page-link{
    background:transparent;border:none;color:#333;padding:10px 15px;margin:0 5px;border-radius:10px;transition:.3s
}
.pagination .page-link:hover,.pagination .page-item.active .page-link{
    background:rgba(255,107,53,.2);color:#333;backdrop-filter:blur(10px)
}
.empty-state{text-align:center;color:#333;padding:80px 20px}
.empty-state i{font-size:4rem;margin-bottom:20px;opacity:.6;color:#ff6b35}
.empty-state h3{font-size:1.5rem;margin-bottom:10px;color:#ff6b35}
.empty-state p{opacity:.7;max-width:400px;margin:0 auto}

@media(max-width:768px){
    .header-section h1{font-size:2.5rem}
    .events-grid{overflow-x:visible;flex-wrap:wrap}
    .event-card{flex:1 1 100%}
    .filter-controls{flex-direction:column}
    .filter-item{min-width:100%}
    .event-actions{flex-direction:column}
}
</style>

<div class="main-container">
    @if($events->count())
        <div class="events-grid">
            @foreach($events as $event)
                <div class="event-card">
                    <div class="event-image">
                        @php $img = $event->image; @endphp
                        @if(Str::startsWith($img,['http://','https://']))
                            <img src="{{ $img }}" alt="{{ $event->nama_kegiatan }}">
                        @else
                            <img src="{{ asset('storage/'.$img) }}" alt="{{ $event->nama_kegiatan }}">
                        @endif
                        <div class="event-badge"><i class="fas fa-star me-1"></i>Populer</div>
                    </div>

                    <div class="event-content">
                        <h3 class="event-title">{{ $event->nama_kegiatan }}</h3>
                        {{-- <p class="event-description">{{ $event->deskripsi }}</p> --}}

                        <div class="event-details">
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-calendar"></i></div>
                                <span>{{ \Carbon\Carbon::parse($event->tanggal_kegiatan)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                <span>{{ $event->waktu }}</span>
                            </div>
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <span>{{ $event->tempat }}</span>
                            </div>
                        </div>

                        <div class="event-actions">
                            <a href="{{ route('home.detail',$event->id) }}" class="btn-modern btn-outline">
                                <i class="fas fa-info-circle me-2"></i>Detail
                            </a>
                            <a href="#" class="btn-modern btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">{{ $events->links() }}</div>
    @else
        <div class="empty-state">
            <i class="fas fa-calendar-times"></i>
            <h3>Belum Ada Kegiatan</h3>
            <p>Maaf, belum ada kegiatan yang tersedia saat ini. Silakan periksa kembali nanti atau hubungi admin.</p>
        </div>
    @endif
</div>
@endsection