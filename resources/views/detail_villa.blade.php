<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $dataVilla->nama }} - Carivillapuncak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Mendefinisikan color palette dari gambar Anda */
        :root {
            --bg-main: #E2DFDA;          /* Off-white */
            --text-primary: #3B6255;     /* Hijau Tua untuk teks utama */
            --accent-primary: #8BA49A;   /* Hijau Sage untuk aksen utama */
            --accent-secondary: #D2C49E; /* Emas/Beige untuk highlight */
            --accent-light: #CBDED3;      /* Hijau Pucat untuk latar lembut */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main); /* Latar diubah */
        }

        .villa-detail-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .back-button {
            position: absolute; top: 20px; left: 20px;
            background-color: rgba(59, 98, 85, 0.5); /* Latar tombol diubah */
            color: white;
            border-radius: 50%; width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: background-color 0.3s ease;
            z-index: 10;
        }
        .back-button:hover {
            background-color: var(--text-primary); /* Hover diubah */
        }
        
        .villa-main-image {
            width: 100%; height: 450px;
            object-fit: cover;
        }

        .villa-content {
            padding: 2rem 2.5rem;
        }

        .villa-title {
            font-weight: 700; font-size: 2.5rem;
            color: var(--text-primary); /* Warna judul diubah */
        }

        .villa-location {
            font-size: 1.1rem;
            color: var(--accent-primary); /* Warna lokasi diubah */
            margin-bottom: 1.5rem;
        }

        .info-section h3 {
            font-weight: 600; font-size: 1.5rem;
            color: var(--text-primary); /* Warna sub-judul diubah */
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--accent-secondary); /* Border diubah */
            padding-bottom: 0.5rem;
        }

        .info-item {
            display: flex; justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--bg-main); /* Border diubah */
            font-size: 1rem;
        }
        .info-item .label {
            color: var(--accent-primary); /* Warna label diubah */
        }
        .info-item .value {
            color: var(--text-primary); /* Warna value diubah */
            font-weight: 500;
        }
        
        .facility-item {
            background-color: var(--accent-light); /* Latar fasilitas diubah */
            border-radius: 10px; padding: 1rem;
            text-align: center;
            transition: transform 0.2s ease;
        }
        .facility-item:hover { transform: translateY(-5px); }
        .facility-item img {
            width: 100%; height: 120px;
            object-fit: cover; border-radius: 8px;
            margin-bottom: 0.75rem;
        }
        .facility-item p {
            font-weight: 500;
            color: var(--text-primary); /* Teks fasilitas diubah */
            margin-bottom: 0;
        }
        
        .map-container {
            border-radius: 15px; overflow: hidden;
            height: 400px;
            border: 5px solid var(--accent-light); /* Border map diubah */
        }
        .map-container iframe {
            width: 100%; height: 100%; border: 0;
        }
        
        .whatsapp-button {
            background-color: var(--accent-primary); /* Tombol WA diubah */
            color: white;
            font-weight: 600; padding: 1rem;
            border-radius: 10px; text-decoration: none;
            transition: all 0.3s ease;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
        }
        .whatsapp-button:hover {
            background-color: var(--text-primary); /* Hover WA diubah */
        }
    </style>
</head>
<body>

    <div class="villa-detail-container">
        <div class="position-relative">
            <a href="{{ url('/') }}" class="back-button" title="Kembali ke Beranda">
                <i class="bi bi-arrow-left"></i>
            </a>

            @if(!empty($dataVilla->foto_slider) && count($dataVilla->foto_slider) > 0)
                <div id="villaCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($dataVilla->foto_slider as $index => $foto)
                            <button type="button" data-bs-target="#villaCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($dataVilla->foto_slider as $key => $foto)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $foto) }}" class="d-block w-100 villa-main-image" alt="Foto utama {{ $dataVilla->nama }}">
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
                <img src="https://placehold.co/1200x450/E2DFDA/3B6255?text=Gambar+Tidak+Tersedia" class="villa-main-image" alt="Foto utama {{ $dataVilla->nama }}">
            @endif
        </div>

        <div class="villa-content">
            <h1 class="villa-title">{{ $dataVilla->nama }}</h1>
            <p class="villa-location"><i class="bi bi-geo-alt-fill me-2"></i>{{ $dataVilla->lokasi }}</p>

            <section class="info-section">
                <h3><i class="bi bi-info-circle-fill me-2"></i>Informasi Villa</h3>
                <div class="info-item">
                    <span class="label">Harga Weekday</span>
                    <span class="value">Rp. {{ number_format($dataVilla->harga_weekday, 0, ',', '.') }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Harga Weekend</span>
                    <span class="value">Rp. {{ number_format($dataVilla->harga_weekend, 0, ',', '.') }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Kapasitas</span>
                    <span class="value">{{ $dataVilla->kapasitas ?? '-' }} orang</span>
                </div>
                <div class="info-item">
                    <span class="label">Kamar Tidur</span>
                    <span class="value">{{ $dataVilla->kamar_tidur ?? '-' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Kamar Mandi</span>
                    <span class="value">{{ $dataVilla->kamar_mandi ?? '-' }}</span>
                </div>
            </section>

            @if($dataVilla->fasilitas && count($dataVilla->fasilitas) > 0)
            <section class="info-section">
                <h3><i class="bi bi-stars me-2"></i>Fasilitas Unggulan</h3>
                <div class="row g-3">
                    @foreach($dataVilla->fasilitas as $facility)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="facility-item">
                             @if(isset($facility['foto']))
                                <img src="{{ asset('storage/' . $facility['foto']) }}" alt="{{ $facility['nama'] }}">
                            @else
                                <img src="https://placehold.co/100x120/CBDED3/3B6255?text=Icon" alt="{{ $facility['nama'] }}">
                            @endif
                            <p>{{ $facility['nama'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
            
            @if($dataVilla->map_embed)
            <section class="info-section">
                <h3><i class="bi bi-map-fill me-2"></i>Peta Lokasi</h3>
                <div class="map-container">
                    {!! $dataVilla->map_embed !!}
                </div>
            </section>
            @endif

            <section class="mt-5">
                 @php
                    $whatsapp_message = urlencode("Halo, saya tertarik dengan villa " . $dataVilla->nama . ". Apakah masih tersedia?");
                @endphp
                <a href="https://wa.me/{{ $dataVilla->nomor_wa }}?text={{ $whatsapp_message }}" target="_blank" class="whatsapp-button">
                    <i class="bi bi-whatsapp me-2"></i> Tanya / Booking via WhatsApp
                </a>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>