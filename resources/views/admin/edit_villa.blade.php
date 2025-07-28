@extends('layouts.app')

@section('title', 'Edit Villa: ' . $villa->nama)

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark admin-sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-fw fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.villas.create') }}">
                            <i class="fas fa-fw fa-plus-circle me-2"></i> Tambah Villa
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Villa: {{ $villa->nama }}</h1>
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

            <form action="{{ route('admin.villas.update', $villa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Penting untuk metode UPDATE --}}

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Villa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $villa->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $villa->lokasi) }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $villa->deskripsi) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                        <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" value="{{ old('jumlah_kamar', $villa->jumlah_kamar) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jumlah_kamar_mandi" class="form-label">Jumlah Kamar Mandi</label>
                        <input type="text" class="form-control" id="jumlah_kamar_mandi" name="jumlah_kamar_mandi" value="{{ old('jumlah_kamar_mandi', $villa->jumlah_kamar_mandi) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="luas_tanah" class="form-label">Luas Tanah (contoh: 500m²)</label>
                        <input type="text" class="form-control" id="luas_tanah" name="luas_tanah" value="{{ old('luas_tanah', $villa->luas_tanah) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan (contoh: 200m²)</label>
                        <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" value="{{ old('luas_bangunan', $villa->luas_bangunan) }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas (pisahkan dengan koma atau enter untuk setiap fasilitas)</label>
                    <textarea class="form-control" id="fasilitas" name="fasilitas[]" rows="3" placeholder="Contoh: Kolam Renang, WiFi, Dapur Lengkap">{{ old('fasilitas') ? implode(', ', old('fasilitas')) : (is_array($villa->fasilitas) ? implode(', ', $villa->fasilitas) : '') }}</textarea>
                    <small class="form-text text-muted">Setiap baris atau koma akan dianggap sebagai satu fasilitas.</small>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga_weekday" class="form-label">Harga Weekday (Rp)</label>
                        <input type="number" class="form-control" id="harga_weekday" name="harga_weekday" value="{{ old('harga_weekday', $villa->harga_weekday) }}" step="0.01" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="harga_weekend" class="form-label">Harga Weekend (Rp)</label>
                        <input type="number" class="form-control" id="harga_weekend" name="harga_weekend" value="{{ old('harga_weekend', $villa->harga_weekend) }}" step="0.01" min="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="foto_slider" class="form-label">Foto Villa (pilih baru untuk mengganti)</label>
                    <input type="file" class="form-control" id="foto_slider" name="foto_slider[]" multiple accept="image/*">
                    @if(!empty($villa->foto_slider))
                        <div class="mt-2">
                            <p>Foto saat ini:</p>
                            <div class="row">
                                @foreach($villa->foto_slider as $foto)
                                    <div class="col-3 mb-2">
                                        <img src="{{ asset('storage/' . $foto) }}" class="img-thumbnail" alt="Foto Villa" style="height: 100px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nomor_wa" class="form-label">Nomor WhatsApp (untuk booking)</label>
                    <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" value="{{ old('nomor_wa', $villa->nomor_wa) }}" placeholder="Contoh: 6281234567890">
                </div>

                <button type="submit" class="btn primary-button">Update Villa</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fasilitasInput = document.getElementById('fasilitas');
        fasilitasInput.addEventListener('input', function() {
            // Split by comma or new line
            const values = this.value.split(/,|\n/).map(item => item.trim()).filter(item => item !== '');
        });
    });
</script>
@endpush