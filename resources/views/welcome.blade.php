<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Villa Puncak</title>

    <!-- Bootstrap 5 CSS - TYPO FIXED -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Mengatur font utama dan background gradasi */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #ede7f6 100%);
            background-attachment: fixed;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* Styling untuk judul utama */
        .main-title {
            font-weight: 700;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 40px;
            text-align: center;
            letter-spacing: 1px;
        }

        /* Styling untuk kartu villa yang baru */
        .villa-card {
            background-color: #ffffff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%; /* Memastikan kartu mengisi tinggi kolom */
            display: flex;
            flex-direction: column;
        }

        .villa-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .villa-card-header {
            padding: 2rem;
            text-align: center;
        }

        .villa-card-header h3 {
            color: white;
            font-weight: 600;
            font-size: 1.75rem;
            margin: 0;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        
        /* Variasi warna header */
        .header-green { background-color: #a7d7c5; }
        .header-blue { background-color: #c1d5e0; }
        .header-orange { background-color: #f5d5a6; }

        .villa-card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Membuat body kartu mengisi ruang yang tersedia */
        }

        .villa-card-body .card-title {
            font-weight: 700;
            color: #2c3e50;
            font-size: 1.25rem;
        }

        .villa-card-body .card-text {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .villa-card-body .card-text .location-icon {
            width: 16px;
            height: 16px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .villa-card-body .price {
            font-weight: 600;
            color: #333;
        }
        
        /* Wrapper untuk tombol agar bisa didorong ke bawah */
        .card-actions {
            margin-top: auto; /* Trik utama untuk mendorong tombol ke bawah */
        }

        /* Styling untuk tombol */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-detail {
            background-color: #5b6f9a;
            color: white;
            margin-bottom: 0.75rem;
        }

        .btn-detail:hover {
            background-color: #4a5a8a;
        }

        .btn-whatsapp {
            background-color: #c8e6c9;
            color: #2e7d32;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-whatsapp:hover {
            background-color: #b9d9ba;
        }

        .btn-whatsapp .wa-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .site-footer {
            background-color: #2c3e50; /* Warna gelap yang diambil dari judul kartu */
            color: #bdc3c7; /* Warna teks abu-abu lembut */
            padding: 60px 0;
        }
        
        .site-footer .footer-heading {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .site-footer .lead {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .site-footer .btn-whatsapp-footer {
            background-color: #25d366; /* Warna hijau resmi WhatsApp */
            color: white;
            padding: 12px 30px;
            border-radius: 50px; /* Bentuk tombol menjadi pil */
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .site-footer .btn-whatsapp-footer:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(37, 211, 102, 0.4);
        }
        
        .site-footer .footer-divider {
            margin: 40px auto;
            border-top: 1px solid #465568;
            max-width: 100px;
        }
        
        .site-footer .copyright-text {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Judul Utama -->
        <h1 class="main-title">CARIVILLAPUNCAK</h1>

        <!-- Baris untuk menampung kartu-kartu villa -->
        <div class="row justify-content-center">

            <!-- Kartu Villa Puncak Kopi -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="villa-card">
                    <div class="villa-card-header header-green">
                        <h3>Villa Puncak Kopi</h3>
                    </div>
                    <div class="villa-card-body">
                        <div>
                            <h4 class="card-title">Villa Puncak Kopi</h4>
                            <p class="card-text">
                                <svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                Megamendung, Puncak Bogor
                            </p>
                            <p class="price">Harga mulai <strong>Rp. 1.500.000</strong></p>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-custom btn-detail">Lihat Detail Villa</a>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Villa%20Puncak%20Kopi" target="_blank" class="btn btn-custom btn-whatsapp">
                                <svg class="wa-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                Tanya-tanya / Booking (WA)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Villa Nakodia -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="villa-card">
                    <div class="villa-card-header header-blue">
                        <h3>Villa Nakodia</h3>
                    </div>
                    <div class="villa-card-body">
                        <div>
                            <h4 class="card-title">Villa Nakodia</h4>
                            <p class="card-text">
                                <svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                Cisarua, Puncak Bogor
                            </p>
                            <p class="price">Harga mulai <strong>Rp. 1.200.000</strong></p>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-custom btn-detail">Lihat Detail Villa</a>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Villa%20Nakodia" target="_blank" class="btn btn-custom btn-whatsapp">
                                <svg class="wa-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                Tanya-tanya / Booking (WA)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Villa Bukit Asri -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="villa-card">
                    <div class="villa-card-header header-orange">
                        <h3>Villa Bukit Asri</h3>
                    </div>
                    <div class="villa-card-body">
                        <div>
                            <h4 class="card-title">Villa Bukit Asri</h4>
                            <p class="card-text">
                                <svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                Cipanas, Puncak
                            </p>
                            <p class="price">Harga mulai <strong>Rp. 1.800.000</strong></p>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-custom btn-detail">Lihat Detail Villa</a>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Villa%20Bukit%20Asri" target="_blank" class="btn btn-custom btn-whatsapp">
                                <svg class="wa-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                Tanya-tanya / Booking (WA)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Bootstrap 5 JS - TYPO FIXED -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <footer class="site-footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="footer-heading">Butuh Bantuan atau Rekomendasi Villa?</h2>
                    <p class="lead text-white-50">Jangan ragu untuk menghubungi Admin kami yang siap membantu Anda.</p>
                    
                    {{-- Ganti nomor 6281234567890 dengan nomor WA Admin yang sebenarnya --}}
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Carivillapuncak,%20saya%20butuh%20bantuan."
                       target="_blank" class="btn btn-whatsapp-footer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943s-.182-.133-.38-.232z"/>
                        </svg>
                        Hubungi Admin via WhatsApp
                    </a>
                </div>
            </div>
    
            <hr class="footer-divider">
    
            <div class="row">
                <div class="col-12 text-center">
                    <p class="copyright-text mb-0">
                        &copy; {{ date('Y') }} Carivillapuncak. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
