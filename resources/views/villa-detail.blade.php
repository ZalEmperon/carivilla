<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman akan dinamis sesuai nama villa --}}
    <title>Detail {{ $villa->name }} - Carivillapuncak</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .villa-detail-container {
            max-width: 900px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 40px;
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
            transition: background-color 0.3s ease;
            z-index: 10;
        }

        .back-button:hover {
            background-color: rgba(0, 0, 0, 0.6);
        }
        
        .villa-main-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .villa-content {
            padding: 2rem 2.5rem;
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

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h3 {
            font-weight: 600;
            font-size: 1.5rem;
            color: #34495e;
            margin-bottom: 1rem;
            border-bottom: 2px solid #e0f7fa;
            padding-bottom: 0.5rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #ecf0f1;
            font-size: 1rem;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item .label {
            color: #7f8c8d;
        }

        .info-item .value {
            color: #2c3e50;
            font-weight: 500;
        }
        
        .facility-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            transition: transform 0.2s ease;
        }
        
        .facility-item:hover {
            transform: translateY(-5px);
        }
        
        .facility-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 0.75rem;
        }

        .facility-item p {
            font-weight: 500;
            color: #34495e;
            margin-bottom: 0;
        }
        
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            height: 400px;
            border: 5px solid #e0f7fa;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        .whatsapp-button {
            background-color: #25d366;
            color: white;
            font-weight: 600;
            padding: 1rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .whatsapp-button:hover {
            background-color: #20c659;
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(37, 211, 102, 0.3);
        }
    </style>
</head>
<body>

    <div class="villa-detail-container">
        <div class="position-relative">
            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}" class="back-button" title="Kembali ke Beranda">
                <i class="bi bi-arrow-left"></i>
            </a>

            <!-- Gambar Utama / Carousel -->
            @if($villa->gallery_images && count($villa->gallery_images) > 0)
                <div id="villaCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#villaCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @foreach($villa->gallery_images as $index => $image)
                        <button type="button" data-bs-target="#villaCarousel" data-bs-slide-to="{{ $index + 1 }}" aria-label="Slide {{ $index + 2 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $villa->main_image) }}" class="d-block w-100 villa-main-image" alt="Foto utama {{ $villa->name }}">
                        </div>
                        @foreach($villa->gallery_images as $image)
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 villa-main-image" alt="Galeri foto {{ $villa->name }}">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#villaCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#villaCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <img src="{{ asset('storage/' . $villa->main_image) }}" class="villa-main-image" alt="Foto utama {{ $villa->name }}">
            @endif
        </div>

        <div class="villa-content">
            <h1 class="villa-title">{{ $villa->name }}</h1>
            <p class="villa-location"><i class="bi bi-geo-alt-fill me-2"></i>{{ $villa->location }}</p>

            <!-- Informasi Utama -->
            <section class="info-section">
                <h3><i class="bi bi-info-circle-fill me-2"></i>Informasi Villa</h3>
                <div class="info-item">
                    <span class="label">Harga Weekday</span>
                    <span class="value">Rp. {{ number_format($villa->price_weekday, 0, ',', '.') }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Harga Weekend</span>
                    <span class="value">Rp. {{ number_format($villa->price_weekend, 0, ',', '.') }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Kapasitas</span>
                    <span class="value">{{ $villa->capacity ?? '-' }} orang</span>
                </div>
                <div class="info-item">
                    <span class="label">Kamar Tidur</span>
                    <span class="value">{{ $villa->bedrooms ?? '-' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Kamar Mandi</span>
                    <span class="value">{{ $villa->bathrooms ?? '-' }}</span>
                </div>
            </section>

            <!-- Fasilitas -->
            @if($villa->facilities && count($villa->facilities) > 0)
            <section class="info-section">
                <h3><i class="bi bi-stars me-2"></i>Fasilitas Unggulan</h3>
                <div class="row g-3">
                    @foreach($villa->facilities as $facility)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="facility-item">
                            @if(isset($facility['image_path']))
                                <img src="{{ asset('storage/' . $facility['image_path']) }}" alt="Foto {{ $facility['name'] }}">
                            @else
                                {{-- Placeholder jika tidak ada gambar fasilitas --}}
                                <img src="https://placehold.co/400x300/e0f7fa/34495e?text=Icon" alt="Ikon {{ $facility['name'] }}">
                            @endif
                            <p>{{ $facility['name'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
            
            <!-- Peta Lokasi -->
            @if($villa->map_location)
            <section class="info-section">
                <h3><i class="bi bi-map-fill me-2"></i>Peta Lokasi</h3>
                <div class="map-container">
                    {!! $villa->map_location !!} {{-- Menggunakan {!! !!} agar tag iframe bisa dirender --}}
                </div>
            </section>
            @endif

            <!-- Tombol Booking -->
            <section class="mt-5">
                {{-- Ganti nomor 6281234567890 dengan nomor WA Admin yang sebenarnya --}}
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20villa%20bernama%20*{{ urlencode($villa->name) }}*.%20Apakah%20tersedia?" target="_blank" class="whatsapp-button">
                    <i class="bi bi-whatsapp me-2"></i> Tanya / Booking via WhatsApp
                </a>
            </section>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>