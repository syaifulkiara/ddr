<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="shortcut icon" href="{{ asset('templates/backend/img/icons/ico.png') }}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link href="{{ asset('templates/backend/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	@stack('styles')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('home') }}">
					<span class="align-middle"><img src="{{ asset('img/notification.png')}}" width="40px"> Website School</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item {{ request()->is('home') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('home') }}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ url('/') }}" target="_blank">
							<i class="align-middle" data-feather="globe"></i> <span class="align-middle">Go Web</span>
						</a>
					</li>

					<li class="sidebar-header">
						Jam Masuk & Pulang
					</li>

					<li class="sidebar-item {{ request()->is('bells') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('bells.index') }}">
							<i class="align-middle" data-feather="square"></i> <span class="align-middle">Pengaturan Jadwal</span>
						</a>
					</li>

					<li class="sidebar-item {{ request()->is('audios') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('audios.index') }}">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Audio</span>
						</a>
					</li>

					<li class="sidebar-header">
						Jadwal Mata Pelajaran
					</li>

					<li class="sidebar-item {{ request()->is('jadwals') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('jadwals.index') }}">
							<i class="align-middle" data-feather="square"></i> <span class="align-middle">Jadwal</span>
						</a>
					</li>

					<li class="sidebar-header">
						Pengaturan & Users
					</li>

					<li class="sidebar-item {{ request()->is('settings') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('settings.index') }}">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Pengaturan</span>
						</a>
					</li>
					<li class="sidebar-item {{ request()->is('users') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('users.index') }}">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
						</a>
					</li>
					<li class="sidebar-header">
						Sign Out
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Log out</span>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
					</li>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown"><i class="align-middle" data-feather="settings"></i></a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="{{ asset('templates/backend/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> 
								<span class="text-dark">{{ Auth::user()->name }}</span></a>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="user"></i> Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="align-middle" data-feather="log-in"></i> Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
								</div>
							</li>
						</ul>
					</div>
				</nav>

				<main class="content">
					<div class="container-fluid p-0">
						@include('sweetalert::alert')
						@yield('content')

					</div>
				</main>

				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-muted">
							<div class="col-6 text-start">
								<p class="mb-0">
									<a class="text-muted" href=""><strong>DRR-APP</strong></a> - <a class="text-muted" href="" target="_blank"><strong>Bel Sekolah Otomatis</strong></a> &copy;
								</p>
							</div>
							<div class="col-6 text-end">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a class="text-muted" href="" target="_blank">Support</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="" target="_blank">Help Center</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="" target="_blank">Privacy</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="" target="_blank">Terms</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>

		<script src="{{ asset('templates/backend/js/app.js') }}"></script>
      @stack('scripts')
	</body>

	</html>