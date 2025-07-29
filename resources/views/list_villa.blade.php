<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Villa Terbaik di Puncak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* --- CSS Kustom --- */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* -- Hero Section -- */
        .hero-section {
            position: relative;
            padding: 6rem 1rem;
            background-image: url('https://images.unsplash.com/photo-1578899695728-3942c0167fea?q=80&w=2070&auto=format&fit=crop'); /* Gambar Latar */
            background-size: cover;
            background-position: center;
            border-radius: 1.5rem;
            color: white;
            text-align: center;
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 400;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        /* -- Villa Card -- */
        .villa-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .villa-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .villa-card-image-container {
            position: relative;
            overflow: hidden;
        }

        .villa-card-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .villa-card:hover .villa-card-image {
            transform: scale(1.05);
        }

        .price-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(45deg, #ff4e50, #f9d423);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            animation: pulse-badge 2s infinite;
        }

        @keyframes pulse-badge {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .villa-card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .villa-name {
            font-weight: 700;
            color: #2c3e50;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .villa-location {
            color: #7f8c8d;
            margin-bottom: 1rem;
        }

        .villa-features {
            display: flex;
            gap: 1.5rem;
            color: #34495e;
            margin-bottom: 1.5rem;
        }

        .feature-icon {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .villa-card-footer {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        /* -- Buttons -- */
        .btn-details, .btn-whatsapp {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-details {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: white;
        }

        .btn-details:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
            color: white;
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: white;
        }

        .btn-whatsapp:hover {
            background-color: #20c659;
            transform: scale(1.05);
            color: white;
        }

        .btn-whatsapp .fa-whatsapp {
            transition: transform 0.3s ease;
        }

        .btn-whatsapp:hover .fa-whatsapp {
            transform: rotate(15deg);
        }
    </style>
</head>
<body>

<main class="container py-4">

    <section class="hero-section" data-aos="fade-in">
        <div class="hero-content">
            <h1 class="hero-title">Temukan Villa Impian Anda</h1>
            <p class="hero-subtitle">Pilihan villa terbaik di Puncak dengan pemandangan dan fasilitas memukau.</p>
        </div>
    </section>

    <section class="villa-list">
        <h2 class="mb-4 fw-bold">Pilihan Villa Tersedia</h2>
        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4 col-12 d-flex" data-aos="fade-up" data-aos-delay="0">
                <div class="villa-card">
                    <div class="villa-card-image-container">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=800" alt="Foto Villa Puncak Asri" class="villa-card-image">
                        <div class="price-badge">Mulai Rp 1.500.000/malam</div>
                    </div>
                    <div class="villa-card-body">
                        <h3 class="villa-name">Villa Puncak Asri</h3>
                        <p class="villa-location"><i class="fa-solid fa-location-dot me-2"></i>Cisarua, Bogor</p>
                        <div class="villa-features">
                            <span class="feature-icon" title="Kamar Tidur"><i class="fa-solid fa-bed"></i> 4</span>
                            <span class="feature-icon" title="Kamar Mandi"><i class="fa-solid fa-bath"></i> 3</span>
                            <span class="feature-icon" title="Kapasitas"><i class="fa-solid fa-users"></i> 15</span>
                        </div>
                        <div class="villa-card-footer">
                            <div class="d-flex gap-2">
                                <div class="flex-grow-1">
                                    <a href="#" class="btn-details"><i class="fa-solid fa-circle-info me-1"></i> Detail</a>
                                </div>
                                <div>
                                    <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan Villa Puncak Asri" class="btn-whatsapp" target="_blank" title="Tanya via WhatsApp">
                                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="villa-card">
                    <div class="villa-card-image-container">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=800" alt="Foto Villa Lembah Hijau" class="villa-card-image">
                        <div class="price-badge">Mulai Rp 1.200.000/malam</div>
                    </div>
                    <div class="villa-card-body">
                        <h3 class="villa-name">Villa Lembah Hijau</h3>
                        <p class="villa-location"><i class="fa-solid fa-location-dot me-2"></i>Megamendung, Bogor</p>
                        <div class="villa-features">
                            <span class="feature-icon" title="Kamar Tidur"><i class="fa-solid fa-bed"></i> 3</span>
                            <span class="feature-icon" title="Kamar Mandi"><i class="fa-solid fa-bath"></i> 2</span>
                            <span class="feature-icon" title="Kapasitas"><i class="fa-solid fa-users"></i> 10</span>
                        </div>
                        <div class="villa-card-footer">
                            <div class="d-flex gap-2">
                                <div class="flex-grow-1">
                                    <a href="#" class="btn-details"><i class="fa-solid fa-circle-info me-1"></i> Detail</a>
                                </div>
                                <div>
                                    <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan Villa Lembah Hijau" class="btn-whatsapp" target="_blank" title="Tanya via WhatsApp">
                                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-12 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="villa-card">
                    <div class="villa-card-image-container">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800" alt="Foto Villa Bukit Pinus" class="villa-card-image">
                        <div class="price-badge">Mulai Rp 2.000.000/malam</div>
                    </div>
                    <div class="villa-card-body">
                        <h3 class="villa-name">Villa Bukit Pinus</h3>
                        <p class="villa-location"><i class="fa-solid fa-location-dot me-2"></i>Cipanas, Cianjur</p>
                        <div class="villa-features">
                            <span class="feature-icon" title="Kamar Tidur"><i class="fa-solid fa-bed"></i> 5</span>
                            <span class="feature-icon" title="Kamar Mandi"><i class="fa-solid fa-bath"></i> 4</span>
                            <span class="feature-icon" title="Kapasitas"><i class="fa-solid fa-users"></i> 20</span>
                        </div>
                        <div class="villa-card-footer">
                            <div class="d-flex gap-2">
                                <div class="flex-grow-1">
                                    <a href="#" class="btn-details"><i class="fa-solid fa-circle-info me-1"></i> Detail</a>
                                </div>
                                <div>
                                    <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan Villa Bukit Pinus" class="btn-whatsapp" target="_blank" title="Tanya via WhatsApp">
                                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inisialisasi Animate On Scroll (AOS)
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

</body>
</html>