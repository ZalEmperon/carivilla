<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CARIVILLAPUNCAK')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; }
        .main-header { background-color: #0056b3; color: #fff; padding: 1.5rem 0; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .main-header h1 { margin: 0; font-size: 2.8em; font-weight: bold; }
        .main-header a { color: #fff; text-decoration: none; }
        .main-footer { background-color: #333; color: #fff; text-align: center; padding: 25px 0; font-size: 0.95em; box-shadow: 0 -4px 8px rgba(0,0,0,0.1); margin-top: 50px; }

        /* General buttons */
        .button { display: block; width: 100%; padding: 12px 15px; text-align: center; border-radius: 8px; text-decoration: none; margin-top: 10px; font-weight: bold; transition: background-color 0.3s ease, transform 0.1s ease; font-size: 1.05em; }
        .button:active { transform: translateY(1px); }
        .primary-button { background-color: #007bff; color: #fff; border: none; }
        .primary-button:hover { background-color: #0056b3; color: #fff; }
        .whatsapp-button { background-color: #25d366; color: #fff; border: none; }
        .whatsapp-button:hover { background-color: #1da851; color: #fff; }
        .danger-button { background-color: #dc3545; color: #fff; border: none; }
        .danger-button:hover { background-color: #c82333; color: #fff; }
        .success-button { background-color: #28a745; color: #fff; border: none; }
        .success-button:hover { background-color: #218838; color: #fff; }
        .info-button { background-color: #17a2b8; color: #fff; border: none; }
        .info-button:hover { background-color: #138496; color: #fff; }

        /* Specific styles for villa items */
        .villa-item { background-color: #fff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column; }
        .villa-item:hover { transform: translateY(-7px); box-shadow: 0 8px 16px rgba(0,0,0,0.2); }
        .villa-image { width: 100%; height: 250px; object-fit: cover; display: block; border-bottom: 1px solid #eee; }
        .villa-info { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .villa-info h2 { margin-top: 0; color: #007bff; font-size: 1.8em; margin-bottom: 10px; }
        .villa-info .location { font-size: 1em; color: #666; margin-bottom: 8px; }
        .villa-info .price { font-size: 1.2em; font-weight: bold; color: #d9534f; margin-bottom: 15px; }
        .villa-info .price-value { color: #000; }

        /* Admin specific styles */
        .admin-sidebar { background-color: #343a40; color: #fff; padding: 20px; min-height: calc(100vh - 100px); }
        .admin-sidebar .nav-link { color: #adb5bd; padding: 10px 15px; border-radius: 5px; transition: background-color 0.2s; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { background-color: #495057; color: #fff; }
        .admin-content { padding: 20px; }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-header h1 { font-size: 2em; }
            .villa-image { height: 200px; }
            .villa-info h2 { font-size: 1.5em; }
            .button { padding: 10px 12px; font-size: 0.95em; }
            .admin-sidebar { min-height: auto; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="main-header">
        <div class="container">
            <h1><a href="/">CARIVILLAPUNCAK</a></h1>
        </div>
    </header>

    @yield('content')

    <footer class="main-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} CARIVILLAPUNCAK. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>
</html>