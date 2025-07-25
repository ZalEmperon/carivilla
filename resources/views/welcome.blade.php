<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Villa Puncak</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Mengatur font utama dan background gradasi */
        body {
            font-family: 'Poppins', sans-serif;
            /* Gradasi yang terinspirasi dari contoh, dari biru muda ke ungu muda */
            background: linear-gradient(135deg, #e0f7fa 0%, #ede7f6 100%);
            background-attachment: fixed; /* Membuat gradasi tetap saat scroll */
        }

        /* Styling untuk judul utama */
        .main-title {
            font-weight: 700;
            font-size: 2.5rem;
            color: #333;
            margin-top: 40px;
            margin-bottom: 40px;
            text-align: center;
            letter-spacing: 1px;
        }

        /* Custom styling untuk kartu villa */
        .villa-card {
            background-color: #ffffff;
            border: none;
            border-radius: 15px; /* Membuat sudut lebih tumpul */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08); /* Memberi efek bayangan yang lembut */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 3rem; /* Memberi jarak antar kartu */
        }

        .villa-card:hover {
            transform: translateY(-10px); /* Efek mengangkat saat kursor di atas */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .villa-card .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 300px; /* Menyamakan tinggi gambar */
            object-fit: cover; /* Agar gambar tidak gepeng */
        }
        
        .villa-card .card-body {
            padding: 2rem; /* Memberi ruang di dalam kartu */
        }

        .villa-card .card-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .villa-card .card-text {
            color: #7f8c8d;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* Styling untuk tombol */
        .btn-detail {
            font-weight: 600;
            background-color: transparent;
            color: #3498db;
            border: 2px solid #3498db;
            border-radius: 50px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #3498db;
            color: #ffffff;
        }

        .btn-whatsapp {
            font-weight: 600;
            background-color: #25D366;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            display: inline-block; /* Agar bisa diberi margin-top */
            margin-top: 1rem;
        }

        .btn-whatsapp:hover {
            background-color: #1EAE54;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Judul Utama -->
        <h1 class="main-title">CARIVILLAPUNCAK</h1>

        <!-- Baris untuk menampung kartu-kartu villa -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <!-- Kartu Villa Pertama -->
                <div class="villa-card text-center">
                    <img src="https://placehold.co/800x600/a2d2ff/ffffff?text=Foto+Villa+Puncak+Kopi" class="card-img-top" alt="Foto Villa Puncak Kopi">
                    <div class="card-body">
                        <h3 class="card-title">Villa Puncak Kopi</h3>
                        <p class="card-text">
                            Lokasi : Megamendung, Puncak Bogor<br>
                            Harga mulai Rp. 1.500.000
                        </p>
                        <a href="#" class="btn btn-detail">Lihat Detail Villa Puncak Kopi</a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20untuk%20booking%20Villa%20Puncak%20Kopi" target="_blank" class="btn btn-whatsapp">Tanya-tanya / Booking (langsung WA)</a>
                    </div>
                </div>

                <!-- Kartu Villa Kedua -->
                <div class="villa-card text-center">
                    <img src="https://placehold.co/800x600/bde0fe/ffffff?text=Foto+Villa+Nakodia" class="card-img-top" alt="Foto Villa Nakodia">
                    <div class="card-body">
                        <h3 class="card-title">Villa Nakodia</h3>
                        <p class="card-text">
                            Lokasi : Cisarua, Puncak Bogor<br>
                            Harga mulai Rp. 2.000.000
                        </p>
                        <a href="#" class="btn btn-detail">Lihat Detail Villa Nakodia</a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20untuk%20booking%20Villa%20Nakodia" target="_blank" class="btn btn-whatsapp">Tanya-tanya / Booking (langsung WA)</a>
                    </div>
                </div>
                
                <!-- Anda bisa menambahkan kartu villa lainnya di sini -->

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (opsional, tapi disarankan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
