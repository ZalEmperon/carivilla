@extends('guest.layouts.app')

{{-- Judul halaman akan dinamis sesuai nama villa --}}
@section('title', 'Detail ' . $dataVilla->nama)

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        /* PERUBAHAN: Latar belakang gradasi abu-abu yang lebih modern */
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
    
    /* PERUBAHAN: Tombol slider dibuat lebih hidup dan modern */
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
        width: 100%;
        height: 450px;
        object-fit: cover;
        transform: scale(1);
        transition: transform 0.5s ease;
    }

    .villa-content {
        padding: 2.5rem 3rem;
    }

    .villa-title {
        font-weight: 700;
        font-size: 2.5rem;
        color: #2c3e50;
    }

    .villa-location {
        font-size: 1.1rem;
        color: #7f8c8d;
        margin-bottom: 1.5rem;
    }

    .info-section h3 {
        font-weight: 600;
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .info-section h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        border-radius: 3px;
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
        /* object-fit: contain; */
        margin-bottom: 0.25rem;
    }
    
    .facility-item p {
        font-weight: 500;
        color: #34495e;
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        height: 400px;
        border: 1px solid #dee2e6;
    }
    .map-container iframe { width: 100%; height: 100%; border: 0; }
    
    .booking-card {
        position: sticky;
        top: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    
    .whatsapp-button {
        background: linear-gradient(45deg, #25d366, #2ecc71);
        color: white;
        font-weight: 600;
        padding: 1rem;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        animation: pulse 2s infinite;
    }
    
    .whatsapp-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 7px 20px rgba(37, 211, 102, 0.4);
        animation: none;
    }

    @keyframes pulse {
        0% { box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3); }
        50% { box-shadow: 0 4px 25px rgba(37, 211, 102, 0.5); }
        100% { box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3); }
    }
</style>
@endpush

@section('content')
<main class="container py-4">
    <div class="villa-detail-container">
        <div class="position-relative">
            <a href="{{ url('/') }}" class="back-button" title="Kembali ke Beranda" data-aos="fade-right" data-aos-delay="300">
                <i class="bi bi-arrow-left text-white h5 m-0"></i>
            </a>

            {{-- Image Carousel --}}
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
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#villaCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            @else
                <img src="https://placehold.co/1200x600/E0F7FA/333?text=Gambar+Tidak+Tersedia" class="villa-main-image" alt="Gambar tidak tersedia">
            @endif
        </div>

        <div class="villa-content">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="villa-title" data-aos="fade-up">{{ $dataVilla->nama }}</h1>
                    <p class="villa-location" data-aos="fade-up" data-aos-delay="100"><i class="bi bi-geo-alt-fill me-2"></i>{{ $dataVilla->lokasi }}</p>

                    <section class="info-section" data-aos="fade-up" data-aos-delay="200">
                        <h3><i class="bi bi-info-circle-fill me-2"></i>Informasi Villa</h3>
                        <div class="info-item">
                            <span class="label"><i class="bi bi-people-fill h5 me-2"></i>Kapasitas Orang</span>
                            <span class="value">{{ $dataVilla->kapasitas }}</span>
                        </div>
                        <div class="info-item">
                            <span class="label"><i class="bi bi-backpack4-fill h5 me-2"></i>Jumlah Kamar Tidur</span>
                            <span class="value">{{ $dataVilla->kamar_tidur }}</span>
                        </div>
                        <div class="info-item">
                            <span class="label"><i class="bi bi-droplet-half h5 me-2"></i>Jumlah Kamar Mandi</span>
                            <span class="value">{{ $dataVilla->kamar_mandi }}</span>
                        </div>
                    </section>

                    @if (!empty($dataVilla->fasilitas) && count($dataVilla->fasilitas) > 0)
                        <section class="info-section" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="mt-3"><i class="bi bi-stars me-2"></i>Fasilitas</h3>
                            <div class="row g-3">
                                @foreach ($dataVilla->fasilitas as $fasilitas)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="facility-item justify-content-start px-2" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                                            <img class="rounded-3" src="{{ asset('storage/uploads/fasilitas/' . $fasilitas['foto']) }}" alt="{{ $fasilitas['nama'] }}">
                                            <p>{{ $fasilitas['nama'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if($dataVilla->map_embed)
                        <section class="info-section" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="mt-3"><i class="bi bi-map-fill me-2"></i>Peta Lokasi</h3>
                            <div class="map-container mb-4">
                                {!! $dataVilla->map_embed !!}
                            </div>
                        </section>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card booking-card" data-aos="fade-left" data-aos-delay="500">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-3">Harga & Booking</h4>
                            <div class="info-item border-0">
                                <span class="label">Harga Weekday</span>
                                <span class="value text-success">Rp. {{ number_format($dataVilla->harga_weekday, 0, ',', '.') }}</span>
                            </div>
                            <div class="info-item border-secondary">
                                <span class="label">Nego Weekday</span>
                                <span class="value">{{ $dataVilla->nego_weekday ? 'Bisa' : 'Tidak Bisa' }}</span>
                            </div>
                            <div class="info-item border-0">
                                <span class="label">Harga Weekend</span>
                                <span class="value text-success">Rp. {{ number_format($dataVilla->harga_weekend, 0, ',', '.') }}</span>
                            </div>
                            <div class="info-item border-0">
                                <span class="label">Nego Weekend</span>
                                <span class="value">{{ $dataVilla->nego_weekend ? 'Bisa' : 'Tidak Bisa' }}</span>
                            </div>
                            
                            @php
                                $whatsapp_message = urlencode('Halo, saya tertarik dengan villa ' . $dataVilla->nama . '. Apakah masih tersedia?');
                                $whatsapp_link = 'https://wa.me/' . $dataVilla->nomor_wa . '?text=' . $whatsapp_message;
                            @endphp
                            <a href="{{ $whatsapp_link }}" class="whatsapp-button mt-4" target="_blank">
                                <i class="bi bi-whatsapp me-2"></i> Booking via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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