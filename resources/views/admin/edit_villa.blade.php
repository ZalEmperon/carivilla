@extends('layouts.app')

@section('title', 'Edit Villa: ' . $dataVilla->nama)

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark admin-sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/admin-dashboard">
                <i class="fas fa-fw fa-tachometer-alt me-2"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/admin-add">
                <i class="fas fa-fw fa-plus-circle me-2"></i> Tambah Villa
              </a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start text-danger" style="width: 100%;">
                  <i class="fas fa-fw fa-sign-out-alt me-2"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 admin-content">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Edit Villa</h1>
        </div>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="/admin-edit" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" id="slug" name="slug" value="{{ old('slug', $dataVilla->slug) }}">

          <!-- Nama Villa -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Villa</label>
            <input type="text" class="form-control" id="nama" name="nama"
              value="{{ old('nama', $dataVilla->nama) }}" required>
          </div>

          <!-- Lokasi -->
          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi"
              value="{{ old('lokasi', $dataVilla->lokasi) }}" required>
          </div>

          <!-- Harga -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="harga_weekday" class="form-label">Harga Weekday (Rp)</label>
              <input type="number" class="form-control" id="harga_weekday" name="harga_weekday"
                value="{{ old('harga_weekday', $dataVilla->harga_weekday) }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="harga_weekend" class="form-label">Harga Weekend (Rp)</label>
              <input type="number" class="form-control" id="harga_weekend" name="harga_weekend"
                value="{{ old('harga_weekend', $dataVilla->harga_weekend) }}" required>
            </div>
          </div>

          <!-- Nego -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nego_weekday" class="form-label">Bisa Nego Weekday?</label>
              <select name="nego_weekday" id="nego_weekday" class="form-select">
                <option value="1" {{ $dataVilla->nego_weekday ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$dataVilla->nego_weekday ? 'selected' : '' }}>Tidak</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="nego_weekend" class="form-label">Bisa Nego Weekend?</label>
              <select name="nego_weekend" id="nego_weekend" class="form-select">
                <option value="1" {{ $dataVilla->nego_weekend ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$dataVilla->nego_weekend ? 'selected' : '' }}>Tidak</option>
              </select>
            </div>
          </div>

          <!-- Kapasitas dan kamar -->
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="kapasitas" class="form-label">Kapasitas</label>
              <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                value="{{ old('kapasitas', $dataVilla->kapasitas) }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
              <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur"
                value="{{ old('kamar_tidur', $dataVilla->kamar_tidur) }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="kamar_mandi" class="form-label">Jumlah Kamar Mandi</label>
              <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi"
                value="{{ old('kamar_mandi', $dataVilla->kamar_mandi) }}" required>
            </div>
          </div>

          <!-- Embed Map -->
          <div class="mb-3">
            <label for="map_embed" class="form-label">Embed Map</label>
            <textarea class="form-control" id="map_embed" name="map_embed" rows="3" required>{{ old('map_embed', $dataVilla->map_embed) }}</textarea>
          </div>

          <!-- Nomor WA -->
          <div class="mb-3">
            <label for="nomor_wa" class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" id="nomor_wa" name="nomor_wa"
              value="{{ old('nomor_wa', $dataVilla->nomor_wa) }}" placeholder="6281234567890" required>
          </div>

          <!-- Current Foto Slider Display -->
          <div class="mb-3">
            <label class="form-label">Current Slider Images</label>
            <div class="row">
              @foreach ($dataVilla->foto_slider as $image)
                <div class="col-md-2 mb-2 position-relative">
                  <img src="{{ asset('storage/uploads/villas/' . $image) }}" class="img-thumbnail"
                    style="height: 100px; width: 100%; object-fit: cover;">
                  <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image"
                    data-image="{{ $image }}" data-type="slider">
                    &times;
                  </button>
                </div>
              @endforeach
            </div>
          </div>

          <!-- New Foto Slider Upload -->
          <div class="mb-3">
            <label for="foto_slider" class="form-label">Tambah Foto Slider Baru (bisa pilih banyak)</label>
            <input type="file" class="form-control" id="foto_slider" name="foto_slider[]" multiple
              accept="image/*">
          </div>

          <!-- Fasilitas -->
          <div class="mb-3">
            <label class="form-label">Fasilitas</label>
            <div id="fasilitas-wrapper">
              @foreach ($dataVilla->fasilitas as $index => $fasilitas)
                <div class="fasilitas-item row mb-2">
                  <div class="col-md-5">
                    <input type="text" name="fasilitas[{{ $index }}][nama]" class="form-control"
                      value="{{ $fasilitas['nama'] }}" placeholder="Nama fasilitas" required>
                  </div>
                  <div class="col-md-5">
                    <div class="d-flex align-items-center">
                      @if ($fasilitas['foto'])
                        <img src="{{ asset('storage/uploads/fasilitas/' . $fasilitas['foto']) }}"
                          class="img-thumbnail me-2" style="height: 40px;">
                      @endif
                      <input type="file" name="fasilitas[{{ $index }}][foto]" class="form-control"
                        accept="image/*">
                      <input type="hidden" name="fasilitas[{{ $index }}][old_image]"
                        value="{{ $fasilitas['foto'] }}">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-fasilitas">&times;</button>
                  </div>
                </div>
              @endforeach
            </div>
            <button type="button" class="btn btn-secondary btn-sm mt-2" id="addFasilitas">+ Tambah Fasilitas</button>
          </div>

          <button type="submit" class="btn btn-primary">Update Villa</button>
          <a href="/admin-dashboard" class="btn btn-secondary ms-2">Batal</a>
        </form>
      </main>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let fasilitasIndex = {{ count($dataVilla->fasilitas) }};

    // Add new facility field
    document.getElementById('addFasilitas').addEventListener('click', function() {
      const wrapper = document.getElementById('fasilitas-wrapper');
      const newItem = document.createElement('div');
      newItem.classList.add('fasilitas-item', 'row', 'mb-2');
      newItem.innerHTML = `
        <div class="col-md-5">
            <input type="text" name="fasilitas[${fasilitasIndex}][name]" class="form-control" placeholder="Nama fasilitas" required>
        </div>
        <div class="col-md-5">
            <input type="file" name="fasilitas[${fasilitasIndex}][image]" class="form-control" accept="image/*" required>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-sm remove-fasilitas">&times;</button>
        </div>`;
      wrapper.appendChild(newItem);
      fasilitasIndex++;
    });

    // Remove facility field
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('remove-fasilitas')) {
        e.target.closest('.fasilitas-item').remove();
      }

      // Handle image removal
      if (e.target.classList.contains('remove-image')) {
        const image = e.target.dataset.image;
        const type = e.target.dataset.type;

        // Add hidden input to track removed images
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = `removed_${type}_images[]`;
        input.value = image;
        document.querySelector('form').appendChild(input);

        // Remove the image element
        e.target.closest('.col-md-2').remove();
      }
    });
  </script>
@endpush
