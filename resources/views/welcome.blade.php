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
</body>
</html>
