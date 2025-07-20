<!DOCTYPE html>
<html lang="en">



<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="icon/takmir.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title> {{$title ?? '' }} :: Kencleng MasjidAkbar</title>


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('adminkit/static/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
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

    .card-bto button {
        font-size: clamp(0.6rem, 1.6vw, 1rem);
        /* padding: clamp(0.3rem, 1.5vw, 0.5rem) clamp(0.7rem, 3vw, 1.2rem); */
        border-radius: clamp(5px, 1.2vw, 6px);
        transition: all 0.3s ease;
    }
    .card-bto a {
        font-size: clamp(0.6rem, 1.6vw, 1rem);
        /* padding: clamp(0.3rem, 1.5vw, 0.5rem) clamp(0.7rem, 3vw, 1.2rem); */
        border-radius: clamp(5px, 1.2vw, 6px);
        transition: all 0.3s ease;
    }

.card-bto2 a {
    font-size: clamp(0.6rem, 1.6vw, 1rem);
    padding: clamp(1.5px, 1vw, 0.3px) clamp(2px, 3vw, 1.2rem);
    padding-top: clamp(1.5px, 1vw, 0.3px);
    padding-right: clamp(2px, 3vw, 1.2rem);
    padding-bottom: clamp(1.5px, 1vw, 0.3px);
    padding-left: clamp(2px, 3vw, 1.2rem);
    border-radius: clamp(1px, 0.8vw, 6px);
    transition: all 0.3s ease;
}
.card-aksi button {
    --bs-btn-padding-y: clamp(1.5px, 1vw, 3.2px);
    --bs-btn-padding-x: clamp(3px, 2vw, 8px);
    --bs-btn-font-size: clamp(8px, 2vw, 12px);
    --bs-btn-border-radius: var(--bs-border-radius-sm);
}
.card-aksi a {
    --bs-btn-padding-y: clamp(1.5px, 1vw,3.2px);
    --bs-btn-padding-x: clamp(3px, 2vw, 8px);
    --bs-btn-font-size: clamp(8px, 2vw, 12px);
    --bs-btn-border-radius: var(--bs-border-radius-sm);
}


    .label-responsive {
        font-size: clamp(0.55rem, 1.4vw, 1rem);
        transition: font-size 0.3s ease;
    }

.table-hijau thead th {
    color:  #212529;
    background-color: #c7ffd7;
    font-weight: 600;
    font-size: clamp(11px, 2vw, 16px);
    line-height: 1.2;
}

.table-hijau tbody td {
    font-size: clamp(9px, 1.5vw, 16px);
}

.table-hijau tbody tr:hover {
    background-color: #c7ffd750;
}

.table-header-sticky th {
        position: sticky;
        top: 0;

        z-index: 10;
    }

    .h2, h2 {
        font-size: clamp(1.2rem, 1.5vw + 0.8rem, 1.8rem);

    }

    .form-label {
        margin-bottom: 0;
    }



    .label-responsive {
        font-size: clamp(0.7rem, 0.9vw, 2rem);
        transition: font-size 0.3s ease;
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

.card-wid {
    width: clamp(145px, 40vw, 274px);
    height: auto;
    padding: 0;
    margin: 0;
}

.card-wid h6 {
  font-size: clamp(0.6rem, 1vw, 0.9rem);
}

.card-wid h3 {
  font-size: clamp(0.8rem, 1.8vw, 1.6rem);
  font-weight: bold;
}

.card {
    box-shadow: 0 0 .875rem 0 rgba(33, 37, 41, .05);
    margin-bottom: 0;
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
/* Mobile responsive */
@media (max-width: 576px) {
  .sidebar {
    transform: translateX(-100%);
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #1e1e2f;
    z-index: 1051;
    overflow-y: auto;
  }

  .sidebar.show {
    transform: translateX(0);
  }

  .js-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1050;
  }
}


    </style>


</head>


<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
                <div class="text-center my-3">
                    <img src="{{ asset('icon/takmir.png') }}" alt="Logo Takmir" style="max-width: 80px;">
                    <div style="margin-top: 2px; font-weight: bold; color: aliceblue">e-Kencleng</div>
                </div>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>


                <li class="sidebar-item @activeMenu('home')">
                    <a class="sidebar-link" href="{{ route('home') }}">
                        <i class="align-middle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                        </svg>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                {{-- @if(auth()->user()->role=="admin"|| auth()->user()->role == 'remas'|| auth()->user()->role == 'takmir') --}}
                <li class="sidebar-item @activeMenu('jamaah.*')">
                    <a class="sidebar-link" href="{{ route('jamaah.index') }}">
                        <i class="align-middle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                        </svg>
                        <span class="align-middle">Data Jamaah</span>
                    </a>
                </li>
                {{-- @endif --}}

                @if(auth()->user()->role=="admin"|| auth()->user()->role == 'remas')
                <li class="sidebar-item @activeMenu('pengambilan.*')">
                    <a class="sidebar-link" href="{{ route('pengambilan.index') }}">
                        <i class="align-middle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z"/>
                        </svg>
                        <span class="align-middle">Pengambilan</span>
                    </a>
                </li>
                @endif


                @if(auth()->user()->role=="admin"|| auth()->user()->role == 'takmir')
                <li class="sidebar-item @activeMenu('pengeluaran.*')">
                    <a class="sidebar-link" href="{{ route('pengeluaran.index') }}">
                        <i class="align-middle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        <span class="align-middle">Pengeluaran</span>
                    </a>
                </li>
                @endif


                @if(auth()->user()->role=="admin")
                <li class="sidebar-item @activeMenu('userprofil.*')">
                    <a class="sidebar-link" href="{{ route('userprofil.index') }}">
                        <i class="align-middle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <span class="align-middle">Data User</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link" href={{route('logout-user')}}>
                        <i class="align-middle" data-feather="log-out"></i>
                        <span class="align-middle">Keluar</span>
                    </a>
                    <form id="logout-form" action="" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

			</div>
		</nav>

        {{-- Header--}}
		<div class="main">
			<nav class="navbar navbar-expand navbar-light" style="background-color: #1A973D; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">

                    {{-- <a href="#" class="sidebar-toggle js-sidebar-toggle js-open-sidebar d-inline-block d-sm-none">
                        <i class="hamburger align-self-center"></i>
                    </a> --}}
                    <button type="button" class="sidebar-toggle js-open-sidebar d-inline-block d-sm-none" style="background: transparent; border: none;">
                        <i class="hamburger align-self-center"></i>
                    </button>

                    <button type="button" class="sidebar-toggle js-sidebar-toggle d-none d-sm-inline-block" style="background: transparent; border: none;">
                        <i class="hamburger align-self-center"></i>
                    </button>





				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
							    {{-- <a class="nav-icon d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a> --}}
                                <a class="nav-link fw-bold fs-5"  style="color: #ffffff"  href="#" data-bs-toggle="dropdown">
                                    <img src="{{ asset('icon/avatar.jpg') }}" class="avatar img-fluid rounded me-2" alt="{{ auth()->user()->nama }}" style="height: 32px; width: 32px;" />
                                    {{ auth()->user()->nama }}
                                </a>

						</li>
					</ul>
				</div>
			</nav>


            {{-- Main --}}
			<main class="content" style="background-color: #eaeaea14;" >

				<div class="container-fluid p-0">
                    @include('flash::message')

					@yield('content')
				</div>
			</main>

                {{-- Footer --}}
			<footer class="footer"style="box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.2);">
				<div class="container-fluid">
					<div class="row text-muted ">
						<div class="col-6 text-start">
							<p class="mb-0">
							</p>
						</div>
						<div class="copyright">
                            &copy; <span id="year"></span>, Designed by <a href="#" ><strong>Takmir Masjid Akbar</strong></a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script>
    document.getElementById('year').textContent = new Date().getFullYear();
    </script>

	<script src="{{asset('adminkit/static/js/app.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        });
    </script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // const toggleBtn = document.querySelector('.js-sidebar-toggle');
    const openBtn = document.querySelector(".js-open-sidebar");
    // const closeBtn = document.querySelector(".js-close-sidebar");
    const sidebar = document.querySelector(".sidebar");
    // const sidebar = document.querySelector('.js-sidebar');


    openBtn.addEventListener('click', () => {
        sidebar.classList.add('collapsed');
    });

    const showSidebar = () => {
        sidebar.classList.add("show");

        if (!document.querySelector(".js-overlay")) {
            const overlay = document.createElement("div");
            overlay.classList.add("js-overlay");

            overlay.addEventListener("click", () => {
                hideSidebar();
            });

            document.body.appendChild(overlay);
        }
    };

    const hideSidebar = () => {
        sidebar.classList.remove("show");
        const overlay = document.querySelector(".js-overlay");
        if (overlay) overlay.remove();

    };

    // Tombol buka sidebar
    openBtn?.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        showSidebar();
    });

    // Tombol tutup sidebar
    // closeBtn?.addEventListener("click", (e) => {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     hideSidebar();
    // });

    // Mencegah klik dalam sidebar menutup overlay
    sidebar.addEventListener("click", (e) => {
        e.stopPropagation();
    });
});


// toggleBtn?.addEventListener("click", (e) => {
//     e.preventDefault(); // <- ini WAJIB kalau tetap pakai <a>
//     if (sidebar.classList.contains("show")) {
//         hideSidebar();
//     } else {
//         showSidebar();
//     }
// });


</script>

    @yield('js')

</body>

</html>
