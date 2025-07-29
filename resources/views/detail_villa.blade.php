@extends('layouts.app')

@section('title', 'Detail ' . $dataVilla->nama)

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(180deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .villa-detail-container {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 10px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-top: 20px;
        margin-bottom: 40px;
    }
    
    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .back-button:hover {
        background-color: rgba(0, 0, 0, 0.7);
        transform: scale(1.1);
    }
    
    .carousel-control-prev, .carousel-control-next {
        background: rgba(0, 0, 0, 0.3);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        transition: background-color 0.3s ease;
    }
    .carousel-control-prev { left: 15px; }
    .carousel-control-next { right: 15px; }
    .carousel-control-prev:hover, .carousel-control-next:hover {
        background: rgba(0, 0, 0, 0.6);
    }

    .carousel-item.active .villa-main-image {
        transition: transform 10s linear;
        transform: scale(1.05);
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

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 0.85rem 0;
        border-bottom: 1px solid #ecf0f1;
        font-size: 1rem;
    }
    .info-item:last-child { border-bottom: none; }
    .info-item .label { color: #7f8c8d; }
    .info-item .value { color: #2c3e50; font-weight: 500; }
    
    .facility-item {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .facility-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .facility-item img {
        width: 115px;
        height: 115px;
        margin-bottom: 0.25rem;
    }
    
    .facility-item p {
        font-weight: 500;
        color: #34495e;
        margin-bottom: 0;
        font-size: 0.9rem;
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