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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: #f7f6f2; /* Warna dasar lebih cerah dari palet E2DFDA */
            --bg-card: #FFFFFF;
            --text-primary: #3B6255;
            --accent-primary: #8BA49A;
            --accent-secondary: #D2C49E;
            --accent-light: #f1f5f3; /* Warna hijau sangat pucat */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary);
            font-weight: 400;
        }

        .main-container {
            max-width: 1100px;
            margin: 3rem auto;
            animation: fadeIn 0.6s ease-out;
        }

        .villa-carousel {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .villa-carousel .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        .carousel-control-prev, .carousel-control-next {
            width: 3rem; height: 3rem;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }
        .carousel-control-prev { left: 1rem; }
        .carousel-control-next { right: 1rem; }

        .villa-header {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .villa-title {
            font-weight: 700;
            font-size: 2.75rem;
            color: var(--text-primary);
        }
        .villa-location {
            font-size: 1.1rem;
            color: var(--accent-primary);
            font-weight: 500;
        }

        .info-card {
            background-color: var(--bg-card);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #e5e5e5;
        }

        .section-title {
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent-secondary);
            display: inline-block;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        .info-box {
            background: var(--accent-light);
            padding: 1rem;
            border-radius: 0.75rem;
        }
        .info-box .label {
            font-size: 0.9rem;
            color: var(--accent-primary);
            display: block;
            margin-bottom: 0.25rem;
        }
        .info-box .value {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        .info-box .value.price {
            color: #2a9d8f; /* Warna hijau yang lebih cerah untuk harga */
        }
        .info-box i {
            margin-right: 0.5rem;
            color: var(--accent-primary);
        }
        
        .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
        }
        .facility-item {
            text-align: center;
            padding: 1rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease-in-out;
        }
        .facility-item:hover {
            background-color: var(--accent-light);
            transform: scale(1.05);
        }
        .facility-item img {
            width: 48px; height: 48px;
            object-fit: contain;
            margin-bottom: 0.5rem;
        }
        .facility-item p {
            font-weight: 500;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .map-container {
            border-radius: 1rem;
            overflow: hidden;
            height: 400px;
        }
        
        .booking-card {
            position: sticky;
            top: 2rem;
        }
        .whatsapp-button {
            background-color: var(--text-primary);
            color: white;
            font-weight: 600;
            padding: 1rem;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        .whatsapp-button:hover {
            background-color: #2c5046;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="villa-carousel">
            @if(!empty($dataVilla->foto_slider) && count($dataVilla->foto_slider) > 0)
                <div id="villaCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($dataVilla->foto_slider as $key => $foto)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $foto) }}" class="d-block w-100" alt="Foto galeri {{ $dataVilla->nama }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#villaCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#villaCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
                </div>
            @else
                <img src="https://placehold.co/1200x500/f1f5f3/3B6255?text=Gambar+Tidak+Tersedia" class="d-block w-100" alt="Gambar tidak tersedia">
            @endif
        </div>

        <div class="villa-header text-center">
            <h1 class="villa-title">{{ $dataVilla->nama }}</h1>
            <p class="villa-location"><i class="bi bi-geo-alt-fill"></i> {{ $dataVilla->lokasi }}</p>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="info-card">
                    <h3 class="section-title">Informasi Utama</h3>
                    <div class="info-grid">
                        <div class="info-box">
                            <span class="label">Harga Weekday</span>
                            <span class="value price">Rp {{ number_format($dataVilla->harga_weekday, 0, ',', '.') }}</span>
                        </div>
                        <div class="info-box">
                            <span class="label">Harga Weekend</span>
                            <span class="value price">Rp {{ number_format($dataVilla->harga_weekend, 0, ',', '.') }}</span>
                        </div>
                        <div class="info-box">
                            <span class="label"><i class="bi bi-people"></i> Kapasitas</span>
                            <span class="value">{{ $dataVilla->kapasitas ?? '-' }} orang</span>
                        </div>
                        <div class="info-box">
                            <span class="label"><i class="bi bi-door-closed"></i> Kamar Tidur</span>
                            <span class="value">{{ $dataVilla->kamar_tidur ?? '-' }}</span>
                        </div>
                         <div class="info-box">
                            <span class="label"><i class="bi bi-droplet"></i> Kamar Mandi</span>
                            <span class="value">{{ $dataVilla->kamar_mandi ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                @if($dataVilla->fasilitas && count($dataVilla->fasilitas) > 0)
                <div class="info-card">
                    <h3 class="section-title">Fasilitas</h3>
                    <div class="facility-grid">
                        @foreach($dataVilla->fasilitas as $facility)
                            <div class="facility-item">
                                @if(isset($facility['foto']))
                                    <img src="{{ asset('storage/' . $facility['foto']) }}" alt="{{ $facility['nama'] }}">
                                @else
                                    <img src="https://placehold.co/100x100/CBDED3/3B6255?text=Icon" alt="{{ $facility['nama'] }}">
                                @endif
                                <p>{{ $facility['nama'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="info-card booking-card">
                    <h3 class="section-title">Booking Sekarang</h3>
                    <p class="mb-3">Hubungi kami langsung melalui WhatsApp untuk respon cepat.</p>
                    @php
                        $whatsapp_message = urlencode("Halo, saya tertarik dengan villa " . $dataVilla->nama . ". Apakah masih tersedia?");
                    @endphp
                    <a href="https://wa.me/{{ $dataVilla->nomor_wa }}?text={{ $whatsapp_message }}" target="_blank" class="whatsapp-button">
                        <i class="bi bi-whatsapp me-2"></i> Tanya via WhatsApp
                    </a>
                </div>

                @if($dataVilla->map_embed)
                    <div class="info-card">
                        <h3 class="section-title">Peta Lokasi</h3>
                        <div class="map-container">
                            {!! $dataVilla->map_embed !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>