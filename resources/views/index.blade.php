@extends('layouts.app')
@section('title', ' Home')
@section('content')
<section class="py-0" style="display:none;">
	<div class="container-small">
		<div class="scrollbar">
			<div class="d-flex justify-content-between">
				@foreach($ctlServices as $value)
				<a class="icon-nav-item" href="#!">
					<div class="icon-container mb-2"><span class="fs-4 uil uil-wrench"></span></div>
					<p class="nav-label">{{ $value->{'SVC_ID'} }}</p>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
@if (Session::get('SESSION_U_ID') === null || Session::get('SESSION_U_ID') === '')
	<div class="position-relative">
		<div class="bg-holder world-map-bg" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-13.png);">
		</div>
		<!--/.bg-holder-->
		<div class="bg-holder z-index-2 opacity-25" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-right-21.png);background-size:auto;background-position:right; display:none;">
		</div>
		<!--/.bg-holder-->
		<div class="bg-holder z-index-2 mt-9 opacity-25" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-left-21.png);background-size:auto;background-position:left; display:none;">
		</div>
		<!--/.bg-holder-->
		<!-- <svg class="w-100 text-white position-relative" preserveAspectRatio="none" viewBox="0 0 1920 368" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1920 0.44L0 367.74V0H1920V0.44Z" fill="currentColor"></path>
			</svg> -->
		<section class="overflow-hidden z-index-2">
			<div class="container-small light px-lg-7 px-xxl-3">
				<div class="position-relative">
					<div class="row mb-6">
						<div class="col-xl-7 text-center text-md-start">
							<h2 class="text-white mb-2">Ensuring customers have good sleep</h2>
							<h1 class="fs-md-5 fs-xl-5 fw-black text-gradient-info text-uppercase mb-4 mb-md-0">INDONESIA SPECIALIST</h1>
						</div>
						<div class="col-xl-5 text-center text-md-start">
							<h5 class="fs-md-3 fs-xl-3 fw-black text-gradient-info text-uppercase mb-4 mb-md-0">WELCOME TO PORT QUANTA</h5>
							<h4 class="text-white mb-2" style="line-height: 1.35; font-weight: 700;">Simplifying complicated task by the assistance of latest technology and qualified human team</h4>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <svg class="text-white w-100 position-relative" viewBox="0 0 1920 368" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 368L1920 0.730011L1920 368L0 368Z" fill="currentColor"></path>
			</svg> -->
	</div>
@else
	<div class="position-relative">
		<div class="bg-holder world-map-bg" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-13.png);">
		</div>
		<!--/.bg-holder-->
		<div class="bg-holder z-index-2 opacity-25" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-right-21.png);background-size:auto;background-position:right; display:none;">
		</div>
		<!--/.bg-holder-->
		<div class="bg-holder z-index-2 mt-9 opacity-25" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-left-21.png);background-size:auto;background-position:left; display:none;">
		</div>
		<!--/.bg-holder-->
		<!-- <svg class="w-100 text-white position-relative" preserveAspectRatio="none" viewBox="0 0 1920 368" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1920 0.44L0 367.74V0H1920V0.44Z" fill="currentColor"></path>
			</svg> -->
		<section class="overflow-hidden z-index-2">
			<div class="container-small light px-lg-3 px-xxl-1">
				<div class="position-relative">
					<div class="row mb-5">
						<div class="col-xl-12 text-center text-md-start">
							<h2 class="text-white mb-2 text-center">You're already logged in</h2>
						</div>
					</div>
				</div>
				<div class="position-relative">
					<div class="row mb-6">
						<div class="col-xl-6 text-center text-md-start">
							<h2 class="text-white mb-2">Ensuring customers have good sleep</h2>
							<h4 class="fs-md-3 fs-xl-3 fw-black text-gradient-info text-uppercase mb-4 mb-md-0">INDONESIA SPECIALIST</h4>
						</div>
						<div class="col-xl-6 text-center text-md-start">
							<h5 class="fs-md-3 fs-xl-3 fw-black text-gradient-info text-uppercase mb-4 mb-md-0">WELCOME TO PORT QUANTA</h5>
							<h4 class="text-white mb-2" style="line-height: 1.35; font-weight: 700;">Tools for tuning complicated ships disbursements matters <br>into simple task</h4>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <svg class="text-white w-100 position-relative" viewBox="0 0 1920 368" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 368L1920 0.730011L1920 368L0 368Z" fill="currentColor"></path>
			</svg> -->
	</div>
@endif

<section class="py-0 px-xl-3">
	<div class="container px-xl-0 px-xxl-3">
		<section class="overflow-hidden rotating-earth-container pb-5 pb-md-0 pt-1">
			<div class="container-small px-lg-7 px-xxl-3">
				@if (Session::get('SESSION_U_ID') === null || Session::get('SESSION_U_ID') === '')
					<div class="row flex-center mb-5 mt-2 gy-6">
						<!-- <div class="col-auto"><img class="d-dark-none" src="{{ base_url() }}/assets/jsb/logo2_orange.png" alt="" width="305" /><img class="d-light-none" src="{{ base_url() }}/assets/jsb/img/spot-illustrations/dark_30.png" alt="" width="150" /></div> -->
						<div class="col-auto">
							<div class="text-center text-lg-start">
								<h2 class="display-3 fw-semi-bold text-primary fw-bolder mb-4"><span class="text-black">Enjoy your coffee and </span>relax!</h2>
								<h3 class="text-500 mb-2"><span class="fw-semi-bold">For simplifying your ship disbursements task matter,</span><br class="d-md-none" /></h3>
								<h3 class="text-500 mb-2"><span class="fw-semi-bold">appreciate to <a href="{{ base_url() }}/login">Login</a> or <a href="{{ base_url() }}/register">Register</a></span></h3>
								<!--a class="btn btn-lg btn-primary px-7 mt-2" href="{{ base_url() }}/login"><b>LOGIN<span class="fas fa-chevron-right ms-2 fs--1"></span></b></a>
									&nbsp;
									<a class="btn btn-lg btn-success px-7 mt-2" href="{{ base_url() }}/register"><b>REGISTER<span class="fas fa-chevron-right ms-2 fs--1"></span></b></a-->
							</div>
						</div>
					</div>
				@else
					<div class="row flex-center mb-5 gy-6">
						<!-- <div class="col-auto"><img class="d-dark-none" src="{{ base_url() }}/assets/jsb/logo2_orange.png" alt="" width="305" /><img class="d-light-none" src="{{ base_url() }}/assets/jsb/img/spot-illustrations/dark_30.png" alt="" width="305" /></div>	 -->
						<div class="col-lg-12 text-center text-lg-start">
							<div class="row gy-4 mt-10" id="anchor-features">
								<div class="col-sm-4 text-center text-lg-start">
									<img class="mb-4 d-dark-none" src="{{ base_url() }}/assets/jsb/img/addon/ship_607995.png" alt="" />
									<h3 class="mb-2">Getting Started</h3>
									<p>To request DA, pick a port from our ports coverage and <b>See Details</b> on preferred port to go into details and submit request for DA.</p>
								</div>
								<div class="col-sm-4 text-center text-lg-start">
									<img class="mb-4 d-dark-none" src="{{ base_url() }}/assets/jsb/img/addon/task-list_5006953.png" alt="" /><img class="mb-4 d-light-none" src="{{ base_url() }}/assets/jsb/img/icons/best-statistics-dark.png" alt="" />
									<h3 class="mb-2">PDA Requests</h3>
									<p>If you already have submitted PDA request before, click <b>Disbursements</b> menu or cart icon on the top navigation bar.</p>
								</div>
								<div class="col-sm-4 text-center text-lg-start">
									<img class="mb-4 d-dark-none" src="{{ base_url() }}/assets/jsb/img/addon/cost_4558628.png" alt="" /><img class="mb-4 d-light-none" src="{{ base_url() }}/assets/jsb/img/icons/all-night-dark.png" alt="" />
									<h3 class="mb-2">Financial Account</h3>
									<p>Checking account balance ? Invoice and payment ? Just click <b onclick="window.location='{{ base_url() }}/balance'">Account Balance</b> in the navigation bar above</p>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
			<!-- end of .container-->
		</section>

		<hr>
		<div class="mb-6 pt-10">
			<div class="d-flex flex-between-center mb-3" id="anchor-ports">
				<h2>Our Ports Coverage</h2>
			</div>
			
			<div id="portTable">
				<div class="search-box">
					<form class="position-relative" data-bs-toggle="search" data-bs-display="static">
						<input class="form-control search-input search" type="search" placeholder="Search ports" aria-label="Search"/>
						<span class="fas fa-search search-box-icon"></span>
					</form>
				</div>
				<br>
				<div class="table-responsive scrollbar mx-n1 px-1">
					<table class="table fs--1 mb-0 border-top border-200">
						<thead>
							<tr>
								<th class="align-middle" style="font-size: 105%;">PORT NAME</th>
								<th class="align-middle" style="font-size: 105%;">LOCATION</th>
								<th>&nbsp;</th>
								<!-- <th>&nbsp;</th> -->
							</tr>
						</thead>
						<tbody class="list">
							@if(isset($ctlPorts))
								@foreach ($ctlPorts as $value)
									<tr class="cart-table-row btn-reveal-trigger">
										<td style="vertical-align: top;" class="align-middle fw-bold port-name">
											<a href="{{ base_url() }}/ports/{{ $value->PORT_ID }}" class="align-middle white-space-nowrap py-0"><h5 class="lh-sm line-clamp-3">{{ $value->PORT_NAME }}</h5></a>
										</td>
										<td class="color align-middle white-space-nowrap fs--1 port-location" style="font-size: 110%;">
											{{ $value->PORT_LOC_CITY->{'CITY_TYPE'} }} {{ $value->PORT_LOC_CITY->{'CITY_NAME'} }}, Province of {{ $value->PORT_LOC_CITY->{'PROVINCE_NAME'} }}
										</td>
										<td class="align-middle text-end white-space-nowrap pe-0 action">
											<button class="btn btn-outline-primary" type="button" onclick="window.location='{{ base_url() }}/ports/{{ $value->PORT_ID }}'">See Details</button>
										</td>
                    					<!-- <td class="align-middle text-end white-space-nowrap pe-0 action">
                      						<div class="font-sans-serif btn-reveal-trigger position-static">
                        						<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        						<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                          							<div class="dropdown-divider"></div>
													<a class="dropdown-item text-danger" href="#!">Remove</a>
                        						</div>
                      						</div>
                    					</td> -->
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		{{--
		@if (Session::get('SESSION_U_ID') == null || Session::get('SESSION_U_ID') == '')
		<div class="row flex-center mb-15 mt-11 gy-6">
			<div class="col-auto"><img class="d-dark-none" src="{{ base_url() }}/assets/jsb/img/spot-illustrations/light_30.png" alt="" width="305" /><img class="d-light-none" src="{{ base_url() }}/assets/jsb/img/spot-illustrations/dark_30.png" alt="" width="305" /></div>
			<div class="col-auto">
				<div class="text-center text-lg-start">
					<h3 class="text-1000 mb-2"><span class="fw-semi-bold">Want to have the </span>ultimate <br class="d-md-none" />customer experience?</h3>
					<h1 class="display-3 fw-semi-bold mb-4"><span class="text-primary fw-bolder">Register </span>now!</h1>
					<a class="btn btn-lg btn-primary px-7" href="{{ base_url() }}/register">Register<span class="fas fa-chevron-right ms-2 fs--1"></span></a>
				</div>
			</div>
		</div>
		@endif
		--}}
	</div>
	<!-- end of .container-->
</section>
{{--
<section class="bg-white pb-0">
	<div class="container-small px-lg-7 px-xxl-3">
		<div class="row justify-content-center" id="anchor-msg">
			<div class="col-12 text-center">
				<div class="card py-md-9 px-md-13 border-0 z-index-1 shadow-lg cta-card">
					<div class="bg-holder" style="background-image:url({{ base_url() }}/assets/jsb/img/bg/bg-18.png);background-position:right;background-size:auto;">
					</div>
					<!--/.bg-holder-->
					<div class="card-body position-relative">
						<div class="col-md-12 text-center text-md-start">
							<h3 class="mb-3">Drop us a line</h3>
							<p class="mb-7">If you have any query or suggestion , we are open to learn from you, Lets talk, reach us anytime.</p>
							<form class="row g-4">
								<div class="col-12">
									<input class="form-control bg-white" type="text" name="name" placeholder="Name" required="required" />
								</div>
								<div class="col-12">
									<input class="form-control bg-white" type="email" name="email" placeholder="Email" required="required" />
								</div>
								<div class="col-12">
									<textarea class="form-control bg-white" rows="6" name="message" placeholder="Message" required="required"></textarea>
								</div>
								<div class="col-12 d-grid">
									<button class="btn btn-outline-primary" type="submit">Submit</button>
								</div>
								<div class="feedback"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of .container-->
</section>
--}}
<!-- <section> close ============================-->
<!-- ============================================-->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var portOptions = {
			valueNames : ["port-name", "port-location"]
		}
		var portTable = new List("portTable", portOptions);
	});
</script>
@endsection