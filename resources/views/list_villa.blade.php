@extends('layouts.app')

@section('title', 'Daftar Villa Terbaik di Puncak')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --bg-container: #FFFFFF;
            --text-primary: #315E26;     /* Hijau Tua */
            --accent-primary: #7A9D79;   /* Hijau Sage */
            --accent-secondary: #AECDAF; /* Hijau Mint */
            --text-muted: #8a9a8a;
        }

        /* -- Kontainer Utama -- */
        .content-container {
            background-color: var(--bg-container);
            border-radius: 1.5rem;
            padding: 3.5rem; /* Padding diperbesar sedikit */
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* -- Judul & Sub-judul -- */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .page-title { font-weight: 700; color: var(--text-primary); }
        .page-subtitle { color: var(--text-muted); max-width: 600px; margin: 0.5rem auto 0; }

        /* -- Villa Card -- */
        .villa-card {
            background: #fdfdfd; border-radius: 1rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
            overflow: hidden; transition: all 0.3s ease;
            display: flex; flex-direction: column; height: 100%;
            border: 1px solid #eef0ed;
        }
        .villa-card:hover { transform: translateY(-8px); box-shadow: 0 12px 35px rgba(0,0,0,0.1); }
        .villa-card-image-container { position: relative; }
        .villa-card-image { width: 100%; height: 230px; object-fit: cover; }

        .price-badge {
            position: absolute; top: 1rem; right: 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            color: var(--text-primary);
            padding: 0.4rem 0.8rem; border-radius: 0.5rem;
            font-weight: 600; font-size: 0.85rem;
        }
        
        /* Konten di dalam kartu */
        .villa-card-body { padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1; }
        .villa-name { font-weight: 600; color: var(--text-primary); font-size: 1.15rem; margin-bottom: 0.5rem; min-height: 44px; }
        .villa-location { color: var(--text-muted); margin-bottom: 1rem; font-size: 0.9rem; }
        .villa-features { display: flex; gap: 1rem; color: var(--text-muted); margin-bottom: 1.5rem; font-size: 0.9rem; }
        .feature-icon { display: flex; align-items: center; gap: 0.5rem; }
        .feature-icon i { color: var(--accent-primary); }
        
        /* Footer (area tombol) */
        .villa-card-footer {
            margin-top: auto; padding-top: 1rem;
            border-top: 1px solid #f0f2f0;
            display: flex;
            justify-content: flex-end; /* Mendorong tombol ke kanan */
            align-items: center;
            gap: 0.5rem;
        }
        
        /* -- Tombol -- */
        .btn-details, .btn-whatsapp {
            display: flex; align-items: center; justify-content: center;
            padding: 0.65rem; border-radius: 0.5rem;
            text-decoration: none; font-weight: 600;
            transition: all 0.25s ease;
            border: 2px solid transparent;
        }
        .btn-details {
            background-color: var(--accent-primary);
            border-color: var(--accent-primary);
            color: white;
            flex-grow: 1; /* Biarkan tombol detail membesar */
        }
        .btn-details:hover { background-color: var(--text-primary); border-color: var(--text-primary); color: white; }

        .btn-whatsapp {
            background-color: transparent;
            border-color: var(--accent-secondary);
            color: var(--accent-primary);
            width: 44px; /* Ukuran tetap untuk tombol ikon */
            height: 44px;
            flex-shrink: 0;
        }
        .btn-whatsapp:hover { background-color: var(--accent-secondary); color: var(--text-primary); }
    </style>
@endpush

@section('content')
<main class="container py-4">
    <div class="content-container">
        
        <div class="page-header" data-aos="fade-up">
            <h1 class="page-title">Temukan Villa Impian Anda</h1>
            {{-- Teks ini sekarang berada di tengah karena parent-nya (page-header) memiliki text-align: center --}}
            <p class="page-subtitle">Pilihan villa terbaik di Puncak dengan pemandangan dan fasilitas memukau.</p>
        </div>

        {{-- Menambahkan `justify-content-center` untuk memposisikan kartu di tengah jika baris tidak terisi penuh --}}
        <div class="row">
            
            @forelse ($dataVilla as $villa)
                <div class="col-md-6 col-lg-4 col-12 d-flex mb-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="villa-card w-100">
                        <div class="villa-card-image-container">
                            <a href="{{ url('/detail/' . $villa->slug) }}">
                                <img src="{{ asset('storage/uploads/villas/' . ($villa->foto_slider[0] ?? 'default.jpg')) }}" alt="Foto {{ $villa->nama }}" class="villa-card-image">
                            </a>
                            <div class="price-badge">Rp {{ number_format($villa->harga_weekday, 0, ',', '.') }}</div>
                        </div>
                        <div class="villa-card-body">
                            <h3 class="villa-name">{{ $villa->nama }}</h3>
                            <p class="villa-location"><i class="fa-solid fa-location-dot"></i> {{ $villa->lokasi }}</p>
                            <div class="villa-features">
                                <span class="feature-icon" title="Kamar Tidur"><i class="fa-solid fa-bed"></i> {{ $villa->kamar_tidur }}</span>
                                <span class="feature-icon" title="Kamar Mandi"><i class="fa-solid fa-bath"></i> {{ $villa->kamar_mandi }}</span>
                                <span class="feature-icon" title="Kapasitas"><i class="fa-solid fa-users"></i> {{ $villa->kapasitas }}</span>
                            </div>
                            <div class="villa-card-footer">
                                {{-- Tombol WhatsApp kini hanya ikon --}}
                                @php
                                    $whatsapp_message = urlencode('Halo, saya tertarik dengan villa ' . $villa->nama);
                                @endphp
                                <a href="https://wa.me/{{ $villa->nomor_wa }}?text={{ $whatsapp_message }}" class="btn-whatsapp" target="_blank" title="Tanya via WhatsApp">
                                    <i class="fa-brands fa-whatsapp fa-lg"></i>
                                </a>
                                {{-- Tombol Detail memanjang dan berada di kanan (secara visual) --}}
                                <a href="{{ url('/detail/' . $villa->slug) }}" class="btn-details">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center lead">Belum ada villa yang tersedia saat ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        once: true,
        offset: 50
    });
</script>
@endpush