<!DOCTYPE html>
<html lang="en-US" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- ===============================================-->
		<!--    Document Title-->
		<!-- ===============================================-->
		<title>{{ getSetting("APP_NAME_SHORT")  }} | @yield('title')</title>
		<!-- ===============================================-->
		<!--    Favicons-->
		<!-- ===============================================-->
		<link rel="apple-touch-icon" sizes="180x180" href="{!! url('/') !!}/assets/jsb/logo2_orange.png">
		<link rel="icon" type="image/png" sizes="32x32" href="{!! url('/') !!}/assets/jsb/logo2_orange.png">
		<link rel="icon" type="image/png" sizes="16x16" href="{!! url('/') !!}/assets/jsb/logo2_orange.png">
		<link rel="shortcut icon" type="image/x-icon" href="{!! url('/') !!}/assets/jsb/logo2_orange.png">
		<link rel="manifest" href="{!! url('/') !!}/assets/jsb/img/favicons/manifest.json">
		<meta name="msapplication-TileImage" content="{!! url('/') !!}/assets/jsb/logo2_orange.png">
		<meta name="theme-color" content="#ffffff">
		<script src="{!! url('/') !!}/assets/jsb/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/simplebar/simplebar.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/js/config.js"></script>
		<script type="text/javascript" src="{!! url('/') !!}/assets/backend/js/core/libraries/jquery.min.js"></script>
		<!-- ===============================================-->
		<!--    Stylesheets-->
		<!-- ===============================================-->
		<link href="{!! url('/') !!}/assets/jsb/vendors/dropzone/dropzone.min.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
		<link href="{!! url('/') !!}/assets/jsb/vendors/simplebar/simplebar.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
		<link href="{!! url('/') !!}/assets/jsb/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
		<link href="{!! url('/') !!}/assets/jsb/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
		<link href="{!! url('/') !!}/assets/jsb/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
		<link href="{!! url('/') !!}/assets/jsb/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
		<link href="{!! url('/') !!}/assets/jsb/vendors/choices/choices.min.css" type="text/css" rel="stylesheet" id="user-style-default">

		<script>
			var phoenixIsRTL = window.config.config.phoenixIsRTL;
			if (phoenixIsRTL) {
			    var linkDefault = document.getElementById('style-default');
			    var userLinkDefault = document.getElementById('user-style-default');
			    linkDefault.setAttribute('disabled', true);
			    userLinkDefault.setAttribute('disabled', true);
			    document.querySelector('html').setAttribute('dir', 'rtl');
			} else {
			    var linkRTL = document.getElementById('style-rtl');
			    var userLinkRTL = document.getElementById('user-style-rtl');
			    linkRTL.setAttribute('disabled', true);
			    userLinkRTL.setAttribute('disabled', true);
			}
		</script>
		<link href="{!! url('/') !!}/assets/jsb/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
		<link href="{!! url('/') !!}/assets/jsb/vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
	</head>
	<body>
		<!-- ===============================================-->
		<!--    Main Content-->
		<!-- ===============================================-->
		<main class="main" id="top">
			<!-- ============================================-->
			<!-- <section> begin ============================-->
			<section class="py-0">
				<div class="container-small">
					<div class="ecommerce-topbar">
						<nav class="navbar navbar-expand-lg navbar-light px-0">
							<div class="row gx-0 gy-2 w-100 flex-between-center">
								<div class="col-auto">
									<a class="text-decoration-none" href="../../../index.html">
										<div class="d-flex align-items-center">
											<img src="{!! url('/') !!}/assets/jsb/logo.png" alt="logo" width="27" />
											<p class="logo-text ms-2">{{ getSetting("APP_NAME_SHORT") }}</p>
										</div>
									</a>
								</div>
								<div class="col-auto order-md-1">
									<ul class="navbar-nav navbar-nav-icons flex-row me-n2">
										<li class="nav-item d-flex align-items-center">
											<div class="theme-control-toggle fa-icon-wait px-2">
												<input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
												<label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
												<label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
											</div>
										</li>
										@if(isset($USER))
										<li class="nav-item"><a class="nav-link px-2 icon-indicator icon-indicator-primary" href="#" role="button"><span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span><span class="icon-indicator-number">0</span></a></li>
										
										<!-- <li class="nav-item dropdown">
											<a class="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger" id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span></a>
											<div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret mt-2" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
												<div class="card position-relative border-0">
													<div class="card-header p-2">
														<div class="d-flex justify-content-between">
															<h5 class="text-black mb-0">Notificatons</h5>
															<button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
														</div>
													</div>
													<div class="card-body p-0">
														<div class="scrollbar-overlay" style="height: 27rem;">
															<div class="border-300">
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/30.webp" alt="" />
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Jessie Samson</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3">
																				<div class="avatar-name rounded-circle"><span>J</span></div>
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Jane Foster</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../../assets/img/team/40x40/avatar.webp" alt="" />
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Jessie Samson</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="border-300">
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/57.webp" alt="" />
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Kiera Anderson</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/59.webp" alt="" />
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Herman Carter</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
																<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
																	<div class="d-flex align-items-center justify-content-between position-relative">
																		<div class="d-flex">
																			<div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/58.webp" alt="" />
																			</div>
																			<div class="flex-1 me-sm-3">
																				<h4 class="fs--1 text-black">Benjamin Button</h4>
																				<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
																				<p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
																			</div>
																		</div>
																		<div class="font-sans-serif d-none d-sm-block">
																			<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
																			<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="card-footer p-0 border-top border-0">
														<div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="../../../pages/notifications.html">Notification history</a></div>
													</div>
												</div>
											</div>
										</li> -->
										
										<li class="nav-item dropdown">
											<a class="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="user" style="height:20px;width:20px;"></span></a>
											<div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300 mt-2" aria-labelledby="navbarDropdownUser">
												<div class="card position-relative border-0">
													<div class="card-body p-0">
														<div class="text-center pt-4 pb-3">
															<div class="avatar avatar-xl ">
																<img class="rounded-circle " src="../../../assets/img/team/72x72/57.webp" alt="" />
															</div>
															<h6 class="mt-2 text-black">
																{{ $USER->{"USER_NAMA"} }}
															</h6>
														</div>
														<!-- <div class="mb-3 mx-3">
															<input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
														</div> -->
													</div>
													<!-- <div class="overflow-auto scrollbar" style="height: 10rem;">
														<ul class="nav d-flex flex-column mb-2 pb-1">
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
															<li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
														</ul>
													</div> -->
													<div class="card-footer p-0 border-top">
														<ul class="nav d-flex flex-column my-3">
															<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
														</ul>
														<hr />
														<div class="px-3 my-2"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{!! url('/') !!}/auth/logout"> <span class="me-2" data-feather="log-out"> </span>LOG OUT</a></div>
														<!-- <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div> -->
													</div>
												</div>
											</div>
										</li>
										@endif
									</ul>
								</div>
								<!-- <div class="col-12 col-md-6">
									<div class="search-box ecommerce-search-box w-100">
										<form class="position-relative" data-bs-toggle="search" data-bs-display="static">
											<input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
											<span class="fas fa-search search-box-icon"></span>
										</form>
									</div>
								</div> -->
							</div>
						</nav>
					</div>
				</div>
				<!-- end of .container-->
			</section>
			<!-- <section> close ============================-->
			<!-- ============================================-->
			<nav class="ecommerce-navbar navbar-expand navbar-light bg-white justify-content-between">
				<div class="container-small d-flex flex-between-center" data-navbar="data-navbar">
					<div class="dropdown">
						<button class="btn text-900 ps-0 pe-5 py-4 text-nowrap dropdown-toggle dropdown-caret-none" data-category-btn="data-category-btn" data-bs-toggle="dropdown">
							<!-- <span class="fas fa-bars me-2"></span>Category -->
						</button>
						<div class="dropdown-menu border py-0 category-dropdown-menu">
							<div class="card border-0 scrollbar" style="max-height: 657px;">
								<div class="card-body p-6 pb-3">
									<div class="row gx-7 gy-5 mb-5">
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="pocket" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Collectibles &amp; Art</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Collectibles</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Antiques</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Sports memorabilia </a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Art</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="home" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Home &amp; Gardan</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Yard, Garden &amp; Outdoor</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Crafts</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Home Improvement</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Pet Supplies</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="globe" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Sporting Goods</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Outdoor Sports</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Team Sports</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Exercise &amp; Fitness</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Golf</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="monitor" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Electronics</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Computers &amp; Tablets</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Camera &amp; Photo</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">TV, Audio &amp; Surveillance</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Cell Ohone &amp; Accessories</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="truck" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Auto Parts &amp; Accessories</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">GPS &amp; Security Devices</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Rader &amp; Laser Detectors</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Care &amp; Detailing</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Scooter Parts &amp; Accessories</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="codesandbox" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Toys &amp; Hobbies</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Radio Control</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Kids Toys</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Action Figures</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Dolls &amp; Bears</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="watch" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Fashion</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Women</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Men</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Jewelry &amp; Watches</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Shoes</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="music" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Musical Instruments &amp; Gear</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Guitar</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Pro Audio Equipment</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">String</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Stage Lighting &amp; Effects</a>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4">
											<div class="d-flex align-items-center mb-3">
												<span class="text-primary me-2" data-feather="grid" style="stroke-width:3;"></span>
												<h6 class="text-1000 mb-0 text-nowrap">Other Categories</h6>
											</div>
											<div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Video Games &amp; Consoles</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Health &amp; Beauty</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Baby</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Business &amp; Industrial</a>
											</div>
										</div>
									</div>
									<div class="text-center border-top pt-3"><a class="fw-bold" href="#!">See all Categories<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a></div>
								</div>
							</div>
						</div>
					</div>
					<ul class="navbar-nav justify-content-end align-items-center">
						@if(isset($USER))
						@if($USER->{"USER_ROLE"} == "USER_ROLE_SUPERADMIN")
							<li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="{{ url('/') }}/master/wilayah">Wilayah</a></li>
							<li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="{{ url('/') }}/master/sponsor">Sponsor</a></li>
							<li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="{{ url('/') }}/keuangan">Accounting</a></li>
						@endif
						<li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-0 active" href="{{ url('/') }}/permohonan">Permohonan</a></li>
						<li class="nav-item dropdown" data-nav-item="data-nav-item" data-more-item="data-more-item">
							<a class="nav-link dropdown-toggle dropdown-caret-none fw-bold pe-0" href="javascript: void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window" data-bs-reference="parent">
							More<span class="fas fa-angle-down ms-2"></span></a>
							<div class="dropdown-menu dropdown-menu-end category-list" aria-labelledby="navbarDropdown" data-category-list="data-category-list"></div>
						</li>
						@endif
					</ul>
				</div>
			</nav>
			<!-- ============================================-->
			<!-- <section> begin ============================-->
			<section class="pt-5 pb-9">
				@yield('content')
				<!-- end of .container-->
			</section>
			<!-- <section> close ============================-->
			<!-- ============================================-->
			<div class="support-chat-container">
				<div class="container-fluid support-chat"></div>
				<a href="https://wa.me/{{ getSetting('CUSTOMER_SUPPORT_WA') }}" target="_blank" class="btn p-0 border border-200 btn-support-chat" style="width: 140px;">
					<img src="{!! url('/') !!}/assets/jsb/whatsapp.png" width="24" height="24">&nbsp;&nbsp;<span class="fs-0 btn-text text-primary_ text-nowrap" style="color: #29a71a;">Support</span><!--span class="fa-solid fa-circle text-success fs--1 ms-2"></span><span class="fa-solid fa-chevron-down text-primary fs-1"></span-->
				</a>
			</div>
			<!-- ============================================-->
			<!-- <section> begin ============================-->
			<section class="bg-100 dark__bg-1100 py-9">
				<div class="container-small">
					<div class="row justify-content-between gy-4">
						<div class="col-12 col-lg-4">
							<div class="d-flex align-items-center mb-3">
								<img src="{!! url('/') !!}/assets/jsb/logo.png" alt="phoenix" width="27" />
								<p class="logo-text ms-2">{{ getSetting("APP_NAME") }}</p>
							</div>
							<p class="text-700 mb-1 fw-semi-bold lh-sm fs--1">Empowering global citizens with seamless visa and legal solutions. We make your journey to a new country simple, stress-free, and successful.</p>
						</div>
						<div class="col-6 col-md-auto">
							<h5 class="fw-bolder mb-3">About</h5>
							<div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Careers</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Affiliate Program</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Privacy Policy</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Terms & Conditions</a></div>
						</div>
						<div class="col-6 col-md-auto">
							<h5 class="fw-bolder mb-3">Stay Connected</h5>
							<div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Blogs</a><a class="mb-1 fw-semi-bold fs--1 d-flex" href="#!"><span class="fab fa-facebook-square text-primary me-2 fs-0"></span><span class="text-800">Facebook</span></a><a class="mb-1 fw-semi-bold fs--1 d-flex" href="#!"><span class="fab fa-twitter-square text-info me-2 fs-0"></span><span class="text-800">Twitter</span></a></div>
						</div>
						<!-- <div class="col-6 col-md-auto">
							<h5 class="fw-bolder mb-3">Customer Service</h5>
							<div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Help Desk</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Support, 24/7</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Community of Phoenix</a></div>
						</div>
						<div class="col-6 col-md-auto">
							<h5 class="fw-bolder mb-3">Payment Method</h5>
							<div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Cash on Delivery</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Online Payment</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">PayPal</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Installment</a></div>
						</div> -->
					</div>
				</div>
				<!-- end of .container-->
			</section>
			<!-- <section> close ============================-->
			<!-- ============================================-->
			<footer class="footer position-relative">
				<div class="row g-0 justify-content-between align-items-center h-100">
					<div class="col-12 col-sm-auto text-center">
						<p class="mb-0 mt-2 mt-sm-0 text-900">All right reserved<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />{{ date("Y") }} &copy;<a class="mx-1" href="https://bensase.com">Bensae</a></p>
					</div>
					<div class="col-12 col-sm-auto text-center">
						<p class="mb-0 text-600">version 1.0</p>
					</div>
				</div>
			</footer>
		</main>
		<!-- ===============================================-->
		<!--    End of Main Content-->
		<!-- ===============================================-->
		<!-- ===============================================-->
		<!--    JavaScripts-->
		<!-- ===============================================-->
		<script src="{!! url('/') !!}/assets/jsb/vendors/popper/popper.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/bootstrap/bootstrap.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/anchorjs/anchor.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/is/is.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/fontawesome/all.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/lodash/lodash.min.js"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/feather-icons/feather.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/dayjs/dayjs.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/swiper/swiper-bundle.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/dropzone/dropzone.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/list.js/list.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/vendors/choices/choices.min.js"></script>
		<script src="{!! url('/') !!}/assets/jsb/js/phoenix.js"></script>
		<!-- Toastr -->
		<script src="{!! url('/') !!}/assets/backend/js/toastr/toastr.js"></script>
		<link type="text/css" rel="stylesheet" href="{!! url('/') !!}/assets/backend/js/toastr/toastr.css" />
		<script type="text/javascript">
			toastr.options = {
			    "closeButton": true,
			    "debug": false,
			    "positionClass": "toast-top-full-width",
			    "onclick": null,
			    "showDuration": "15000",
			    "hideDuration": "15000",
			    "timeOut": "15000",
			    "extendedTimeOut": "15000",
			    "showEasing": "swing",
			    "hideEasing": "linear",
			    "showMethod": "slideDown",
			    "hideMethod": "slideUp"
			}
		</script>
		<!-- AES -->
		<script type="text/javascript">
			var CryptoJS = CryptoJS || function(u, p) {
			    var d = {},
			        l = d.lib = {},
			        s = function() {},
			        t = l.Base = {
			            extend: function(a) {
			                s.prototype = this;
			                var c = new s;
			                a && c.mixIn(a);
			                c.hasOwnProperty("init") || (c.init = function() {
			                    c.$super.init.apply(this, arguments)
			                });
			                c.init.prototype = c;
			                c.$super = this;
			                return c
			            },
			            create: function() {
			                var a = this.extend();
			                a.init.apply(a, arguments);
			                return a
			            },
			            init: function() {},
			            mixIn: function(a) {
			                for (var c in a) a.hasOwnProperty(c) && (this[c] = a[c]);
			                a.hasOwnProperty("toString") && (this.toString = a.toString)
			            },
			            clone: function() {
			                return this.init.prototype.extend(this)
			            }
			        },
			        r = l.WordArray = t.extend({
			            init: function(a, c) {
			                a = this.words = a || [];
			                this.sigBytes = c != p ? c : 4 * a.length
			            },
			            toString: function(a) {
			                return (a || v).stringify(this)
			            },
			            concat: function(a) {
			                var c = this.words,
			                    e = a.words,
			                    j = this.sigBytes;
			                a = a.sigBytes;
			                this.clamp();
			                if (j % 4)
			                    for (var k = 0; k < a; k++) c[j + k >>> 2] |= (e[k >>> 2] >>> 24 - 8 * (k % 4) & 255) << 24 - 8 * ((j + k) % 4);
			                else if (65535 < e.length)
			                    for (k = 0; k < a; k += 4) c[j + k >>> 2] = e[k >>> 2];
			                else c.push.apply(c, e);
			                this.sigBytes += a;
			                return this
			            },
			            clamp: function() {
			                var a = this.words,
			                    c = this.sigBytes;
			                a[c >>> 2] &= 4294967295 <<
			                    32 - 8 * (c % 4);
			                a.length = u.ceil(c / 4)
			            },
			            clone: function() {
			                var a = t.clone.call(this);
			                a.words = this.words.slice(0);
			                return a
			            },
			            random: function(a) {
			                for (var c = [], e = 0; e < a; e += 4) c.push(4294967296 * u.random() | 0);
			                return new r.init(c, a)
			            }
			        }),
			        w = d.enc = {},
			        v = w.Hex = {
			            stringify: function(a) {
			                var c = a.words;
			                a = a.sigBytes;
			                for (var e = [], j = 0; j < a; j++) {
			                    var k = c[j >>> 2] >>> 24 - 8 * (j % 4) & 255;
			                    e.push((k >>> 4).toString(16));
			                    e.push((k & 15).toString(16))
			                }
			                return e.join("")
			            },
			            parse: function(a) {
			                for (var c = a.length, e = [], j = 0; j < c; j += 2) e[j >>> 3] |= parseInt(a.substr(j,
			                    2), 16) << 24 - 4 * (j % 8);
			                return new r.init(e, c / 2)
			            }
			        },
			        b = w.Latin1 = {
			            stringify: function(a) {
			                var c = a.words;
			                a = a.sigBytes;
			                for (var e = [], j = 0; j < a; j++) e.push(String.fromCharCode(c[j >>> 2] >>> 24 - 8 * (j % 4) & 255));
			                return e.join("")
			            },
			            parse: function(a) {
			                for (var c = a.length, e = [], j = 0; j < c; j++) e[j >>> 2] |= (a.charCodeAt(j) & 255) << 24 - 8 * (j % 4);
			                return new r.init(e, c)
			            }
			        },
			        x = w.Utf8 = {
			            stringify: function(a) {
			                try {
			                    return decodeURIComponent(escape(b.stringify(a)))
			                } catch (c) {
			                    throw Error("Malformed UTF-8 data");
			                }
			            },
			            parse: function(a) {
			                return b.parse(unescape(encodeURIComponent(a)))
			            }
			        },
			        q = l.BufferedBlockAlgorithm = t.extend({
			            reset: function() {
			                this._data = new r.init;
			                this._nDataBytes = 0
			            },
			            _append: function(a) {
			                "string" == typeof a && (a = x.parse(a));
			                this._data.concat(a);
			                this._nDataBytes += a.sigBytes
			            },
			            _process: function(a) {
			                var c = this._data,
			                    e = c.words,
			                    j = c.sigBytes,
			                    k = this.blockSize,
			                    b = j / (4 * k),
			                    b = a ? u.ceil(b) : u.max((b | 0) - this._minBufferSize, 0);
			                a = b * k;
			                j = u.min(4 * a, j);
			                if (a) {
			                    for (var q = 0; q < a; q += k) this._doProcessBlock(e, q);
			                    q = e.splice(0, a);
			                    c.sigBytes -= j
			                }
			                return new r.init(q, j)
			            },
			            clone: function() {
			                var a = t.clone.call(this);
			                a._data = this._data.clone();
			                return a
			            },
			            _minBufferSize: 0
			        });
			    l.Hasher = q.extend({
			        cfg: t.extend(),
			        init: function(a) {
			            this.cfg = this.cfg.extend(a);
			            this.reset()
			        },
			        reset: function() {
			            q.reset.call(this);
			            this._doReset()
			        },
			        update: function(a) {
			            this._append(a);
			            this._process();
			            return this
			        },
			        finalize: function(a) {
			            a && this._append(a);
			            return this._doFinalize()
			        },
			        blockSize: 16,
			        _createHelper: function(a) {
			            return function(b, e) {
			                return (new a.init(e)).finalize(b)
			            }
			        },
			        _createHmacHelper: function(a) {
			            return function(b, e) {
			                return (new n.HMAC.init(a,
			                    e)).finalize(b)
			            }
			        }
			    });
			    var n = d.algo = {};
			    return d
			}(Math);
			(function() {
			    var u = CryptoJS,
			        p = u.lib.WordArray;
			    u.enc.Base64 = {
			        stringify: function(d) {
			            var l = d.words,
			                p = d.sigBytes,
			                t = this._map;
			            d.clamp();
			            d = [];
			            for (var r = 0; r < p; r += 3)
			                for (var w = (l[r >>> 2] >>> 24 - 8 * (r % 4) & 255) << 16 | (l[r + 1 >>> 2] >>> 24 - 8 * ((r + 1) % 4) & 255) << 8 | l[r + 2 >>> 2] >>> 24 - 8 * ((r + 2) % 4) & 255, v = 0; 4 > v && r + 0.75 * v < p; v++) d.push(t.charAt(w >>> 6 * (3 - v) & 63));
			            if (l = t.charAt(64))
			                for (; d.length % 4;) d.push(l);
			            return d.join("")
			        },
			        parse: function(d) {
			            var l = d.length,
			                s = this._map,
			                t = s.charAt(64);
			            t && (t = d.indexOf(t), -1 != t && (l = t));
			            for (var t = [], r = 0, w = 0; w <
			                l; w++)
			                if (w % 4) {
			                    var v = s.indexOf(d.charAt(w - 1)) << 2 * (w % 4),
			                        b = s.indexOf(d.charAt(w)) >>> 6 - 2 * (w % 4);
			                    t[r >>> 2] |= (v | b) << 24 - 8 * (r % 4);
			                    r++
			                } return p.create(t, r)
			        },
			        _map: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
			    }
			})();
			(function(u) {
			    function p(b, n, a, c, e, j, k) {
			        b = b + (n & a | ~n & c) + e + k;
			        return (b << j | b >>> 32 - j) + n
			    }
			
			    function d(b, n, a, c, e, j, k) {
			        b = b + (n & c | a & ~c) + e + k;
			        return (b << j | b >>> 32 - j) + n
			    }
			
			    function l(b, n, a, c, e, j, k) {
			        b = b + (n ^ a ^ c) + e + k;
			        return (b << j | b >>> 32 - j) + n
			    }
			
			    function s(b, n, a, c, e, j, k) {
			        b = b + (a ^ (n | ~c)) + e + k;
			        return (b << j | b >>> 32 - j) + n
			    }
			    for (var t = CryptoJS, r = t.lib, w = r.WordArray, v = r.Hasher, r = t.algo, b = [], x = 0; 64 > x; x++) b[x] = 4294967296 * u.abs(u.sin(x + 1)) | 0;
			    r = r.MD5 = v.extend({
			        _doReset: function() {
			            this._hash = new w.init([1732584193, 4023233417, 2562383102, 271733878])
			        },
			        _doProcessBlock: function(q, n) {
			            for (var a = 0; 16 > a; a++) {
			                var c = n + a,
			                    e = q[c];
			                q[c] = (e << 8 | e >>> 24) & 16711935 | (e << 24 | e >>> 8) & 4278255360
			            }
			            var a = this._hash.words,
			                c = q[n + 0],
			                e = q[n + 1],
			                j = q[n + 2],
			                k = q[n + 3],
			                z = q[n + 4],
			                r = q[n + 5],
			                t = q[n + 6],
			                w = q[n + 7],
			                v = q[n + 8],
			                A = q[n + 9],
			                B = q[n + 10],
			                C = q[n + 11],
			                u = q[n + 12],
			                D = q[n + 13],
			                E = q[n + 14],
			                x = q[n + 15],
			                f = a[0],
			                m = a[1],
			                g = a[2],
			                h = a[3],
			                f = p(f, m, g, h, c, 7, b[0]),
			                h = p(h, f, m, g, e, 12, b[1]),
			                g = p(g, h, f, m, j, 17, b[2]),
			                m = p(m, g, h, f, k, 22, b[3]),
			                f = p(f, m, g, h, z, 7, b[4]),
			                h = p(h, f, m, g, r, 12, b[5]),
			                g = p(g, h, f, m, t, 17, b[6]),
			                m = p(m, g, h, f, w, 22, b[7]),
			                f = p(f, m, g, h, v, 7, b[8]),
			                h = p(h, f, m, g, A, 12, b[9]),
			                g = p(g, h, f, m, B, 17, b[10]),
			                m = p(m, g, h, f, C, 22, b[11]),
			                f = p(f, m, g, h, u, 7, b[12]),
			                h = p(h, f, m, g, D, 12, b[13]),
			                g = p(g, h, f, m, E, 17, b[14]),
			                m = p(m, g, h, f, x, 22, b[15]),
			                f = d(f, m, g, h, e, 5, b[16]),
			                h = d(h, f, m, g, t, 9, b[17]),
			                g = d(g, h, f, m, C, 14, b[18]),
			                m = d(m, g, h, f, c, 20, b[19]),
			                f = d(f, m, g, h, r, 5, b[20]),
			                h = d(h, f, m, g, B, 9, b[21]),
			                g = d(g, h, f, m, x, 14, b[22]),
			                m = d(m, g, h, f, z, 20, b[23]),
			                f = d(f, m, g, h, A, 5, b[24]),
			                h = d(h, f, m, g, E, 9, b[25]),
			                g = d(g, h, f, m, k, 14, b[26]),
			                m = d(m, g, h, f, v, 20, b[27]),
			                f = d(f, m, g, h, D, 5, b[28]),
			                h = d(h, f,
			                    m, g, j, 9, b[29]),
			                g = d(g, h, f, m, w, 14, b[30]),
			                m = d(m, g, h, f, u, 20, b[31]),
			                f = l(f, m, g, h, r, 4, b[32]),
			                h = l(h, f, m, g, v, 11, b[33]),
			                g = l(g, h, f, m, C, 16, b[34]),
			                m = l(m, g, h, f, E, 23, b[35]),
			                f = l(f, m, g, h, e, 4, b[36]),
			                h = l(h, f, m, g, z, 11, b[37]),
			                g = l(g, h, f, m, w, 16, b[38]),
			                m = l(m, g, h, f, B, 23, b[39]),
			                f = l(f, m, g, h, D, 4, b[40]),
			                h = l(h, f, m, g, c, 11, b[41]),
			                g = l(g, h, f, m, k, 16, b[42]),
			                m = l(m, g, h, f, t, 23, b[43]),
			                f = l(f, m, g, h, A, 4, b[44]),
			                h = l(h, f, m, g, u, 11, b[45]),
			                g = l(g, h, f, m, x, 16, b[46]),
			                m = l(m, g, h, f, j, 23, b[47]),
			                f = s(f, m, g, h, c, 6, b[48]),
			                h = s(h, f, m, g, w, 10, b[49]),
			                g = s(g, h, f, m,
			                    E, 15, b[50]),
			                m = s(m, g, h, f, r, 21, b[51]),
			                f = s(f, m, g, h, u, 6, b[52]),
			                h = s(h, f, m, g, k, 10, b[53]),
			                g = s(g, h, f, m, B, 15, b[54]),
			                m = s(m, g, h, f, e, 21, b[55]),
			                f = s(f, m, g, h, v, 6, b[56]),
			                h = s(h, f, m, g, x, 10, b[57]),
			                g = s(g, h, f, m, t, 15, b[58]),
			                m = s(m, g, h, f, D, 21, b[59]),
			                f = s(f, m, g, h, z, 6, b[60]),
			                h = s(h, f, m, g, C, 10, b[61]),
			                g = s(g, h, f, m, j, 15, b[62]),
			                m = s(m, g, h, f, A, 21, b[63]);
			            a[0] = a[0] + f | 0;
			            a[1] = a[1] + m | 0;
			            a[2] = a[2] + g | 0;
			            a[3] = a[3] + h | 0
			        },
			        _doFinalize: function() {
			            var b = this._data,
			                n = b.words,
			                a = 8 * this._nDataBytes,
			                c = 8 * b.sigBytes;
			            n[c >>> 5] |= 128 << 24 - c % 32;
			            var e = u.floor(a /
			                4294967296);
			            n[(c + 64 >>> 9 << 4) + 15] = (e << 8 | e >>> 24) & 16711935 | (e << 24 | e >>> 8) & 4278255360;
			            n[(c + 64 >>> 9 << 4) + 14] = (a << 8 | a >>> 24) & 16711935 | (a << 24 | a >>> 8) & 4278255360;
			            b.sigBytes = 4 * (n.length + 1);
			            this._process();
			            b = this._hash;
			            n = b.words;
			            for (a = 0; 4 > a; a++) c = n[a], n[a] = (c << 8 | c >>> 24) & 16711935 | (c << 24 | c >>> 8) & 4278255360;
			            return b
			        },
			        clone: function() {
			            var b = v.clone.call(this);
			            b._hash = this._hash.clone();
			            return b
			        }
			    });
			    t.MD5 = v._createHelper(r);
			    t.HmacMD5 = v._createHmacHelper(r)
			})(Math);
			(function() {
			    var u = CryptoJS,
			        p = u.lib,
			        d = p.Base,
			        l = p.WordArray,
			        p = u.algo,
			        s = p.EvpKDF = d.extend({
			            cfg: d.extend({
			                keySize: 4,
			                hasher: p.MD5,
			                iterations: 1
			            }),
			            init: function(d) {
			                this.cfg = this.cfg.extend(d)
			            },
			            compute: function(d, r) {
			                for (var p = this.cfg, s = p.hasher.create(), b = l.create(), u = b.words, q = p.keySize, p = p.iterations; u.length < q;) {
			                    n && s.update(n);
			                    var n = s.update(d).finalize(r);
			                    s.reset();
			                    for (var a = 1; a < p; a++) n = s.finalize(n), s.reset();
			                    b.concat(n)
			                }
			                b.sigBytes = 4 * q;
			                return b
			            }
			        });
			    u.EvpKDF = function(d, l, p) {
			        return s.create(p).compute(d,
			            l)
			    }
			})();
			CryptoJS.lib.Cipher || function(u) {
			    var p = CryptoJS,
			        d = p.lib,
			        l = d.Base,
			        s = d.WordArray,
			        t = d.BufferedBlockAlgorithm,
			        r = p.enc.Base64,
			        w = p.algo.EvpKDF,
			        v = d.Cipher = t.extend({
			            cfg: l.extend(),
			            createEncryptor: function(e, a) {
			                return this.create(this._ENC_XFORM_MODE, e, a)
			            },
			            createDecryptor: function(e, a) {
			                return this.create(this._DEC_XFORM_MODE, e, a)
			            },
			            init: function(e, a, b) {
			                this.cfg = this.cfg.extend(b);
			                this._xformMode = e;
			                this._key = a;
			                this.reset()
			            },
			            reset: function() {
			                t.reset.call(this);
			                this._doReset()
			            },
			            process: function(e) {
			                this._append(e);
			                return this._process()
			            },
			            finalize: function(e) {
			                e && this._append(e);
			                return this._doFinalize()
			            },
			            keySize: 4,
			            ivSize: 4,
			            _ENC_XFORM_MODE: 1,
			            _DEC_XFORM_MODE: 2,
			            _createHelper: function(e) {
			                return {
			                    encrypt: function(b, k, d) {
			                        return ("string" == typeof k ? c : a).encrypt(e, b, k, d)
			                    },
			                    decrypt: function(b, k, d) {
			                        return ("string" == typeof k ? c : a).decrypt(e, b, k, d)
			                    }
			                }
			            }
			        });
			    d.StreamCipher = v.extend({
			        _doFinalize: function() {
			            return this._process(!0)
			        },
			        blockSize: 1
			    });
			    var b = p.mode = {},
			        x = function(e, a, b) {
			            var c = this._iv;
			            c ? this._iv = u : c = this._prevBlock;
			            for (var d = 0; d < b; d++) e[a + d] ^=
			                c[d]
			        },
			        q = (d.BlockCipherMode = l.extend({
			            createEncryptor: function(e, a) {
			                return this.Encryptor.create(e, a)
			            },
			            createDecryptor: function(e, a) {
			                return this.Decryptor.create(e, a)
			            },
			            init: function(e, a) {
			                this._cipher = e;
			                this._iv = a
			            }
			        })).extend();
			    q.Encryptor = q.extend({
			        processBlock: function(e, a) {
			            var b = this._cipher,
			                c = b.blockSize;
			            x.call(this, e, a, c);
			            b.encryptBlock(e, a);
			            this._prevBlock = e.slice(a, a + c)
			        }
			    });
			    q.Decryptor = q.extend({
			        processBlock: function(e, a) {
			            var b = this._cipher,
			                c = b.blockSize,
			                d = e.slice(a, a + c);
			            b.decryptBlock(e, a);
			            x.call(this,
			                e, a, c);
			            this._prevBlock = d
			        }
			    });
			    b = b.CBC = q;
			    q = (p.pad = {}).Pkcs7 = {
			        pad: function(a, b) {
			            for (var c = 4 * b, c = c - a.sigBytes % c, d = c << 24 | c << 16 | c << 8 | c, l = [], n = 0; n < c; n += 4) l.push(d);
			            c = s.create(l, c);
			            a.concat(c)
			        },
			        unpad: function(a) {
			            a.sigBytes -= a.words[a.sigBytes - 1 >>> 2] & 255
			        }
			    };
			    d.BlockCipher = v.extend({
			        cfg: v.cfg.extend({
			            mode: b,
			            padding: q
			        }),
			        reset: function() {
			            v.reset.call(this);
			            var a = this.cfg,
			                b = a.iv,
			                a = a.mode;
			            if (this._xformMode == this._ENC_XFORM_MODE) var c = a.createEncryptor;
			            else c = a.createDecryptor, this._minBufferSize = 1;
			            this._mode = c.call(a,
			                this, b && b.words)
			        },
			        _doProcessBlock: function(a, b) {
			            this._mode.processBlock(a, b)
			        },
			        _doFinalize: function() {
			            var a = this.cfg.padding;
			            if (this._xformMode == this._ENC_XFORM_MODE) {
			                a.pad(this._data, this.blockSize);
			                var b = this._process(!0)
			            } else b = this._process(!0), a.unpad(b);
			            return b
			        },
			        blockSize: 4
			    });
			    var n = d.CipherParams = l.extend({
			            init: function(a) {
			                this.mixIn(a)
			            },
			            toString: function(a) {
			                return (a || this.formatter).stringify(this)
			            }
			        }),
			        b = (p.format = {}).OpenSSL = {
			            stringify: function(a) {
			                var b = a.ciphertext;
			                a = a.salt;
			                return (a ? s.create([1398893684,
			                    1701076831
			                ]).concat(a).concat(b) : b).toString(r)
			            },
			            parse: function(a) {
			                a = r.parse(a);
			                var b = a.words;
			                if (1398893684 == b[0] && 1701076831 == b[1]) {
			                    var c = s.create(b.slice(2, 4));
			                    b.splice(0, 4);
			                    a.sigBytes -= 16
			                }
			                return n.create({
			                    ciphertext: a,
			                    salt: c
			                })
			            }
			        },
			        a = d.SerializableCipher = l.extend({
			            cfg: l.extend({
			                format: b
			            }),
			            encrypt: function(a, b, c, d) {
			                d = this.cfg.extend(d);
			                var l = a.createEncryptor(c, d);
			                b = l.finalize(b);
			                l = l.cfg;
			                return n.create({
			                    ciphertext: b,
			                    key: c,
			                    iv: l.iv,
			                    algorithm: a,
			                    mode: l.mode,
			                    padding: l.padding,
			                    blockSize: a.blockSize,
			                    formatter: d.format
			                })
			            },
			            decrypt: function(a, b, c, d) {
			                d = this.cfg.extend(d);
			                b = this._parse(b, d.format);
			                return a.createDecryptor(c, d).finalize(b.ciphertext)
			            },
			            _parse: function(a, b) {
			                return "string" == typeof a ? b.parse(a, this) : a
			            }
			        }),
			        p = (p.kdf = {}).OpenSSL = {
			            execute: function(a, b, c, d) {
			                d || (d = s.random(8));
			                a = w.create({
			                    keySize: b + c
			                }).compute(a, d);
			                c = s.create(a.words.slice(b), 4 * c);
			                a.sigBytes = 4 * b;
			                return n.create({
			                    key: a,
			                    iv: c,
			                    salt: d
			                })
			            }
			        },
			        c = d.PasswordBasedCipher = a.extend({
			            cfg: a.cfg.extend({
			                kdf: p
			            }),
			            encrypt: function(b, c, d, l) {
			                l = this.cfg.extend(l);
			                d = l.kdf.execute(d,
			                    b.keySize, b.ivSize);
			                l.iv = d.iv;
			                b = a.encrypt.call(this, b, c, d.key, l);
			                b.mixIn(d);
			                return b
			            },
			            decrypt: function(b, c, d, l) {
			                l = this.cfg.extend(l);
			                c = this._parse(c, l.format);
			                d = l.kdf.execute(d, b.keySize, b.ivSize, c.salt);
			                l.iv = d.iv;
			                return a.decrypt.call(this, b, c, d.key, l)
			            }
			        })
			}();
			(function() {
			    for (var u = CryptoJS, p = u.lib.BlockCipher, d = u.algo, l = [], s = [], t = [], r = [], w = [], v = [], b = [], x = [], q = [], n = [], a = [], c = 0; 256 > c; c++) a[c] = 128 > c ? c << 1 : c << 1 ^ 283;
			    for (var e = 0, j = 0, c = 0; 256 > c; c++) {
			        var k = j ^ j << 1 ^ j << 2 ^ j << 3 ^ j << 4,
			            k = k >>> 8 ^ k & 255 ^ 99;
			        l[e] = k;
			        s[k] = e;
			        var z = a[e],
			            F = a[z],
			            G = a[F],
			            y = 257 * a[k] ^ 16843008 * k;
			        t[e] = y << 24 | y >>> 8;
			        r[e] = y << 16 | y >>> 16;
			        w[e] = y << 8 | y >>> 24;
			        v[e] = y;
			        y = 16843009 * G ^ 65537 * F ^ 257 * z ^ 16843008 * e;
			        b[k] = y << 24 | y >>> 8;
			        x[k] = y << 16 | y >>> 16;
			        q[k] = y << 8 | y >>> 24;
			        n[k] = y;
			        e ? (e = z ^ a[a[a[G ^ z]]], j ^= a[a[j]]) : e = j = 1
			    }
			    var H = [0, 1, 2, 4, 8,
			            16, 32, 64, 128, 27, 54
			        ],
			        d = d.AES = p.extend({
			            _doReset: function() {
			                for (var a = this._key, c = a.words, d = a.sigBytes / 4, a = 4 * ((this._nRounds = d + 6) + 1), e = this._keySchedule = [], j = 0; j < a; j++)
			                    if (j < d) e[j] = c[j];
			                    else {
			                        var k = e[j - 1];
			                        j % d ? 6 < d && 4 == j % d && (k = l[k >>> 24] << 24 | l[k >>> 16 & 255] << 16 | l[k >>> 8 & 255] << 8 | l[k & 255]) : (k = k << 8 | k >>> 24, k = l[k >>> 24] << 24 | l[k >>> 16 & 255] << 16 | l[k >>> 8 & 255] << 8 | l[k & 255], k ^= H[j / d | 0] << 24);
			                        e[j] = e[j - d] ^ k
			                    } c = this._invKeySchedule = [];
			                for (d = 0; d < a; d++) j = a - d, k = d % 4 ? e[j] : e[j - 4], c[d] = 4 > d || 4 >= j ? k : b[l[k >>> 24]] ^ x[l[k >>> 16 & 255]] ^ q[l[k >>>
			                    8 & 255]] ^ n[l[k & 255]]
			            },
			            encryptBlock: function(a, b) {
			                this._doCryptBlock(a, b, this._keySchedule, t, r, w, v, l)
			            },
			            decryptBlock: function(a, c) {
			                var d = a[c + 1];
			                a[c + 1] = a[c + 3];
			                a[c + 3] = d;
			                this._doCryptBlock(a, c, this._invKeySchedule, b, x, q, n, s);
			                d = a[c + 1];
			                a[c + 1] = a[c + 3];
			                a[c + 3] = d
			            },
			            _doCryptBlock: function(a, b, c, d, e, j, l, f) {
			                for (var m = this._nRounds, g = a[b] ^ c[0], h = a[b + 1] ^ c[1], k = a[b + 2] ^ c[2], n = a[b + 3] ^ c[3], p = 4, r = 1; r < m; r++) var q = d[g >>> 24] ^ e[h >>> 16 & 255] ^ j[k >>> 8 & 255] ^ l[n & 255] ^ c[p++],
			                    s = d[h >>> 24] ^ e[k >>> 16 & 255] ^ j[n >>> 8 & 255] ^ l[g & 255] ^ c[p++],
			                    t =
			                    d[k >>> 24] ^ e[n >>> 16 & 255] ^ j[g >>> 8 & 255] ^ l[h & 255] ^ c[p++],
			                    n = d[n >>> 24] ^ e[g >>> 16 & 255] ^ j[h >>> 8 & 255] ^ l[k & 255] ^ c[p++],
			                    g = q,
			                    h = s,
			                    k = t;
			                q = (f[g >>> 24] << 24 | f[h >>> 16 & 255] << 16 | f[k >>> 8 & 255] << 8 | f[n & 255]) ^ c[p++];
			                s = (f[h >>> 24] << 24 | f[k >>> 16 & 255] << 16 | f[n >>> 8 & 255] << 8 | f[g & 255]) ^ c[p++];
			                t = (f[k >>> 24] << 24 | f[n >>> 16 & 255] << 16 | f[g >>> 8 & 255] << 8 | f[h & 255]) ^ c[p++];
			                n = (f[n >>> 24] << 24 | f[g >>> 16 & 255] << 16 | f[h >>> 8 & 255] << 8 | f[k & 255]) ^ c[p++];
			                a[b] = q;
			                a[b + 1] = s;
			                a[b + 2] = t;
			                a[b + 3] = n
			            },
			            keySize: 8
			        });
			    u.AES = p._createHelper(d)
			})();
			
			var CryptoJSAesJson = {
			    stringify: function(cipherParams) {
			        var j = {
			            ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)
			        };
			        if (cipherParams.iv) j.iv = cipherParams.iv.toString();
			        if (cipherParams.salt) j.s = cipherParams.salt.toString();
			        return JSON.stringify(j).replace(/\s/g, '');
			    },
			    parse: function(jsonStr) {
			        var j = JSON.parse(jsonStr);
			        var cipherParams = CryptoJS.lib.CipherParams.create({
			            ciphertext: CryptoJS.enc.Base64.parse(j.ct)
			        });
			        if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv);
			        if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s);
			        return cipherParams;
			    }
			}
			
			function calculateDurationDays(eta, etd, el){
			    var r = "0";
			    $.ajax({
			        type: "GET",
			        /*url: "{{ request()->getScheme() . '://' . request()->getHttpHost() }}:{{ env('GO_PORT') }}/api/calculate/duration?eta=" + eta + "&etd=" + etd,*/
			        url: "{{ env('GO_URL') }}/api/calculate/duration/days?start=" + eta + "&end=" + etd,
			        async: false,
			        data: {
			        },
			        success: function(data) {
			            if (data["STATUS"] == "SUCCESS") {
			                r = data["PAYLOAD"];
			            } 
			            else {
			                toastr.error(data["MESSAGE"]);
			            }
			        },
			        error: function(error) {
			            toastr.error("Network/server error\r\n" + error);
			        }
			    });
			
			    $("#" + el).val(r)
			    return r;
			}
			
		</script>
		<!-- iOS overlay -->
		<script src="{!! url('/') !!}/assets/backend/js/overlay/iosOverlay.js"></script>
		<script src="{!! url('/') !!}/assets/backend/js/overlay/spin.min.js"></script>
		<link rel="stylesheet" href="{!! url('/') !!}/assets/backend/js/overlay/iosOverlay.css">
		<script src="{!! url('/') !!}/assets/backend/js/overlay/modernizr-2.0.6.min.js"></script>
		<script type="text/javascript">
			function createOverlay(screenText) {
			    var target = document.createElement("div");
			    document.body.appendChild(target);
			    var opts = {
			        lines: 13, // The number of lines to draw
			        length: 11, // The length of each line
			        width: 5, // The line thickness
			        radius: 17, // The radius of the inner circle
			        corners: 1, // Corner roundness (0..1)
			        rotate: 0, // The rotation offset
			        color: '#FFF', // #rgb or #rrggbb
			        speed: 1, // Rounds per second
			        trail: 60, // Afterglow percentage
			        shadow: false, // Whether to render a shadow
			        hwaccel: false, // Whether to use hardware acceleration
			        className: 'spinner', // The CSS class to assign to the spinner
			        zIndex: 2e9, // The z-index (defaults to 2000000000)
			        top: 'auto', // Top position relative to parent in px
			        left: 'auto' // Left position relative to parent in px
			    };
			    var spinner = new Spinner(opts).spin(target);
			    gOverlay = iosOverlay({
			        text: screenText,
			        /*duration: 2e3,*/
			        spinner: spinner
			    });
			}
			
			var gOverlay;
		</script>
		<script src="{!! url('/') !!}/assets/backend/js/autoNumeric.js"></script>
		<script type="text/javascript">
			$(".numeric-input").autoNumeric({aSep: ',', aDec: '.', aSign: 'Rp. '});
			$(".numeric-input-idr").autoNumeric({aSep: ',', aDec: '.', aSign: 'Rp. '});
			$(".numeric-input-usd").autoNumeric({aSep: ',', aDec: '.', aSign: 'USD. '});
			$(".numeric-input-no-sign").autoNumeric({aSep: ',', aDec: '.', aSign: '', mDec: 0});
			$(".numeric-input-no-sign-decimal-2").autoNumeric({aSep: ',', aDec: '.', aSign: '', mDec: 2, vMin: '-999999999'});
			$(".numeric-input-no-sign-decimal-3").autoNumeric({aSep: ',', aDec: '.', aSign: '', mDec: 3, vMin: '-999999999'});
			$(".numeric-input-allow-negative").autoNumeric({aSep: ',', aDec: '.', aSign: 'Rp. ', vMin: '-999999999'});
			$(".numeric-input-allow-negative-idr").autoNumeric({aSep: ',', aDec: '.', aSign: 'Rp. ', vMin: '-999999999'});
			$(".numeric-input-no-sign-allow-negative-decimal").autoNumeric({aSep: ',', aDec: '.', vMin: '-999999999', mDec: 2});
			$(".numeric-input-no-sign-allow-negative").autoNumeric('init', {mDec: '0', vMin: '-999999999', mDec: 0});
		</script>
		@yield('script')
	</body>
</html>
