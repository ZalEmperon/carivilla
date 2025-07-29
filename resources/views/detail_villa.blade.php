@extends('layouts.app')

@section('title', 'Detail Villa: ' . $dataVilla->nama)

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    /* --- PALET WARNA KONSISTEN: COOL MINIMALIST --- */
    :root {
        --bg-main: #F4F7F9;        /* Abu-abu sangat muda dan sejuk */
        --bg-card: #FFFFFF;
        --text-primary: #1A253C;   /* Biru dongker / Arang */
        --text-muted: #8A94A6;     /* Abu-abu untuk teks sekunder */
        --accent-primary: #3A7DFF; /* Biru cerah sebagai aksen utama */
    }

    /* -- Carousel & Gambar -- */
    .villa-carousel-container {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 8px Gg30px rgba(138, 148, 166, 0.1);
        margin-bottom: 2rem;
    }
    .villa-main-image {
        height: 500px;
        object-fit: cover;
    }

    /* -- Konten Utama -- */
    .villa-header { margin-bottom: 2rem; }
    .villa-title {
        font-weight: 700;
        font-size: 2.5rem;
        color: var(--text-primary);
    }
    .villa-location {
        font-size: 1.1rem;
        color: var(--text-muted);
        font-weight: 400;
    }
    
    /* -- Kartu Info & Booking -- */
    .info-card {
        background-color: var(--bg-card);
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 1.5rem;
        border: 1px solid #EAEFF4;
    }
    .booking-card {
        position: sticky;
        top: 2rem;
    }
    
    /* -- Elemen di dalam kartu -- */
    .section-title {
        font-weight: 600;
        font-size: 1.4rem;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
    }
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr; /* 2 kolom */
        gap: 1.5rem;
    }
    .info-box {
        background: var(--bg-main);
        padding: 1rem;
        border-radius: 0.75rem;
    }
    .info-box .label { font-size: 0.9rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem; }
    .info-box .value { font-size: 1.1rem; font-weight: 600; color: var(--text-primary); }
    
    .facility-grid {
            display: grid;
            /* PERUBAHAN: Kolom diperlebar untuk memberi ruang lebih */
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 1.5rem; /* Jarak antar item diperbesar */
        }

        .facility-item {
            text-align: center;
            transition: all 0.2s ease-in-out;
        }

        .facility-item:hover {
            transform: translateY(-5px);
        }
        
        .facility-item img {
            /* PERUBAHAN UTAMA: Ukuran gambar diperbesar secara signifikan */
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 1rem; /* Jarak ke teks di bawahnya ditambah */
        }
        
        .facility-item p {
            font-weight: 500;
            /* PERUBAHAN: Ukuran font disesuaikan agar seimbang */
            font-size: 1rem; 
            color: var(--text-primary);
            margin: 0;
        }
    .map-container {
        border-radius: 1rem;
        overflow: hidden;
        height: 350px;
    }
    .map-container iframe { width: 100%; height: 100%; border: 0; }
    
    .price-display {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        text-align: center;
        margin-bottom: 1rem;
    }
    .price-display small {
        font-size: 0.9rem;
        font-weight: 400;
        color: var(--text-muted);
    }

    .whatsapp-button {
        display: flex; align-items: center; justify-content: center;
        width: 100%; padding: 0.85rem;
        border-radius: 0.75rem; text-decoration: none;
        font-weight: 600; transition: all 0.25s ease;
        background-color: var(--accent-primary);
        border: 2px solid var(--accent-primary);
        color: white;
    }
    .whatsapp-button:hover {
        background-color: #2F6DE8;
        border-color: #2F6DE8;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(58, 125, 255, 0.25);
    }
</style>
@endpush

@section('content')
<main class="container py-4">
    <div class="villa-carousel-container" data-aos="fade-up">
        @if (!empty($dataVilla->foto_slider) && count($dataVilla->foto_slider) > 0)
            <div id="villaCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($dataVilla->foto_slider as $key => $foto)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/uploads/villas/' . $foto) }}" class="d-block w-100 villa-main-image" alt="Foto {{ $dataVilla->nama }}">
                        </div>
                    @endforeach
                </div>
                @if (count($dataVilla->foto_slider) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#villaCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#villaCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                @endif
            </div>
        @else
            <img src="https://placehold.co/1200x500/F4F7F9/1A253C?text=Gambar+Tidak+Tersedia" class="villa-main-image" alt="Gambar tidak tersedia">
        @endif
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="villa-header" data-aos="fade-up" data-aos-delay="100">
                <h1 class="villa-title">{{ $dataVilla->nama }}</h1>
                <p class="villa-location"><i class="bi bi-geo-alt-fill me-1"></i>{{ $dataVilla->lokasi }}</p>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                <h3 class="section-title">Informasi Utama</h3>
                <div class="info-grid">
                    <div class="info-box">
                        <span class="label">Kapasitas</span>
                        <span class="value">{{ $dataVilla->kapasitas }} Orang</span>
                    </div>
                    <div class="info-box">
                        <span class="label">Kamar Tidur</span>
                        <span class="value">{{ $dataVilla->kamar_tidur }}</span>
                    </div>
                    <div class="info-box">
                        <span class="label">Kamar Mandi</span>
                        <span class="value">{{ $dataVilla->kamar_mandi }}</span>
                    </div>
                    <div class="info-box">
                        <span class="label">Nego</span>
                        <span class="value">{{ $dataVilla->nego_weekday ? 'Bisa' : 'Tidak' }}</span>
                    </div>
                </div>
            </div>

            @if (!empty($dataVilla->fasilitas) && count($dataVilla->fasilitas) > 0)
                <div class="info-card" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="section-title">Fasilitas</h3>
                    <div class="facility-grid">
                        @foreach ($dataVilla->fasilitas as $fasilitas)
                            <div class="facility-item">
                                <img src="{{ asset('storage/uploads/fasilitas/' . $fasilitas['foto']) }}" alt="{{ $fasilitas['nama'] }}">
                                <p>{{ $fasilitas['nama'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="booking-card" data-aos="fade-left" data-aos-delay="400">
                <div class="info-card">
                    <h3 class="section-title text-center">Harga per Malam</h3>
                    <div class="price-display">
                        Rp {{ number_format($dataVilla->harga_weekday, 0, ',', '.') }}
                        <small>/ Weekday</small>
                    </div>
                     <div class="price-display">
                        Rp {{ number_format($dataVilla->harga_weekend, 0, ',', '.') }}
                        <small>/ Weekend</small>
                    </div>
                    
                    @php
                        $whatsapp_message = urlencode('Halo, saya tertarik dengan villa ' . $dataVilla->nama . '. Apakah masih tersedia?');
                        $whatsapp_link = 'https://wa.me/' . $dataVilla->nomor_wa . '?text=' . $whatsapp_message;
                    @endphp
                    <a href="{{ $whatsapp_link }}" class="whatsapp-button mt-3" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Booking via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @if($dataVilla->map_embed)
        <div class="info-card mt-4" data-aos="fade-up">
            <h3 class="section-title">Peta Lokasi</h3>
            <div class="map-container">
                {!! $dataVilla->map_embed !!}
            </div>
        </div>
    @endif
</main>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
    });
</script>
@endpush