@extends('layouts.app')

@section('title', 'Daftar Villa di Puncak')

@section('content')
  <main class="container py-3">
    <section class="villa-list">
      <h2 class="mb-4">Daftar Villa Tersedia</h2>
      <div class="row g-4">
        @forelse ($dataVilla as $villa)
          <div class="col-md-6 col-lg-4 col-12 d-flex">
            <div class="villa-item">
              @php
                $first_photo =
                    !empty($villa->foto_slider) && count($villa->foto_slider) > 0
                        ? asset('storage/uploads/villas/' . $villa->foto_slider[0])
                        : 'https://via.placeholder.com/400x250?text=No+Image';
              @endphp
              <img src="{{ $first_photo }}" alt="Foto {{ $villa->nama }}" class="villa-image">
              <div class="villa-info">
                <h5 class="fw-bold">{{ $villa->nama }}</h5>
                <p class="mb-1 text-secondary"><i class="fa-solid fa-location-dot"></i> {{ $villa->lokasi }}</p>
                <span class="price-value fw-bold">Rp. {{ number_format($villa->harga_weekday, 0, ',', '.') }}</span></p>
                <div class="row">
                    <div class="col-12 col-md-9 px-2">
                        <a href="/detail/{{ $villa->slug }}" class="button primary-button mb-2">
                            <span class="d-md-block d-none"><i class="fa-solid fa-circle-info"></i> Detail</span>
                            <span class="d-md-none d-block">Lihat Detail {{ $villa->nama }}</span>
                        </a>
                    </div>
                    @php
                      $whatsapp_message = urlencode(
                          'Halo, saya ingin bertanya tentang ' . $villa->nama . ' apakah masih tersedia?',
                      );
                      $whatsapp_link = 'https://wa.me/' . $villa->nomor_wa . '?text=' . $whatsapp_message;
                    @endphp
                    <div class="col-12 col-md-3 px-2"><a href="{{ $whatsapp_link }}" class="button whatsapp-button" target="_blank">
                        <i class="fa-brands fa-whatsapp h3 d-md-block d-none m-0"></i>
                        <span class="d-md-none d-block">Tanya-tanya / Booking (langsung WA)</span>
                    </a></div>
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
