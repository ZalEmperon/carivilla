<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard Villa')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .bi {
      display: inline-block;
      width: 1rem;
      height: 1rem;
    }

    @media (min-width: 768px) {
      .sidebar .offcanvas-lg {
        position: -webkit-sticky;
        position: sticky;
        top: 48px;
      }
      .sidebar {
        height: 100vh;
      }

      .navbar-search {
        display: block;
      }
    }

    .sidebar .nav-link {
      font-size: .875rem;
    }

    .sidebar-heading {
      font-size: .75rem;
    }

    .navbar-brand {
      padding-top: .75rem;
      padding-bottom: .75rem;
      background-color: rgba(0, 0, 0, .25);
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .form-control {
      padding: .75rem 1rem;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: #0000001a;
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em #0000001a, inset 0 .125em .5em #00000026
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch
    }

    .bd-mode-toggle {
      z-index: 1500
    }

    .bd-mode-toggle .bi {
      width: 1em;
      height: 1em
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important
    }
  </style>
</head>

<body>
  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"> <a
      class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white fw-bold" href="/">CARIVILLA</a>
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list h5"></i>
        </button>
      </li>
    </ul>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="sidebar bg-dark col-md-3 col-lg-2 p-0">
        <div class="offcanvas-md offcanvas-end bg-dark" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h3 class="offcanvas-title fw-bold text-white" id="sidebarMenuLabel">Carivilla</h3> <button type="button"
              class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-2 overflow-y-auto">
            <hr class="mb-3 border-white">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active text-white" aria-current="page"
                  href="/admin-dashboard">
                  <i class="bi bi-card-list h5 me-1"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2 text-white" aria-current="page"
                  href="/admin-add">
                  <i class="bi bi-house-add-fill h5 me-1"></i>
                  Tambah Villa
                </a> </li>
              <hr class="my-3 border-white">
              <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="/admin-dashboard">
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                  </a>
                </li>
              </ul>
          </div>
        </div>
      </div>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
    </div>
  </div>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"
    class="astro-vvvwv3sm"></script>
  <script src="dashboard.js" class="astro-vvvwv3sm"></script>
</body>

</html>
