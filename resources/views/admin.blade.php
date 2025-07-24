<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Carivilla Puncak</title>
    <style>
        /* Basic inline styles for demonstration. Use a proper CSS file in production. */
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        .btn { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-warning { background-color: #ffc107; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .form-group input[type="file"] { padding: 3px; }
        .alert { padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel - Carivilla Puncak</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <hr>

        <h2>Daftar Villa</h2>
        <a href="{{ route('admin.villas.create') }}" class="btn btn-primary">Tambah Villa Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Villa</th>
                    <th>Lokasi</th>
                    <th>Harga Weekday (Mulai)</th>
                    <th>Harga Weekend (Mulai)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through villas from your database --}}
                @forelse ($villas as $villa)
                    <tr>
                        <td>{{ $villa->id }}</td>
                        <td>{{ $villa->name }}</td>
                        <td>{{ $villa->location }}</td>
                        <td>Rp. {{ number_format($villa->price_weekday_start, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($villa->price_weekend_start, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.villas.show', $villa->id) }}" class="btn btn-success btn-sm">Lihat</a>
                            <a href="{{ route('admin.villas.edit', $villa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.villas.destroy', $villa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus villa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada villa terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>

        {{-- Form for Adding/Editing a Villa (This could be a separate Blade file, e.g., create.blade.php or edit.blade.php, and included here or rendered conditionally) --}}
        <h2>{{ isset($villaToEdit) ? 'Edit Villa' : 'Tambah Villa Baru' }}</h2>

        <form action="{{ isset($villaToEdit) ? route('admin.villas.update', $villaToEdit->id) : route('admin.villas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($villaToEdit))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Nama Villa:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $villaToEdit->name ?? '') }}" required>
                @error('name') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="location">Lokasi:</label>
                <input type="text" id="location" name="location" value="{{ old('location', $villaToEdit->location ?? '') }}" required>
                @error('location') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price_weekday">Harga Weekday (Rp.):</label>
                <input type="number" id="price_weekday" name="price_weekday" value="{{ old('price_weekday', $villaToEdit->price_weekday ?? '') }}" required>
                {{-- You might add a checkbox/dropdown for 'bisa/tidak bisa nego' here if you want to store that info --}}
                @error('price_weekday') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price_weekend">Harga Weekend (Rp.):</label>
                <input type="number" id="price_weekend" name="price_weekend" value="{{ old('price_weekend', $villaToEdit->price_weekend ?? '') }}" required>
                {{-- You might add a checkbox/dropdown for 'bisa/tidak bisa nego' here if you want to store that info --}}
                @error('price_weekend') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="capacity">Kapasitas:</label>
                <input type="text" id="capacity" name="capacity" value="{{ old('capacity', $villaToEdit->capacity ?? '') }}">
            </div>

            <div class="form-group">
                <label for="bedrooms">Kamar Tidur:</label>
                <input type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $villaToEdit->bedrooms ?? '') }}">
            </div>

            <div class="form-group">
                <label for="bathrooms">Kamar Mandi:</label>
                <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $villaToEdit->bathrooms ?? '') }}">
            </div>

            <div class="form-group">
                <label for="main_image">Foto Utama Villa (untuk halaman depan):</label>
                <input type="file" id="main_image" name="main_image">
                @if(isset($villaToEdit->main_image_path))
                    <p>Current Image: <img src="{{ asset('storage/' . $villaToEdit->main_image_path) }}" alt="Main Image" width="100"></p>
                @endif
                @error('main_image') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Galeri Foto Villa (maksimal 3 foto untuk detail):</label>
                <input type="file" name="gallery_images[]" multiple>
                {{-- You'll need to handle displaying existing gallery images and allowing deletion/replacement --}}
                @if(isset($villaToEdit) && $villaToEdit->gallery_images)
                    <div>
                        @foreach(json_decode($villaToEdit->gallery_images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" width="80" style="margin-right: 5px;">
                        @endforeach
                    </div>
                @endif
                @error('gallery_images.*') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <h3>Fasilitas:</h3>
            {{-- This can be handled dynamically with JavaScript or by having a fixed number of facility inputs --}}
            <div id="facilities-container">
                @if(isset($villaToEdit) && $villaToEdit->facilities)
                    @foreach(json_decode($villaToEdit->facilities) as $index => $facility)
                        <div class="form-group facility-item">
                            <label for="facility_{{ $index }}">Fasilitas {{ $index + 1 }}:</label>
                            <input type="text" name="facilities[]" id="facility_{{ $index }}" value="{{ $facility->name }}">
                            <label for="facility_image_{{ $index }}">Foto Fasilitas (Opsional):</label>
                            <input type="file" name="facility_images[]" id="facility_image_{{ $index }}">
                            @if(isset($facility->image_path))
                                <p>Current Image: <img src="{{ asset('storage/' . $facility->image_path) }}" alt="Facility Image" width="50"></p>
                            @endif
                            <button type="button" class="btn btn-danger btn-sm remove-facility">Remove</button>
                        </div>
                    @endforeach
                @else
                    <div class="form-group facility-item">
                        <label for="facility_1">Fasilitas 1:</label>
                        <input type="text" name="facilities[]" id="facility_1">
                        <label for="facility_image_1">Foto Fasilitas (Opsional):</label>
                        <input type="file" name="facility_images[]" id="facility_image_1">
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-success btn-sm" id="add-facility">Tambah Fasilitas</button>

            <div class="form-group" style="margin-top: 20px;">
                <label for="map_location">Link Google Maps Lokasi:</label>
                <input type="text" id="map_location" name="map_location" value="{{ old('map_location', $villaToEdit->map_location ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($villaToEdit) ? 'Update Villa' : 'Simpan Villa' }}</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addFacilityBtn = document.getElementById('add-facility');
            const facilitiesContainer = document.getElementById('facilities-container');
            let facilityCount = facilitiesContainer.children.length;

            addFacilityBtn.addEventListener('click', function() {
                facilityCount++;
                const newFacilityDiv = document.createElement('div');
                newFacilityDiv.classList.add('form-group', 'facility-item');
                newFacilityDiv.innerHTML = `
                    <label for="facility_${facilityCount}">Fasilitas ${facilityCount}:</label>
                    <input type="text" name="facilities[]" id="facility_${facilityCount}">
                    <label for="facility_image_${facilityCount}">Foto Fasilitas (Opsional):</label>
                    <input type="file" name="facility_images[]" id="facility_image_${facilityCount}">
                    <button type="button" class="btn btn-danger btn-sm remove-facility">Remove</button>
                `;
                facilitiesContainer.appendChild(newFacilityDiv);
            });

            facilitiesContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-facility')) {
                    e.target.closest('.facility-item').remove();
                }
            });
        });
    </script>
</body>
</html>