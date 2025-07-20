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
  <title>e-Kencleng</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
  <style>
  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    /* background: url('img/masjid.jpg') repeat-y center 80%; */
    background: url('img/masjid.jpg') repeat-y center center;
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

  .logo-welcome {
        max-width: 120px;
    }

  .navbar {
    background-color: rgba(255, 255, 255, 0.2) !important;
    backdrop-filter: blur(3px);
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

    /* Responsive text & padding */
    font-size: clamp(0.6rem, 2vw, 1rem);
    padding: clamp(0.4rem, 1vw, 0.5rem) clamp(0.5rem, 1.2vw, 0.8rem);

    transition: background 0.3s ease, color 0.3s ease, font-size 0.3s ease, padding 0.3s ease;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, 0.35);
    color: #222;
}


  .btn-glass:hover {
    background: rgba(255, 255, 255, 0.35);
    color: #222;
  }

.card-wid {
    width: clamp(145px, 40vw, 274px);
}

.card-glass {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);
  border-radius: 1rem;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
  color: white;
  padding: clamp(0px, 0.4vw, 0.8rem);
  transition: all 0.3s ease;
}

.card-glass h6 {
  font-size: clamp(0.6rem, 1vw, 0.9rem);
}

.card-glass h3 {
  font-size: clamp(0.8rem, 1.8vw, 1.4rem);
  font-weight: bold;
}


.gap-responsive {
  gap: clamp(0.5rem, 0.5vw, 0.5rem);
  row-gap: clamp(0.5rem, 0.5vw, 0.8rem);
  column-gap: clamp(0.5rem, 0.5vw, 0.5rem);
}


.bs-table-color {
    color: #1A973D
}

.table-glass {
    background: rgba(255, 255, 255, 0); /* transparansi */
    color: white;
    bs-table-color: #1A973D;

}


.table-glass th,
.table-glass td {
    background-color: rgba(255, 255, 255, 0); /* baris juga semi-transparan */
    border: none;
    color : #ffffffcc
}

.table-glass thead tr th {
    color:  #ffffff;
    background-color: #23D155;
    font-weight: 600;
    font-size: clamp(11px, 2vw, 16px);
    line-height: 1.2;
}


.table-glass tbody td {
    font-size: clamp(9px, 1.5vw, 16px);
}

.table-glass tbody tr:hover {
    background-color: rgba(255, 255, 255, 0);
}

.table-header-sticky th {
        position: sticky;
        top: 0;
        z-index: 10;
    }


    .card-header {
        padding-top: clamp(0.2rem, 2vw, 0.5rem);
        padding-right: clamp(1rem, 2vw, 1rem);
        padding-bottom: clamp(0.2rem, 2vw, 0.5rem);
        padding-left: clamp(1rem, 2vw, 1rem);

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
  font-size: clamp(0.6rem, 1.6vw, 1rem);
  /* padding: clamp(0.4rem, 0.8vw, 0.6rem) clamp(1rem, 2vw, 1.5rem); */
  color: #fff;
  background-color: #23D155;
  border: 1px solid #1A973D;
  border-radius: clamp(5px, 1.2vw, 6px);
  transition: all 0.3s ease;
}

.btn-hijau:hover {
  background-color: #105C26;
  border-color: #0B3F1A;
  color: #fff;
}

.btn-hijau:focus {
  box-shadow: 0 0 0 0.25rem rgba(26,151,61,0.5);
  outline: none;
}

.btn-hijau:active {
  background-color: #0B3F1A;
  border-color: #0B3F1A;
  box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);
}

.btn-hijau:disabled {
  background-color: #1A973D;
  border-color: #1A973D;
  color: #fff;
  opacity: 0.7;
}


    .desc-welcome {
        color: #ffffffbf;
        font-size: clamp(0.6rem, 1vw + 0.5rem, 1rem);
        line-height: 1.3;
    }
    .h2, h2 {
        font-size: clamp(1rem, 1.5vw + 0.8rem, 1.8rem);
    }

    .select2-hijau {
        font-size: clamp(0.6rem, 1.5vw, 1rem);
        font-weight: 500;
        /* padding: clamp(0.3rem, 1vw, 0.6rem) clamp(0.5rem, 2vw, 1rem); */
        /* padding: clamp(0.35rem, 1vw, 0.rem) clamp(0.8rem, 1vw, 1.2rem); */
        transition: font-size 0.3s ease, padding 0.3s ease;
        background-position: right clamp(4px, 1vw, 10px) center;
        clamp(14px, 1vw, 12px) clamp(9px, 1vw, 12px);
        background-repeat: no-repeat;
        padding-right: clamp(1.5rem, 3vw, 2.5rem);
        transition: background-size 0.3s ease, background-position 0.3s ease;
    }


    .select2-hijau option {
        font-size: clamp(0.75rem, 1.5vw, 1rem);
    }

    .label-responsive {
        font-size: clamp(0.55rem, 1.4vw, 1rem);
        transition: font-size 0.3s ease;
    }
    .card-bto button {
        font-size: clamp(0.6rem, 1.6vw, 1rem);
        /* padding: clamp(0.3rem, 1.5vw, 0.5rem) clamp(0.7rem, 3vw, 1.2rem); */
        border-radius: clamp(5px, 1.2vw, 6px);
        transition: all 0.3s ease;
    }
    .px-responsive {
        padding-left: clamp(0rem, 1.5vw, 3rem);
        padding-right: clamp(0rem, 1.5vw, 3rem);
    }
    .py-responsive {
        padding-top: clamp(0rem, 0.6vw, 3rem);
        padding-bottom: clamp(0rem, 0.6vw, 3rem);
    }



@media (max-width: 576px) {
    .content {
        padding: 1rem !important;
    }
    .copyright {
        text-align: center;
        font-size: 0.57rem;
    }
}

</style>

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-white" href="#">e-Kencleng</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="btn btn-glass mt-2 mt-lg-0 ms-lg-2" href="{{ route('login') }}">Login</a>
            </li>
            {{-- <a class="sidebar-link" href={{route('logout-user')}}>
                        <i class="align-middle" data-feather="log-out"></i>
                        <span class="align-middle">Keluar</span>
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                        @csrf
                </form> --}}
            </ul>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten utama -->
    <main class="content">
    <div class="container px-responsive py-3">
        @include('flash::message')
        @yield('content')
    </div>
    </main>


  <!-- Footer -->
  <footer class="footer py-3">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
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
