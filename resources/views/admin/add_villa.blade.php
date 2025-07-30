@extends('admin.layouts.app_admin')

@section('title', 'Tambah Villa Baru')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <main class="col-md-9 w-100 col-lg-10 px-md-4 admin-content">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Tambah Villa Baru</h1>
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

        <form action="/admin-add" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Villa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
          </div>

          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="harga_weekday" class="form-label">Harga Weekday (Rp)</label>
              <input type="number" class="form-control" id="harga_weekday" name="harga_weekday"
                value="{{ old('harga_weekday') }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="harga_weekend" class="form-label">Harga Weekend (Rp)</label>
              <input type="number" class="form-control" id="harga_weekend" name="harga_weekend"
                value="{{ old('harga_weekend') }}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nego_weekday" class="form-label">Bisa Nego Weekday?</label>
              <select name="nego_weekday" id="nego_weekday" class="form-select">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="nego_weekend" class="form-label">Bisa Nego Weekend?</label>
              <select name="nego_weekend" id="nego_weekend" class="form-select">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="kapasitas" class="form-label">Kapasitas</label>
              <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}"
                required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
              <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur"
                value="{{ old('kamar_tidur') }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="kamar_mandi" class="form-label">Jumlah Kamar Mandi</label>
              <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi"
                value="{{ old('kamar_mandi') }}" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="map_embed" class="form-label">Embed Map</label>
            <textarea class="form-control" id="map_embed" name="map_embed" rows="3" required>{{ old('map_embed') }}</textarea>
          </div>

          <div class="mb-3">
            <label for="nomor_wa" class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" value="{{ old('nomor_wa') }}"
              placeholder="6281234567890" required>
          </div>

          <div class="mb-3">
            <label for="foto_slider" class="form-label">Foto Slider (bisa pilih banyak)</label>
            <input type="file" class="form-control" id="foto_slider" name="foto_slider[]" multiple
              accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Fasilitas</label>
            <div id="fasilitas-wrapper">
              <div class="fasilitas-item row mb-2">
                <div class="col-md-6">
                  <input type="text" name="fasilitas[0][nama]" class="form-control" placeholder="Nama fasilitas"
                    required>
                </div>
                <div class="col-md-5">
                  <input type="file" name="fasilitas[0][foto]" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-1">
                  <button type="button" class="btn btn-danger btn-sm remove-fasilitas">&times;</button>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mt-2" id="addFasilitas">+ Tambah Fasilitas</button>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Villa</button>
          <a href="/admin-dashboard" class="btn btn-secondary ms-2">Batal</a>
        </form>

      </main>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let fasilitasIndex = 1;

    document.getElementById('addFasilitas').addEventListener('click', function() {
    console.log("Nemo")
      const wrapper = document.getElementById('fasilitas-wrapper');
      const newItem = document.createElement('div');
      newItem.classList.add('fasilitas-item', 'row', 'mb-2');
      newItem.innerHTML = `
      <div class="col-md-6">
        <input type="text" name="fasilitas[${fasilitasIndex}][nama]" class="form-control" placeholder="Nama fasilitas" required>
      </div>
      <div class="col-md-5">
        <input type="file" name="fasilitas[${fasilitasIndex}][foto]" class="form-control" accept="image/*" required>
      </div>
      <div class="col-md-1">
        <button type="button" class="btn btn-danger btn-sm remove-fasilitas">&times;</button>
      </div>`;
      wrapper.appendChild(newItem);
      fasilitasIndex++;
    });

    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('remove-fasilitas')) {
        e.target.closest('.fasilitas-item').remove();
      }
    });
  </script>
@endpush
