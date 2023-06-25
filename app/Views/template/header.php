<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Sistem Informasi Penggajian DSI Group">
	<meta name="keywords" content="Sistem Informasi Penggajian DSI Group">
	<meta name="author" content="Jihad">
	<title></title>
	<link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/logo/63-512.png">
	<link href="/assets/css/fonts/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
		rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/forms/toggle/switchery.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/plugins/forms/switch.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/core/colors/palette-switch.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/charts/chartist.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/charts/chartist-plugin-tooltip.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/tables/datatable/datatables.min.css">

	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/pickers/daterange/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/pickers/pickadate/default.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/pickers/pickadate/default.date.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/pickers/pickadate/default.time.css">

	<link rel="stylesheet" type="text/css" href="/assets/vendors/css/forms/selects/select2.min.css">

	<link rel="stylesheet" href="/assets/css/plugins/easy-autocomplete/easy-autocomplete.min.css">
	<link rel="stylesheet" href="/assets/css/plugins/easy-autocomplete/easy-autocomplete.themes.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/line-awesome/1.1/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/feather/style.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/simple-line-icons/style.min.css">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/core/menu/menu-types/vertical-menu.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/chat-application.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/pages/dashboard-analytics.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/plugins/pickers/daterange/daterange.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/plugins/animate/animate.min.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<!-- END: Custom CSS-->

	<!-- datepicker css -->
	<link href="/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
	data-color="bg-gradient-x-purple-blue" data-col="2-columns">

	<!-- BEGIN: Header-->
	<nav
		class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light d-print-none">
		<div class="navbar-wrapper">
			<div class="navbar-container content">
				<div class="collapse navbar-collapse show" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item mobile-menu d-md-none mr-auto"><a
								class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
									class="ft-menu font-large-1"></i></a></li>
						<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
								href="#"><i class="ft-menu"></i></a></li>
						<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
									class="ficon ft-maximize"></i></a></li>
					</ul>
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-user nav-item">
							<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
								<span class="avatar avatar-online"><img
										src="<?= base_url('user/avatar/'.$user->avatar) ?>"
										alt="avatar"></span><?= $user->fullname?></a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="arrow_box_right">
									<a class="dropdown-item" href="<?= base_url('profil/'.session()->get('user_id'))?>">
										Edit Profil</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/logout"><i class="ft-power"></i>
										Logout</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- END: Header-->


	<!-- BEGIN: Main Menu-->
	<div class="main-menu menu-fixed menu-light menu-accordion d-print-none menu-shadow " data-scroll-to-active="true"
		data-img="/assets/images/backgrounds/02.jpg">
		<div class="navbar-header">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url('dashboard') ?>">
						<img class="brand-logo" alt="Chameleon admin logo" src="/assets/images/logo/63-512.png" />
						<h3 class="brand-text">Website Guru</h3>
					</a></li>
				<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
			</ul>
		</div>
		<div class="navigation-background"></div>
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<?php if ($_SESSION['role'] == 1) : ?>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'dashboard') echo 'active' ?>"><a
						href="<?= base_url('/dashboard') ?>"><i class="ft-home"></i><span class="menu-title"
							data-i18n="">Dashboard</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'user-management') echo 'active' ?>"><a
						href="<?= base_url('/user-management') ?>"><i class="fa-solid fa-users"></i><span
							class="menu-title" data-i18n="">User Management</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'absensi') echo 'active' ?>"><a
						href="<?= base_url('/absensi') ?>"><i class="fa-solid fa-book"></i><span class="menu-title"
							data-i18n="">Absensi Pengajar</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'gaji') echo 'active' ?>"><a
						href="<?= base_url('/gaji') ?>"><i class="fa-solid fa-money-bill"></i><span class="menu-title"
							data-i18n="">Data Gaji Pengajar</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'mapel') echo 'active' ?>"><a
						href="<?= base_url('/mapel') ?>"><i class="fa-solid fa-book-open"></i><span class="menu-title"
							data-i18n="">Mata Pelajaran</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'kelas') echo 'active' ?>"><a
						href="<?= base_url('/kelas') ?>"><i class="fa-solid fa-graduation-cap"></i><span
							class="menu-title" data-i18n="">Kelas</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'ajar') echo 'active' ?>"><a
						href="<?= base_url('/ajar') ?>"><i class="fa-solid fa-chalkboard-user"></i><span
							class="menu-title" data-i18n="">Data Ajar</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'penggajian') echo 'active' ?>"><a
						href="<?= base_url('/ajar') ?>"><i class="fa-solid fa-money-check-dollar"></i></i><span
							class="menu-title" data-i18n="">Penggajian</span></a>
				</li>

				<?php elseif ($_SESSION['role'] == 2) : ?>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'dashboard') echo 'active' ?>"><a
						href="<?= base_url('/dashboard') ?>"><i class="ft-home"></i><span class="menu-title"
							data-i18n="">Dashboard</span></a>
				</li>
				<li class=" nav-item <?php if ($isUri->getSegment(1) == 'jadwal') echo 'active' ?>"><a
						href="<?= base_url('/jadwal') ?>"><i class="fa-solid fa-clipboard-list"></i><span
							class="menu-title" data-i18n="">Jadwal Mengajar</span></a>
				</li>
				<?php endif ?>

			</ul>
		</div>
	</div>
	<!-- END: Main Menu-->

	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-wrapper-before"></div>
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- Revenue, Hit Rate & Deals -->