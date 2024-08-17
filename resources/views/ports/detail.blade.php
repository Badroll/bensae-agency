@extends('jsb.layouts.app')

@section('title', ' ' . $ctlPort->{'PORT_ID'} . ' ' . $ctlPort->{'PORT_NAME'})

@section('content')
    <section class="py-3">
        <div class="container-small">
            <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ base_url() }}/#anchor-ports">Port</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ctlPort->PORT_NAME }}</li>
                </ol>
            </nav>

            <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                <!-- <div class="col-12 col-lg-6">
                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center border rounded-3 text-center p-5 h-100">
                                {{-- <div class="swiper swiper-container theme-slider" data-thumb-target="swiper-products-thumb" data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'></div> --}}
                                <img class="img-fluid" src="{{ env('GO_URL') }}/api/ports/{{ md5($ctlPort->PORT_ID) }}/image" alt="{{ $ctlPort->PORT_NAME }}" onerror="this.onerror=null; this.src='{{ base_url() }}/assets/jsb/logo2_orange.png'" />
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-lg-6">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex flex-wrap align-items-start mb-3 mt-5"><span class="badge bg-success fs--1 rounded-pill me-2 fw-semi-bold">Active</span></div>
                            <div class="d-flex flex-wrap mb-4">
                                <h1 class="me-3 mb-0">{{ $ctlPort->{"PORT_NAME"} }}</h1>
                                <p class="text-800 mb-0" style="align-self: flex-end;"></p>
                            </div>
                            <p class="text-1000 fw-bold lh-1">{{ $ctlPort->{"TOTAL_SERVICE"} }} service(s) available</p>
                            <p class="text-1000 fw-normal lh-1 mt-2 mb-0">{{ $ctlPort->{'CITY_TYPE'} }} {{ $ctlPort->{'CITY_NAME'} }}<div>Province of {{ $ctlPort->{'PROVINCE_NAME'} }}, Indonesia</div></p>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 40%"> </th>
                                        <th style="width: 60%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LATITUDE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOC_LAT'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LONGITUDE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOC_LNG'} }}</td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">OFFICIAL NAME</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_OFFICIAL_NAME'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">OWNERSHIP</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_OWNERSHIP'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">CARGO ACCOMODATED</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_CARGO_ACCOMMODATED'} }}</td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LOCODE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOCODE'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">FACILITY CODE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_FACILITY_CODE'} }}</td>
                                    </tr>
                                    //-->
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">TARIFF REFERENCE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_TARIFF_REFERENCE'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">MAIN MANAGER</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_MAIN_MANAGER'} }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex ">
                                <button onClick="" class="btn btn-lg btn-warning rounded-pill w-100 fs--1 fs-sm-0" data-bs-toggle="modal" data-bs-target="#modalForm">
                                    <!-- <span class="fas fa-shopping-cart me-2"></span> -->
                                    Get PDA Now!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
    </section>

    <section class="py-0">
        <div class="container-small">
            <ul class="nav nav-underline mb-4" id="productTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Service & Tariff</a></li>
                <!-- <li class="nav-item"><a class="nav-link" id="specification-tab" data-bs-toggle="tab" href="#tab-specification" role="tab" aria-controls="tab-specification" aria-selected="false">Port Details</a></li> -->
            </ul>
            <div class="row gx-3 gy-7">
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane pe-lg-6 pe-xl-12 fade show active text-1100" id="tab-description" role="tabpanel" aria-labelledby="description-tab">
                            @if($ctlPort->{"SERVICE_DATA"} != null)
                                @foreach($ctlPort->{"SERVICE_DATA"} as $key => $value)
                                    <div>
                                        <h3 class="mb-0 ms-0 fw-bold">{{ $value->{"SVC_NAME"} }}</h3>
                                        @if($value->{"TARIFF_DATA"} != null)
                                            @foreach($value->{"TARIFF_DATA"} as $key2 => $value2)
                                                @if($value2->{"PORTTRF_TYPE"} == "Fixed")
                                                    <div>  
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 40%"> </th>
                                                                    <th style="width: 60%"></th>
                                                                </tr>
                                                            </thead>
                                                            <br>
                                                            <h4>{{ $value2->{"PORTTRF_NAME"} }}</h4>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Tariff Type</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">{{ $value2->{"PORTTRF_TYPE"} }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Service Measurements</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">
                                                                        <ul>
                                                                            @if($value2->{"TARIFF_DETAIL_DATA"} != null)
                                                                                @foreach($value2->{"TARIFF_DETAIL_DATA"} as $key3 => $value3)
                                                                                    <li>{{ $value3->{"PORTTRFDTL_LABEL"} }}</li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Tariff Price</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">{{ number_format($value2->{"PORTTRF_VALUE"}, 2, ".", ",") }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Currency</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">{{ $value2->{"PORTTRF_VALUE_CURRENCY_ID"} }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @elseif($value2->{"PORTTRF_TYPE"} == "Variable")
                                                    <div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 40%"> </th>
                                                                    <th style="width: 60%"></th>
                                                                </tr>
                                                            </thead>
                                                            <br>
                                                            <h4>{{ $value2->{"PORTTRF_NAME"} }}</h4>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Tariff Type</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">{{ $value2->{"PORTTRF_TYPE"} }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Service Measurements</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">
                                                                        <ul>
                                                                            @if($value2->{"TARIFF_DETAIL_DATA"} != null)
                                                                                @foreach($value2->{"TARIFF_DETAIL_DATA"} as $key3 => $value3)
                                                                                    <li>
                                                                                        {{ $value3->{"PORTTRFDTL_LABEL"} }}
                                                                                        @if($value3->{"RANGE_DATA"} != null && count($value3->{"RANGE_DATA"}) > 0)
                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th style="width: 70%">Range</th>
                                                                                                        <th style="width: 30%">Value</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <br>
                                                                                                <tbody>
                                                                                                    @if($value3->{"RANGE_DATA"} != null && count($value3->{"RANGE_DATA"}) > 0)
                                                                                                        @foreach($value3->{"RANGE_DATA"} as $key4 => $value4)
                                                                                                            <tr>
                                                                                                                <td class="bg-100 align-middle">
                                                                                                                    <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">{{ number_format($value4->{"PORTTRFRNG_VALUE_MIN"},0,'.',',') }} - {{ number_format($value4->{"PORTTRFRNG_VALUE_MAX"},0,'.',',') }}</h6>
                                                                                                                </td>
                                                                                                                <td class="px-5 mb-0">{{ $value4->{"PORTTRFRNG_AMOUNT"} }}</td>
                                                                                                            </tr>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </tbody>
                                                                                            </table>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-100 align-middle">
                                                                        <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">Currency</h6>
                                                                    </td>
                                                                    <td class="px-5 mb-0">{{ $value2->{"PORTTRF_VALUE_CURRENCY_ID"} }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        <hr>
                                        <br>
                                    </div>
                                @endforeach
                                <div class="d-flex ">
                                    <button onClick="" class="btn btn-lg btn-warning rounded-pill w-100 fs--1 fs-sm-0" data-bs-toggle="modal" data-bs-target="#modalForm">
                                        Get PDA for {{ $ctlPort->{"PORT_NAME"} }}
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane pe-lg-6 pe-xl-12 fade" id="tab-specification" role="tabpanel" aria-labelledby="specification-tab">
                            <h3 class="mb-0 ms-4 fw-bold">Location</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 40%"> </th>
                                        <th style="width: 60%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">CITY</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'CITY_TYPE'} }} {{ $ctlPort->{'CITY_NAME'} }}, Province of {{ $ctlPort->{'PROVINCE_NAME'} }}, Indonesia</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LATITUDE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOC_LAT'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LONGITUDE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOC_LNG'} }}</td>
                                    </tr>

                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">OFFICIAL NAME</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_OFFICIAL_NAME'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">OWNERSHIP</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_OWNERSHIP'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">CARGO ACCOMODATED</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_CARGO_ACCOMMODATED'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">LACODE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_LOCODE'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">FACILITY CODE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_FACILITY_CODE'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">TARIFF REFERENCE</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_TARIFF_REFERENCE'} }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-100 align-middle">
                                            <h6 class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">MAIN MANAGER</h6>
                                        </td>
                                        <td class="px-5 mb-0">{{ $ctlPort->{'PORT_MAIN_MANAGER'} }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Fill Following Fields</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-2" style="font-size: 93%;">
                        All fields are <b>mandatory</b>.
                    </div>

                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="vesselName">Vessel Name</label>
                        <input class="form-control" id="vesselName" type="text" value="" style="text-transform: uppercase;" />
                    </div>
                    
                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="vesselFlag">Vessel Flag <!--&nbsp;<span style="color:red; font-size: 105%;">*</span--></label>
                        <select class="form-select" id="vesselFlag">
                            <option value='Indonesia'>Indonesia</option>
                            <option value='Non-Indonesia'>Non-Indonesia</option>
                        </select>
                    </div>
          
                    <div class="mb-2" id="divVesselCountry" style="display:none;">
                        <label class="form-label" for="vesselCountry">Vessel Country <!--&nbsp;<span style="color:red; font-size: 105%;">*</span--></label>
                        <input class="form-control" id="vesselCountry" type="text" value="INDONESIA"  style="text-transform: uppercase;" />
                    </div>

                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="voyageNo">Voyage No.</label>
                        <input class="form-control" id="voyageNo" type="text" value="" style="text-transform: uppercase;" />
                    </div>
          
                    <div class="mb-2">
                        <label class="form-label" for="vesselGRT">Vessel GRT <!--&nbsp;<span style="color:red; font-size: 105%;">*</span--></label>
                        <input class="form-control numeric-input-no-sign" id="vesselGRT" type="text"   />
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="vesselDWT">Vessel DWT <!--&nbsp;<span style="color:red; font-size: 105%;">*</span--></label>
                        <input class="form-control numeric-input-no-sign" id="vesselDWT" type="text"   />
                    </div>
                    
          
                    <div class="mb-2">
                        <label class="form-label" for="vesselLOA">Vessel LOA in Meter</label>
                        <input class="form-control numeric-input-no-sign-decimal-2" id="vesselLOA" type="text"   />
                    </div>
          
                    <div class="mb-2">
                        <label class="form-label" for="cargoQtyMT">Cargo Qty MT</label>
                        <input class="form-control numeric-input-no-sign" id="cargoQtyMT" type="text"   />
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="vesselShipment">Shipment Type</label>
                        <select class="form-select" id="vesselShipment" >
                            <option value='Import/Export'>Import/Export</option>
                            <option value='Local (Domestic)'>Local (Domestic)</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="operation">Operation</label>
                        <select class="form-select" id="operation" >
                            @foreach($ctlRefOperation as $k => $value)
                                @if($value != "-" && $value != "")
                                    <option value='{{ $value }}'>{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2" style="display:none;">
                        <label class="form-label" for="note">Note</label>
                        <input class="form-control" id="note" type="text"/>
                    </div>
          
                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="eta">ETA</label>
                        <input class="form-control datetimepicker" id="eta" type="text" placeholder="yyyy-mm-dd" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' />
                    </div>
          
                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="etd">ETD</label>
                        <input class="form-control datetimepicker" id="etd" type="text" placeholder="yyyy-mm-dd" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' />
                    </div>
          
                    <div class="mb-2" style="display:none;">
                        <label class="form-label" for="currencyId">Currency</label>
                        <select class="form-select" id="currencyId" >
                            <option value='USD'>USD</option>    
                            <option value='IDR'>IDR</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" onclick="addToCart()">PROCEED</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif

        $('#vesselFlag').on('change', function() {
            if(this.value == "Indonesia"){
                $('#vesselCountry').val("INDONESIA")
                $('#divVesselCountry').css("display", "none");
            }
            else {
                $('#vesselCountry').val("")
                $('#divVesselCountry').css("display", "block");
            }
        });

        function addToCart() {
            var vesselName = $("#vesselName").val();
            var vesselCountry = $("#vesselCountry").val();
            var vesselFlag = $("#vesselFlag").val();
            var vesselGRT = $("#vesselGRT").autoNumeric("get");
            var vesselDWT = $("#vesselDWT").autoNumeric("get");
            var vesselLOA = $("#vesselLOA").autoNumeric("get");
            var cargoQtyMT = $("#cargoQtyMT").autoNumeric("get");
            var vesselShipment = $("#vesselShipment").val();
            var operation = $("#operation").val();
            var eta = $("#eta").val();
            var etd = $("#etd").val();
            var note = $("#note").val();
            var currencyId = $("#currencyId").val();
            var voyageNo = $("#voyageNo").val();
            
            if (vesselName == "") {
                toastr.error("Please input Vessel Name");
                return;
            }
            if(vesselCountry == "") {
                if(vesselFlag == "Indonesia") {
                    vesselCountry = "INDONESIA"
                }
                else {
                    toastr.error("Please input Vessel Country");
                    return;
                }
            }
            if (vesselGRT == "0" || vesselGRT.trim() == ""){
                toastr.error("Please input Vessel GRT");
                return;
            }
            if (vesselDWT == "0" || vesselDWT.trim() == ""){
                toastr.error("Please input Vessel DWT");
                return;
            }
            if (vesselLOA == "0" || vesselLOA.trim() == ""){
                toastr.error("Please input Vessel LOA");
                return;
            }
            if (cargoQtyMT == "0" || cargoQtyMT.trim() == ""){
                toastr.error("Please input Cargo Qty MT");
                return;
            }
            if (etd.trim() == ""){
                toastr.error("Please input ETD");
                return;
            }
            if (eta.trim() == ""){
                toastr.error("Please input ETA");
                return;
            }
            if (voyageNo.trim() == "") {
                toastr.error("Please input voyage number");
                return;
            }

            $("#modalForm").modal("hide")

            createOverlay("Processing...");
            $.ajax({
                type: "GET",
                url: "{{ base_url() }}/token",
                data: "",
                success: function(data) {
                    if (data["STATUS"] == "SUCCESS") {
                        let token = data["PAYLOAD"];

                        $.ajax({
                            type: "POST",
                            url: "{{ base_url() }}/ports/{{ $ctlPort->{'PORT_ID'} }}/add-to-cart",
                            data: {
                                "vesselName" : vesselName,
                                "vesselFlag" : vesselFlag,
                                "vesselCountry" : vesselCountry,
                                "vesselGRT": vesselGRT,
                                "vesselDWT" : vesselDWT,
                                "vesselLOA": vesselLOA,
                                "cargoQtyMT": cargoQtyMT,
                                "vesselShipment" : vesselShipment,
                                "operation" : operation,
                                "eta" : eta,
                                "etd" : etd,
                                "note" : note,
                                "currencyId" : currencyId,
                                "voyageNo" : voyageNo,
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                    setTimeout(function() {
                                        //window.location = "{{ base_url() }}/cart/" + data["PAYLOAD"];
                                        window.location = "{{ base_url() }}/cart";
                                    }, 500);
                                } 
                                else {
                                    $("#modalForm").modal("show");
                                    toastr.error(data["MESSAGE"]);
                                }
                            },
                            error: function(error) {
                                gOverlay.hide();
                                $("#modalForm").modal("show");
                                toastr.error("Network/server error\r\n" + error);
                            }
                        });
                    } 
                    else {
                        gOverlay.hide();
                        $("#modalForm").modal("show");
                        toastr.error(data["MESSAGE"]);
                    }
                },
                error: function(error) {
                    gOverlay.hide();
                    $("#modalForm").modal("show");
                    toastr.error("Network/server error " + error);
                }
            });
        }
    </script>
@endsection
