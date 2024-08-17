@extends('jsb.layouts.app')
@section('title', 'Search')
@section('content')
<section class="py-3">
    <div class="container-small">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search Result</li>
            </ol>
        </nav>
        <div class="product-filter-container">
            <button class="btn btn-sm btn-phoenix-secondary text-700 mb-5 d-lg-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#productFilterColumn"> <span class="fa-solid fa-filter me-2"></span>Filter</button>
            <div class="row">
                <div class="col-lg-12 col-xxl-10">
                    <div class="row gx-3 gy-6 mb-8">
						@if(isset($ctlPorts))
                        @foreach($ctlPorts as $value)
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
                                <div class="product-card-container h-100">
                                    <div class="position-relative text-decoration-none product-card h-100">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <div>
                                                <div class="border border-1 rounded-3 position-relative mb-3">
                                                    <!-- <button class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span> -->
                                                    </button><img class="img-fluid" src="{{ env('GO_URL') }}/api/ports/{{ md5($value->PORT_ID) }}/image" alt="{{ $value->PORT_NAME }}" onerror="this.onerror=null; this.src='{{ base_url() }}/assets/jsb/logo2_orange.png'" width="530" height="530" />
                                                    <!-- <span class="badge bg-success fs--2 product-verified-badge">Verified<span class="fas fa-check ms-1"></span></span> -->
                                                </div>
                                                <a class="stretched-link" href="{{ base_url() }}/ports/{{ $value->PORT_ID }}">
                                                    <h4 class="mb-2 lh-sm line-clamp-3 product-name">{{ $value->PORT_NAME }}</h4>
                                                </a>
                                                    <p class="text-700 fw-semi-bold fs--1 lh-1 mb-0">{{ $value->{'CITY_TYPE'} }} {{ $value->{'CITY_NAME'} }}, Province of {{ $value->{'PROVINCE_NAME'} }}</p>
                                                <?php
                                                    $strService = "";
													if(isset($value->{"SERVICE"})){
														foreach($value->{"SERVICE"} as $value2){
															$strService .= $value2->{"SVC_NAME"} . " <br>";
														}
													}
                                                ?>
                                                <p class="fs--1 pt-3"><span class="text-900 fw-semi-bold">{!! $strService !!}</span>
                                                </p>
                                            </div>
                                            <div>
                                                <!-- <div class="d-flex align-items-center mb-1">
                                                    <p class="me-2 text-900 text-decoration-line-through mb-0">$49.99</p>
                                                    <h3 class="text-1100 mb-0">$34.99</h3>
                                                </div> -->
                                                <!-- <p class="text-success fw-bold fs--1 lh-1 mb-0">Deal time ends in days</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- end of .container-->
</section>

@endsection
@section('script')
<script type="text/javascript">
	@if ($errors->any())
	    toastr.error("{{ $errors->first() }}");
	@endif
</script>
@endsection
