<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CARIVILLAPUNCAK')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- PALET WARNA UTAMA: COOL MINIMALIST --- */
        :root {
            --bg-main: #F4F7F9;
            --bg-card: #FFFFFF;
            --text-primary: #1A253C;
            --text-muted: #8A94A6;
            --accent-primary: #3A7DFF;
            --border-color: #EAEFF4;
        }

        /* --- LATAR BELAKANG DINAMIS --- */
        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #f4f7f9, #f7f8fa, #eef2f5, #f4f7f9);
            background-size: 400% 400%;
            animation: gradient-animation 20s ease infinite;
            color: var(--text-primary);
        }

        /* --- HEADER & FOOTER --- */
        .main-header {
            background-color: var(--bg-card);
            color: var(--text-primary);
            padding: 1rem 0;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }
        .main-header h1 { margin: 0; font-size: 1.8em; font-weight: 600; letter-spacing: 1px; }
        .main-header a { color: var(--text-primary); text-decoration: none; }
        
        .main-footer {
            background-color: var(--bg-main);
            color: var(--text-muted);
            text-align: center;
            padding: 1.5rem 0;
            font-size: 0.9em;
            margin-top: 3rem;
            border-top: 1px solid var(--border-color);
        }

        /* --- TEMA BARU UNTUK ADMIN PANEL --- */
        .admin-sidebar {
            background-color: var(--bg-card);
            border-right: 1px solid var(--border-color);
        }
        .admin-sidebar .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all 0.2s ease-in-out;
        }
        .admin-sidebar .nav-link:hover {
            color: var(--accent-primary);
            background-color: #f7faff;
        }
        .admin-sidebar .nav-link.active {
            color: var(--accent-primary);
            border-left-color: var(--accent-primary);
            background-color: #f7faff;
        }
        .admin-sidebar .nav-link i { width: 20px; text-align: center; }

        .admin-content {
            padding: 2rem;
        }
        .admin-content h1, .admin-content h2 {
            font-weight: 700;
            color: var(--text-primary);
        }

        /* Tombol Admin */
        .btn-admin-primary {
            background-color: var(--accent-primary);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-admin-primary:hover {
            background-color: #2F6DE8;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(58, 125, 255, 0.2);
        }
        .btn-admin-secondary {
            background-color: #f0f3f6; color: var(--text-muted); border: none; padding: 0.6rem 1.2rem;
            font-weight: 600; border-radius: 0.5rem; transition: background-color 0.3s ease;
        }
        .btn-admin-secondary:hover { background-color: #e4e9ee; color: var(--text-primary); }

        /* Tabel Admin */
        .admin-table {
            background-color: var(--bg-card);
            border-collapse: collapse;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(138, 148, 166, 0.1);
        }
        .admin-table th, .admin-table td {
            padding: 1rem;
            vertical-align: middle;
        }
        .admin-table thead {
            background-color: #f9fafb;
            border-bottom: 1px solid var(--border-color);
        }
        .admin-table th {
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
        }
        .admin-table tbody tr:not(:last-child) {
            border-bottom: 1px solid var(--border-color);
        }

        /* Form Admin */
        .form-control, .form-select {
            background-color: #f9fafb;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            background-color: var(--bg-card);
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(58, 125, 255, 0.15);
        }
    </style>
    @stack('styles')
</head>
<body>
    @auth
        {{-- Jika sedang login, tampilkan layout dengan atau tanpa sidebar --}}
        @if(Request::is('admin*') || Request::is('login'))
             @yield('content')
        @else
             {{-- Layout untuk halaman publik --}}
            <header class="main-header">
                <h1><a href="/">CARIVILLAPUNCAK</a></h1>
            </header>
            @yield('content')
            <footer class="main-footer">
                <p>&copy; {{ date('Y') }} CARIVILLAPUNCAK. All rights reserved.</p>
            </footer>
        @endif
    @else
        {{-- Jika belum login, tampilkan layout publik biasa --}}
        <header class="main-header">
            <h1><a href="/">CARIVILLAPUNCAK</a></h1>
        </header>
        @yield('content')
        <footer class="main-footer">
            <p>&copy; {{ date('Y') }} CARIVILLAPUNCAK. All rights reserved.</p>
        </footer>
    @endauth

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>
</html>