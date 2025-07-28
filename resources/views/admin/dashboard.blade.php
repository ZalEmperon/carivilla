@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark admin-sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
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
                <h1 class="h2">Dashboard Admin</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('admin.villas.create') }}" class="btn success-button">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Villa Baru
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2>Daftar Villa</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Villa</th>
                            <th>Lokasi</th>
                            <th>Harga Weekday</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($villas as $villa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $villa->nama }}</td>
                                <td>{{ $villa->lokasi }}</td>
                                <td>Rp. {{ number_format($villa->harga_weekday, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('admin.villas.edit', $villa->id) }}" class="btn info-button btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn danger-button btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-villa-id="{{ $villa->id }}" data-villa-name="{{ $villa->nama }}">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada villa yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus Villa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus villa "<strong id="villaToDeleteName"></strong>"? Aksi ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteVillaForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Script untuk mengisi data modal konfirmasi hapus
    var deleteConfirmationModal = document.getElementById('deleteConfirmationModal');
    deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var villaId = button.getAttribute('data-villa-id'); // Extract info from data-* attributes
        var villaName = button.getAttribute('data-villa-name');

        var modalTitle = deleteConfirmationModal.querySelector('#villaToDeleteName');
        var deleteForm = deleteConfirmationModal.querySelector('#deleteVillaForm');

        modalTitle.textContent = villaName;
        deleteForm.action = '/admin/villas/' + villaId; // Set form action dynamically
    });
</script>
@endpush
@endsection