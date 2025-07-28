@extends('layouts.app')

@section('title', 'Daftar Villa di Puncak')

@section('content')
<main class="container py-5">
    <section class="villa-list">
        <h2 class="text-center mb-4">Daftar Villa Tersedia</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($dataVilla as $villa)
                <div class="col d-flex">
                    <div class="villa-item">
                        @php
                            // Ambil foto pertama, atau placeholder jika tidak ada
                            $first_photo = !empty($villa->foto_slider) && count($villa->foto_slider) > 0
                                ? asset('storage/uploads/villas/' . $villa->foto_slider[0])
                                : 'https://via.placeholder.com/400x250?text=No+Image';
                        @endphp
                        <img src="{{ $first_photo }}" alt="Foto {{ $villa->nama }}" class="villa-image">
                        <div class="villa-info">
                            <h2>{{ $villa->nama }}</h2>
                            <p class="location">Lokasi: {{ $villa->lokasi }}</p>
                            <p class="price">Harga mulai Rp. <span class="price-value">{{ number_format($villa->harga_weekday, 0, ',', '.') }}</span></p>
                            <div class="mt-auto">
                                <a href="/detail/{{$villa->slug}}" class="button primary-button mb-2">Lihat Detil Villa {{ $villa->nama }}</a>
                                @php
                                    $whatsapp_message = urlencode("Halo, saya ingin bertanya tentang Villa " . $villa->nama . " apakah masih tersedia?");
                                    $whatsapp_link = "https://wa.me/" . $villa->nomor_wa . "?text=" . $whatsapp_message;
                                @endphp
                                <a href="{{ $whatsapp_link }}" class="button whatsapp-button" target="_blank">Tanya-tanya / Booking (langsung WA)</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center lead">Belum ada data villa yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>
</main>
@endsection