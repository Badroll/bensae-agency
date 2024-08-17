@extends('jsb.layouts.app')

@section('title', 'Order Preview')

@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/cart">Order Preview</a></li>
                <li class="breadcrumb-item active" aria-current="page">#{{ $ctlData->SALES_ORDER_DATA->SO_CODE }}</li>
            </ol>
        </nav>

        <h3 class="mb-6">Order Preview</h3>
        <div class="row mb-2">
            <div class="col-12 col-lg-12">
                <p style="font-size: 93%;">
                    Below is preview of your order details. Based on your previous entries, our system has calculated initial EPDA figures as presented below.
                    Any information presented in EPDA below are for initial preview only and subject to change.
                </p>
                <p style="font-size: 93%;">
                    You may change order header only, such as vessel information (name, operation, shipment type, etc), time information (ETA/ETD), and other related information.
                    Please be aware that changing some fields still may result in <b>different amount</b> on EPDA items and amount. 
                </p>
                <p style="font-size: 93%;">
                    Should you need to update some fields without checking out, just update fields needed and click <b>UPDATE INFORMATION ONLY</b>.
                    <br>
                    When you're done and ready to proceed, appreciate to click <b>UPDATE AND CHECKOUT</b>.
                </p>
            </div>
        </div>
        
        <!-- Order Header -->
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-3">
                            <h3 class="card-title mb-0">Document #{{ $ctlData->SALES_ORDER_DATA->SO_CODE }}</h3>
                        </div>

                        <div class="row">
                            <!-- Port --> 
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="portId">Port</label>
                                    <select class="form-select" id="portId" >
                                        @if(isset($ctlPorts) && count($ctlPorts) > 0)
                                            @foreach($ctlPorts as $aPort)
                                                <option value="{{ $aPort->{'PORT_ID'} }}">{{ $aPort->{"PORT_NAME"} }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Vessel Name -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselName">Vessel Name</label>
                                    <input class="form-control" id="vesselName" type="text" value=""  style="text-transform: uppercase;" />
                                </div>
                            </div>

                            <!-- Vessel Flag -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselFlag">Vessel Flag</label>
                                    <select class="form-select" id="vesselFlag">
                                        <option value='Indonesia'>Indonesia</option>
                                        <option value='Non-Indonesia'>Non-Indonesia</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Vessel Country -->
                            <div class="col-md-3">
                                <div class="mb-2" id="divVesselCountry" style="display:block;">
                                    <label class="form-label" for="vesselCountry">Vessel Country</label>
                                    <input class="form-control" id="vesselCountry" type="text" value="INDONESIA" style="text-transform: uppercase;" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Vessel GRT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselGRT">Vessel GRT</label>
                                    <input class="form-control numeric-input-no-sign" id="vesselGRT" type="text" />
                                </div>
                            </div>

                            <!-- Vessel LOA -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselLOA">Vessel LOA in Meter</label>
                                    <input class="form-control numeric-input-no-sign-decimal-2" id="vesselLOA" type="text"   />
                                </div>
                            </div>
                            
                            <!-- Vessel DWT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselDWT">Vessel DWT</label>
                                    <input class="form-control numeric-input-no-sign" id="vesselDWT" type="text"  />
                                </div>
                            </div>

                            <!-- Cargo Qty MT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="cargoQtyMT">Cargo Qty MT</label>
                                    <input class="form-control numeric-input-no-sign" id="cargoQtyMT" type="text"   />
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="note">Note</label>
                                    <input class="form-control" id="note" type="text"   />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Currency -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="currencyId">Currency</label>
                                    <select class="form-select" id="currencyId" >
                                        <option value='USD'>USD</option>    
                                        <option value='IDR'>IDR</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Ship Qty -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="shipQty">Ship Qty</label>
                                    <input class="form-control numeric-input-no-sign" id="shipQty" type="text" style="text-align: center;" disabled  />
                                </div>
                            </div>

                            <!-- Tuggage Boat Qty -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="tuggageShipQty">Tuggage Boat Qty</label>
                                    <input class="form-control numeric-input-no-sign" id="tuggageShipQty" type="text" style="text-align: center;"   />
                                </div>
                            </div>
                            
                            <!-- Shipment Type -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselShipment">Shipment Type</label>
                                    <select class="form-select" id="vesselShipment" >
                                        <option value='Import/Export'>Import/Export</option>
                                        <option value='Local (Domestic)'>Local (Domestic)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Operation -->
                            <div class="col-md-4">
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
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Voyage No. -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="voyageNo">Voyage No.</label>
                                    <input class="form-control" id="voyageNo" type="text" style="text-transform: uppercase;"  />
                                </div>
                            </div>

                            <!-- ETA -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="eta">ETA</label>
                                    <input class="form-control datetimepicker" id="eta" type="text" placeholder="yyyy-mm-dd hour:minute" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' style="text-align: center;"/>
                                </div>
                            </div>

                            <!-- ETD -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="etd">ETD</label>
                                    <input class="form-control datetimepicker" id="etd" type="text" placeholder="yyyy-mm-dd hour:minute" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' style="text-align: center;"/>
                                </div>
                            </div>

                            <!-- Duration (Days) -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="durationDays">Duration (Days)</label>
                                    <input class="form-control" id="durationDays" type="text" disabled style="text-align: center;"/>
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <button onClick="update(false)" class="btn btn-primary w-100">UPDATE INFORMATION ONLY<span class="fas fa-chevron-right ms-1 fs--2"></span></button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#mdlConfirm">UPDATE AND CHECKOUT<span class="fas fa-chevron-right ms-1 fs--2"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Order Preview Items -->
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-5">
                            <h3 class="card-title mb-0">Order Preview Items</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Description</th>
                                <th scope="col">GRT</th>
                                <th scope="col">Tariff</th>
                                <th scope="col">Usage</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($ctlData->SALES_ORDER_DATA->SERVICE_DATA != null)
                                    @foreach($ctlData->SALES_ORDER_DATA->SERVICE_DATA as $service)
                                        <tr style="background: #e3e6ed;">
                                            <th>{{ $service->SOSVC_SERVICE }}</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @if($service->ORDER_TARIFF_DATA != null)
                                            @foreach($service->ORDER_TARIFF_DATA as $tariff)
                                                <tr>
                                                    <th style="font-weight: initial !important;">{{ $tariff->SOTRF_NAME }} Tariff</th>
                                                    <?php
                                                        $GRT = 1;
                                                        $html_usages = '';
                                                        if($tariff->{"TARIFF_DETAIL_DATA"} != null){
                                                            foreach($tariff->{"TARIFF_DETAIL_DATA"} as $tariff_detail){
                                                                if($tariff_detail->{"SOTRFDTL_LABEL"} == "GRT"){
                                                                    $GRT = $tariff_detail->{"SOTRFDTL_VALUE"};
                                                                }
                                                                else{
                                                                    $html_usages .= '
                                                                        <span class="badge badge-phoenix fs--2 badge-phoenix-secondary py-1"><span class="badge-label">'. $tariff_detail->{"SOTRFDTL_VALUE"} . ' x ' . $tariff_detail->{"SOTRFDTL_LABEL"} .'</span></span>
                                                                    ';
                                                                }

                                                            }
                                                        }
                                                    ?>
                                                    <td>{{ number_format($GRT, 2, ".", ",") }}</td>
                                                    <td>{{ $tariff->SOTRF_VALUE_CURRENCY_ID }} {{ number_format($tariff->SOTRF_VALUE, 2, ".", ",") }}</td>
                                                    <td>{!! $html_usages !!}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <?php
                                        $idr = ($service->PROFORMA_AMOUNT_CURRENCY_BASE > $service->PROFORMA_AMOUNT_CURRENCY_FOREIGN) ? $service->PROFORMA_AMOUNT_CURRENCY_BASE : $service->PROFORMA_AMOUNT_CURRENCY_FOREIGN;
                                        $usd = ($service->PROFORMA_AMOUNT_CURRENCY_BASE < $service->PROFORMA_AMOUNT_CURRENCY_FOREIGN) ? $service->PROFORMA_AMOUNT_CURRENCY_BASE : $service->PROFORMA_AMOUNT_CURRENCY_FOREIGN;
                                        ?>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td><b>SUB TOTAL</b></td>
                                            <?php
                                            $displayAmount = $ctlData->SALES_ORDER_DATA->CURRENCY_ID == "IDR" ? $idr : $usd;
                                            ?>
                                            <td><b>{{ $ctlData->SALES_ORDER_DATA->CURRENCY_ID }} {{ number_format($displayAmount, 2, ".", ",") }}</b></td>
                                        </tr>
                                    @endforeach
                                    <?php
                                    $idr = ($ctlData->CART_VALUE_CURRENCY_BASE > $ctlData->CART_VALUE_CURRENCY_FOREIGN) ? $ctlData->CART_VALUE_CURRENCY_BASE : $ctlData->CART_VALUE_CURRENCY_FOREIGN;
                                    $usd = ($ctlData->CART_VALUE_CURRENCY_BASE < $ctlData->CART_VALUE_CURRENCY_FOREIGN) ? $ctlData->CART_VALUE_CURRENCY_BASE : $ctlData->CART_VALUE_CURRENCY_FOREIGN;
                                    ?>
                                    <tr style="font-size: 110%;">
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td><b>GRAND TOTAL</b></td>
                                        <?php
                                        $displayAmount = $ctlData->SALES_ORDER_DATA->CURRENCY_ID == "IDR" ? $idr : $usd;
                                        ?>
                                        <td><b>{{ $ctlData->SALES_ORDER_DATA->CURRENCY_ID }} {{ number_format($displayAmount, 2, ".", ",") }}</b></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
    
    <div class="modal fade" id="mdlConfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="staticBackdropLabel">CONFIRM CHECKOUT</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-700 lh-lg mb-0">This action will confirm the order upon your approval for confirming the official order to Port Quanta and will take immediate action accordingly.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onClick="update(true)">CONFIRM</button>
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCEL</button>
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
        
        $(document).ready(function() {
            $("#portId").val("{{ $ctlData->SALES_ORDER_DATA->PORT_ID }}").trigger("change");
            $("#vesselFlag").val("{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_FLAG }}").trigger("change")
            $("#vesselCountry").val("{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_COUNTRY }}")
            $("#vesselName").val("{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_NAME }}")
            $("#vesselGRT").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_GRT }}")
            $("#vesselDWT").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_DWT }}")
            $("#vesselLOA").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_LOA }}")
            $("#cargoQtyMT").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_CARGO_QTY_MT }}")
            $("#voyageNo").val("{{ $ctlData->SALES_ORDER_DATA->SO_VOYAGE_NO }}");
            $("#note").val("{{ $ctlData->SALES_ORDER_DATA->SO_NOTE }}")
            $("#etd").val("{{ $ctlData->SALES_ORDER_DATA->SO_ETD }}")
            $("#eta").val("{{ $ctlData->SALES_ORDER_DATA->SO_ETA }}")
            $("#currencyId").val("{{ $ctlData->SALES_ORDER_DATA->CURRENCY_ID }}")
            $("#durationDays").val("{{ $ctlData->SALES_ORDER_DATA->SO_DURATION_DAYS }}")
            $("#shipQty").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_SHIP_QTY }}")
            $("#tuggageShipQty").autoNumeric("set", "{{ $ctlData->SALES_ORDER_DATA->SO_TUGGAGE_SHIP_QTY }}")
            $("#shipment").val("{{ $ctlData->SALES_ORDER_DATA->SO_VESSEL_SHIPMENT }}").trigger("change")
            $("#operation").val("{{ $ctlData->SALES_ORDER_DATA->SO_OPERATION }}").trigger("change")

            $("#eta").on("change", function(){
                var eta = $("#eta").val().replaceAll("+", " ")
                var etd = $("#etd").val().replaceAll("+", " ")
                var days = calculateDurationDays(eta, etd, "durationDays")
            })
            $("#etd").on("change", function(){
                var eta = $("#eta").val().replaceAll("+", " ")
                var etd = $("#etd").val().replaceAll("+", " ")
                var days = calculateDurationDays(eta, etd, "durationDays")
            })

            $('#vesselFlag').on('change', function() {
                if(this.value == "Indonesia"){
                    $('#vesselCountry').val("INDONESIA")
                    $('#vesselCountry').attr("disabled", "");
                    //$('#divVesselCountry').css("display", "none")
                }
                else {
                    $('#vesselCountry').val("")
                    $('#vesselCountry').removeAttr("disabled")
                    //$('#divVesselCountry').css("display", "block")
                }
            })
        })
        
        function update(flagContinueCheckOut) {
            var portId = $("#portId").val()
            var vesselFlag = $("#vesselFlag").val()
            var vesselCountry = $("#vesselCountry").val()
            var vesselName = $("#vesselName").val()
            var vesselGRT = $("#vesselGRT").autoNumeric("get")
            var vesselDWT = $("#vesselDWT").autoNumeric("get")
            var vesselLOA = $("#vesselLOA").autoNumeric("get")
            var cargoQtyMT = $("#cargoQtyMT").autoNumeric("get")
            var note = $("#note").val()
            var etd = $("#etd").val()
            var eta = $("#eta").val()
            var currencyId = $("#currencyId").val()
            var durationDays = $("#durationDays").val()
            var shipQty = $("#shipQty").autoNumeric("get")
            var tuggageShipQty  = $("#tuggageShipQty").autoNumeric("get")
            var vesselShipment = $("#vesselShipment").val()
            var operation = $("#operation").val()
            var voyageNo = $("#voyageNo").val()

            if (vesselName.trim() == "" || vesselName.toLowerCase() == "vessel name tbd"){
                toastr.error("Please input Vessel Name")
                return
            }
            if ((vesselFlag.toLowerCase() == "non-indonesia" && vesselCountry.trim() == "") || vesselFlag.toLowerCase() == "vessel flag tbd"){
                toastr.error("Please input Vessel Flag and Vessel Country")
                return
            }
            if (vesselGRT == "0" || vesselGRT.trim() == ""){
                toastr.error("Please input Vessel GRT")
                return
            }
            if (vesselDWT == "0" || vesselDWT.trim() == ""){
                toastr.error("Please input Vessel DWT")
                return
            }
            if (vesselLOA == "0" || vesselLOA.trim() == ""){
                toastr.error("Please input Vessel LOA")
                return
            }

            //auto adjust value
            if (shipQty == "0" || shipQty.trim() == ""){
                shipQty = "1"
                $("#shipQty").autoNumeric("set", 1)
            }

            //auto adjust value
            if (tuggageShipQty == "0" || tuggageShipQty.trim() == ""){
                $("#tuggageShipQty").autoNumeric("set", 1)
            }
            if (cargoQtyMT == "0" || cargoQtyMT.trim() == ""){
                toastr.error("Please input Cargo Qty")
                return
            }
            if (etd.trim() == ""){
                toastr.error("Please input ETD")
                return
            }
            if (eta.trim() == ""){
                toastr.error("Please input ETA")
                return
            }

            if(flagContinueCheckOut) {
                $("#mdlConfirm").modal("hide");
            }
            
            etd = etd.replaceAll("+", " ")
            eta = eta.replaceAll("+", " ")

            createOverlay("Processing...");
            $.ajax({
                type: "GET",
                url: "{{ base_url() }}/token",
                data: "",
                success: function(data) {
                    if (data["STATUS"] == "SUCCESS") {
                        var token = data["PAYLOAD"];

                        $.ajax({
                            type: "POST",
                            url: "{{ base_url() }}/cart/update",
                            data: {
                                "cartId" : "{{ md5($ctlData->{'CART_ID'}) }}",
                                "portId" : portId,
                                "vesselFlag": vesselFlag,
                                "vesselCountry": vesselCountry.toUpperCase(),
                                "vesselName" : vesselName.toUpperCase(),
                                "vesselGRT": vesselGRT,
                                "vesselDWT" : vesselDWT,
                                "vesselLOA": vesselLOA,
                                "cargoQtyMT" : cargoQtyMT,
                                "vesselShipment" : vesselShipment,
                                "operation" : operation,
                                "voyageNo" : voyageNo.toUpperCase(),
                                "note": note,
                                "etd": etd,
                                "eta": eta,
                                "currencyId": currencyId,
                                "tuggageShipQty": tuggageShipQty,
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);

                                    if(flagContinueCheckOut) {
                                        processCheckoutById();
                                    }
                                    else {
                                        window.location.reload();
                                    }
                                } 
                                else {
                                    if(flagContinueCheckOut) {
                                        $("#mdlConfirm").modal("show");
                                    }
                                    toastr.error(data["MESSAGE"]);
                                }
                            },
                            error: function(error) {
                                gOverlay.hide();
                                if(flagContinueCheckOut) {
                                    $("#mdlConfirm").modal("show");
                                }
                                toastr.error("Network/server error\r\n" + error);
                            }
                        });
                    } else {
                        gOverlay.hide();
                        toastr.error(data["MESSAGE"]);
                    }
                },
                error: function(error) {
                    gOverlay.hide();
                    toastr.error("Network/server error " + error);
                }
            });
        }

        function processCheckoutById(){
            createOverlay("Processing...");
            $.ajax({
                type: "GET",
                url: "{{ base_url() }}/token",
                data: "",
                success: function(data) {
                    if (data["STATUS"] == "SUCCESS") {
                        var token = data["PAYLOAD"];

                        $.ajax({
                            type: "POST",
                            url: "{{ base_url() }}/cart/checkout/{{ md5($ctlData->CART_ID) }}",
                            data: {
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                    window.location = "{{ base_url() }}/orders";
                                } 
                                else {
                                    $("#mdlConfirm").modal("show");
                                    toastr.error(data["MESSAGE"]);
                                }
                            },
                            error: function(error) {
                                gOverlay.hide();
                                $("#mdlConfirm").modal("show");
                                toastr.error("Network/server error\r\n" + error);
                            }
                        });
                    } 
                    else {
                        gOverlay.hide();
                        $("#mdlConfirm").modal("show");
                        toastr.error(data["MESSAGE"]);
                    }
                },
                error: function(error) {
                    gOverlay.hide();
                    $("#mdlConfirm").modal("show");
                    toastr.error("Network/server error " + error);
                }
            });
        }
    </script>
@endsection
