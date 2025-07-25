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
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>{{ config('app.name', 'Laravel')}} :: Kencleng Masjid Akbar</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('adminkit/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">





</head>




<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">e-Kencleng</span>
        </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>


                <li class="sidebar-item @activeMenu('home')">
                    <a class="sidebar-link" href="{{ route('home') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-item @activeMenu('jamaah.*')">
                    <a class="sidebar-link" href="{{ route('jamaah.index') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Data Jamaah</span>
                    </a>
                </li>


                @if(auth()->user()->role=="admin"|| auth()->user()->role == 'remas')
                <li class="sidebar-item @activeMenu('pengambilan.*')">
                    <a class="sidebar-link" href="{{ route('pengambilan.index') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Pengambilan</span>
                    </a>
                </li>
                @endif


                @if(auth()->user()->role=="admin"|| auth()->user()->role == 'takmir')
                <li class="sidebar-item @activeMenu('pengeluaran.*')">
                    <a class="sidebar-link" href="{{ route('pengeluaran.index') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Pengeluaran</span>
                    </a>
                </li>
                @endif


                @if(auth()->user()->role=="admin")
                <li class="sidebar-item @activeMenu('userprofil.*')">
                    <a class="sidebar-link" href="{{ route('userprofil.index') }}">
                        <i class="align-middle" data-feather="user"></i>
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

		<div class="main">
		<nav class="navbar navbar-expand">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						{{-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('img/avatar.png')}}"
                                                class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li> --}}
						<li class="nav-item ">
							{{-- <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a> --}}

                             <a class="nav-link d-none d-sm-inline-block" href="#" >
                                <img src="{{asset('img/avatar.png')}}" class="avatar img-fluid rounded me-1"
                                    alt="{{ auth()->check() ? auth()->user()->name : 'Guest' }}" /> <span class="text-dark"><strong>
                                        {{ auth()->check() ? auth()->user()->name : 'Guest' }}
                                    </strong></span>
                            </a>
							{{-- <div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href=""><i class="align-middle me-1"
                                    data-feather="user"></i>Edit Profile</a>
								<div class="dropdown-divider"></div>

								<a class="dropdown-item" href="{{route('logout-user')}}">Log out</a>
							</div> --}}
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">

				<div class="container-fluid p-0">
                    @include('flash::message')

					@yield('content')
				</div>
			</main>

			<footer class="footer ">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">

							</p>
						</div>
						<div class="col-6 text-end">
                            &copy; <span id="year"></span>, Designed by <a href="#" ><strong>Takmir Masjid Akbar</strong></a>
							{{-- <ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul> --}}
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script>
    document.getElementById('year').textContent = new Date().getFullYear();
    </script>

	<script src="{{asset('adminkit/js/app.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        });

    </script>
    @yield('js')

</body>

</html>

