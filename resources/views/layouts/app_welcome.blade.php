<!DOCTYPE html>
<html lang="id">
<head>
{{-- color
#0B402D
#105D41
#1FB47D
#23D091

#0B3F1A
#105C26
#1A973D
#23D155
--}}



  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="icon/takmir.png" />
  <title>Kencleng Masjid</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
  <style>
  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    background: url('img/masjid.jpg') repeat-y center 80%;
    background-size: cover;
    color: white;
  }

  body {
    display: flex;
    flex-direction: column;
    position: relative;
  }

  /* Overlay hitam seluruh halaman */
  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* sesuaikan kadar gelap */
    z-index: 0;
  }

  main {
    flex: 1;
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
  }

  .content {
    z-index: 2;
    text-align: center;
  }

  .navbar {
    background-color: rgba(255, 255, 255, 0.2) !important;
    backdrop-filter: blur(3 px);
    z-index: 3;
  }

  .footer {
    z-index: 1;
    position: relative;
    background-color: rgba(0, 0, 0, 0.3); /* tambahkan transparansi */
    color: white;
  }

  .btn-glass {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: white;
    backdrop-filter: blur(10px);
    border-radius: 10px;
    transition: background 0.3s ease, color 0.3s ease;
  }

  .btn-glass:hover {
    background: rgba(255, 255, 255, 0.35);
    color: #222;
  }

  .card-glass {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);
  border-radius: 1rem;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
  color: white;
}

.bs-table-color {
    color: #1A973D
}

.table-glass {
    background: rgba(255, 255, 255, 0); /* transparansi */
    color: white;
    bs-table-color: #1A973D
}


.table-glass th,
.table-glass td {
    background-color: rgba(255, 255, 255, 0); /* baris juga semi-transparan */
    border: none;
    color : #ffffffcc
}

.table-glass thead th {
    color:  #23D155;
    background-color: rgba(255, 255, 255, 0.1);
    font-weight: 600;

}

.table-glass tbody tr:hover {
    background-color: rgba(255, 255, 255, 0);
}


/* Tooltip utama */
    .apexcharts-tooltip {
        background-color: #105C26 !important;
        color: #fff !important;
        border: none !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    /* Isi tooltip (angka saldo) */
    .apexcharts-tooltip .apexcharts-tooltip-text {
        color: #fff !important;
    }

    /* Tooltip titik di garis grafik */
    .apexcharts-tooltip-series-group {
        background-color: #105C26 !important;
        color: #fff !important;
    }

    /* Tooltip tanggal di bawah (x-axis tooltip) */
    .apexcharts-xaxistooltip {
        background-color: #1A973D !important;
        color: #fff !important;
        border-radius: 4px;
        font-weight: bold;
    }

    .apexcharts-xaxistooltip:before,
    .apexcharts-xaxistooltip:after {
        border-bottom-color: #1A973D !important;
    }


    .apexcharts-tooltip-title {
        background-color: #105C26 !important; /* Hijau gelap */
        color: #fff !important;
        font-weight: 600;
        padding: 6px 10px;
        border-bottom: 1px solid #1A973D;
    }


    .btn-hijau {
  --bs-btn-color: #fff;
  --bs-btn-bg: #23D155;               /* Warna utama */
  --bs-btn-border-color: #1A973D;

  --bs-btn-hover-color: #fff;
  --bs-btn-hover-bg: #105C26;         /* Hover lebih gelap */
  --bs-btn-hover-border-color: #0B3F1A;

  --bs-btn-focus-shadow-rgb: 26,151,61; /* RGB dari #1A973D */

  --bs-btn-active-color: #fff;
  --bs-btn-active-bg: #0B3F1A;        /* Warna paling gelap saat ditekan */
  --bs-btn-active-border-color: #0B3F1A;
  --bs-btn-active-shadow: inset 0 3px 5px rgba(0,0,0,0.125);

  --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg: #1A973D;      /* Hijau terang saat disable */
  --bs-btn-disabled-border-color: #1A973D;

  color: var(--bs-btn-color);
  background-color: var(--bs-btn-bg);
  border-color: var(--bs-btn-border-color);
}

.btn-hijau:hover {
  color: var(--bs-btn-hover-color);
  background-color: var(--bs-btn-hover-bg);
  border-color: var(--bs-btn-hover-border-color);
}

.btn-hijau:focus,
.btn-hijau.focus {
  box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), 0.5);
}

.btn-hijau:active,
.btn-hijau.active,
.show > .btn-hijau.dropdown-toggle {
  color: var(--bs-btn-active-color);
  background-color: var(--bs-btn-active-bg);
  border-color: var(--bs-btn-active-border-color);
  box-shadow: var(--bs-btn-active-shadow);
}

.btn-hijau:disabled,
.btn-hijau.disabled {
  color: var(--bs-btn-disabled-color);
  background-color: var(--bs-btn-disabled-bg);
  border-color: var(--bs-btn-disabled-border-color);
}

    </style>

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-white" href="#">Kencleng Masjid</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-glass" href="{{ route('login') }}">Login</a>
          </li>
          {{-- <a class="sidebar-link" href={{route('logout-user')}}>
                        <i class="align-middle" data-feather="log-out"></i>
                        <span class="align-middle">Keluar</span>
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                        @csrf
                </form> --}}

        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten utama -->
  <main class="content">
    <div class="container-fluid px-5 py-3">
      @include('flash::message')
      @yield('content')
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <nav>
        <ul class="list-unstyled mb-0">
          {{-- <li><a href="#" class="text-white text-decoration-none">About Us</a></li> --}}
        </ul>
      </nav>
      <div class="copyright text-white">
        &copy; <span id="year"></span>, Designed by <strong><a href="#" class="text-decoration-none" style="color: #23D155;">Takmir Masjid Akbar</a></strong>
      </div>
    </div>
  </footer>


  @yield('js')


  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
