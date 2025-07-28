@extends('layouts.app')

@section('title', $dataVilla->nama)

@section('content')
  <main class="container py-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $dataVilla->nama }}</li>
      </ol>
    </nav>

    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h1 class="card-title text-center text-primary mb-4">{{ $dataVilla->nama }}</h1>

        {{-- Image Carousel --}}
        @if (!empty($dataVilla->foto_slider) && count($dataVilla->foto_slider) > 0)
          <div id="villaCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
              @foreach ($dataVilla->foto_slider as $key => $foto)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                  <img src="{{ asset('storage/uploads/villas/' . $foto) }}" class="d-block w-100 rounded"
                    alt="Foto {{ $dataVilla->nama }}" style="max-height: 500px; object-fit: contain;">
                </div>
              @endforeach
            </div>
            @if (count($dataVilla->foto_slider) > 1)
              <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#villaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next bg-dark" type="button" data-bs-target="#villaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            @endif
          </div>
        @else
          <img src="https://via.placeholder.com/800x500?text=No+Image" class="d-block w-100 rounded mb-4" alt="No Image"
            style="max-height: 500px; object-fit: contain;">
        @endif

        <div class="row">
          <div class="col-md-8">
            <h3 class="mt-4">Detail Properti</h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Lokasi: <span class="fw-bold">{{ $dataVilla->lokasi }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kapasitas Orang: <span class="fw-bold">{{ $dataVilla->kapasitas }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jumlah Kamar: <span class="fw-bold">{{ $dataVilla->kamar_tidur }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jumlah Kamar Mandi: <span class="fw-bold">{{ $dataVilla->kamar_mandi }}</span>
              </li>
            </ul>

            @if (!empty($dataVilla->fasilitas) && count($dataVilla->fasilitas) > 0)
              <h3 class="mt-4">Fasilitas</h3>
              <div class="row">
                @foreach ($dataVilla->fasilitas as $fasilitas)
                  <div class="col-6 col-md-4 mb-2 text-center">
                    <img src="{{ asset('storage/uploads/fasilitas/' . $fasilitas['foto']) }}" alt="{{ $fasilitas['nama'] }}"
                      class="img-fluid mb-1" style="max-height: 100px;">
                    <span class="badge bg-primary text-white p-2 w-100">
                      <i class="fas fa-check-circle me-1"></i> {{ $fasilitas['nama'] }}
                    </span>
                  </div>
                @endforeach
              </div>
            @endif
            <h3>Lokasi</h3>
            {!! $dataVilla->map_embed !!}
          </div>
          <div class="col-md-4">
            <div class="card bg-light border-0 shadow-sm sticky-top" style="top: 20px;">
              <div class="card-body">
                <h4 class="card-title text-center text-danger">Harga</h4>
                <ul class="list-group list-group-flush mb-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Harga Weekday: <span class="fw-bold text-success">Rp.
                      {{ number_format($dataVilla->harga_weekday, 0, ',', '.') }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Harga Weekend: <span class="fw-bold text-success">Rp.
                      {{ number_format($dataVilla->harga_weekend, 0, ',', '.') }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nego Weekday: <span class="fw-bold text-success">
                        @if ($dataVilla->nego_weekday)
                            Bisa
                        @elseif (!$dataVilla->nego_weekday)
                            Tidak Bisa
                        @endif
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nego Weekend: <span class="fw-bold text-success">
                        @if ($dataVilla->nego_weekend)
                            Bisa
                        @elseif (!$dataVilla->nego_weekend)
                            Tidak Bisa
                        @endif
                    </span>
                  </li>
                </ul>
                @php
                  $whatsapp_message = urlencode(
                      'Halo, saya ingin bertanya lebih lanjut dan booking Villa ' .
                          $dataVilla->nama .
                          ' apakah masih tersedia? Dengan harga Rp. ' .
                          number_format($dataVilla->harga_weekday, 0, ',', '.'),
                  );
                  $whatsapp_link = 'https://wa.me/' . $dataVilla->nomor_wa . '?text=' . $whatsapp_message;
                @endphp
                <a href="{{ $whatsapp_link }}" class="button whatsapp-button mt-3" target="_blank"><i
                    class="fab fa-whatsapp me-2"></i> Tanya-tanya / Booking Sekarang!</a>
                <a href="/" class="button primary-button mt-2">Kembali ke Daftar Villa</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
