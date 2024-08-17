@extends('jsb.layouts.app')

@section('title', ' Order')

@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders">Disbursements</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $ctlData->SO_CODE }}</li>
            </ol>
        </nav>

        <!-- <h3 class="mb-6">Order Details</h3> -->
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-3">
                            <h3 class="card-title mb-0">Order #{{ $ctlData->SO_CODE }}</h3>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-lg-12">
                                @if($ctlData->{'SO_DOCUMENT_STATUS'} == "Inquiry")
                                    <p style="font-size: 93%;">
                                        Below is your order details as <b>Proforma Disbursement</b> preview. Our staff will review your order ASAP. 
                                        During this process, it is possible for our staff to make any change on document status, order items or amount. 
                                        When this happens, our system will send you email notification regarding latest update on your order. 
                                    </p>
                                    <p style="font-size: 93%;">
                                        At this point, you may review this order, or download PDF version of this Proforma Disbursement by clicking <b>Download Proforma</b> button below.
                                        <br>
                                        You may also make prefunding payment to this order to our bank account as listed on PDF version of this document. To confirm your payment, click <b>Payment Confirmation</b> button at bottom of this page.
                                        <br>
                                        Any prefunding payment made will be recorded and used as deducting amount when invoice for this order is available.
                                    </p>
                                    <!-- <p style="font-size: 93%;">
                                        When you're done and agree on this Proforma Disbursement, appreciate to click <b>CONFIRM TO FINAL DISBURSEMENT</b> button on bottom if this page. This action will confirm that you have acknowledged and agreed on information provided here, and will proceed to Final Disbursement Account.
                                    </p> -->
                                @else
                                    <p style="font-size: 93%;">
                                        Below is your order details as <b>Proforma Disbursement</b>. This document has been updated to <b>Final Disbursement</b> at {{ tglInggris($ctlData->{"SO_DOCUMENT_STATUS_DATE"}, "SHORT") }}.
                                        <br>
                                        @if($ctlData->{'SO_DOCUMENT_STATUS'} == "Contract" && $ctlData->{"SO_INVOICE_CODE"} != "" && $ctlData->{"SO_INVOICE_CODE"} != "-")
                                            Invoice for this order is available. You may check it by clicking <b>Invoice Available</b> button below or by <a href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/invoice">this link</a>.
                                        @else
                                            Currently there is no invoice available for this order yet. Our system will send notification email when invoice is available, or you can check this page regularly.
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <!-- Vessel Name -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselName">Vessel Name</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control" id="vesselName" type="text" value=""  style="text-transform: uppercase;" disabled/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_NAME }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Vessel Flag -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselFlag">Vessel Flag</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <select class="form-select" id="vesselFlag" type="text" disabled }}>
                                            <option value='Indonesia'>Indonesia</option>
                                            <option value='Non-Indonesia'>Non-Indonesia</option>
                                            <option value='Vessel Flag TBD'>Vessel Flag TBD</option>
                                        </select>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_FLAG }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Vessel Country -->
                            <div class="col-md-4">
                                <div class="mb-2" id="divVesselCountry">
                                    <label class="form-label" for="vesselCountry">Vessel Country</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control" id="vesselCountry" type="text" style="text-transform: uppercase;" disabled />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_COUNTRY }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Vessel GRT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselGRT">Vessel GRT</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign" id="vesselGRT" type="text"  disabled/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_GRT }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Vessel LOA -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselLOA">Vessel LOA in Meter</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign-decimal-2" id="vesselLOA" type="text" disabled  />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_LOA }}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Vessel DWT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselDWT">Vessel DWT</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign" id="vesselDWT" type="text"  disabled/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_DWT }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Cargo Qty MT -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="cargoQtyMT">Cargo Qty MT</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign" id="cargoQtyMT" type="text"  disabled />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_CARGO_QTY_MT }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="note">Note</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control" id="note" type="text"  disabled/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_NOTE }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Currency -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="currencyId">Currency</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <select class="form-select" id="currencyId" disabled>
                                            <option value='USD'>USD</option>    
                                            <option value='IDR'>IDR</option>
                                        </select>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->CURRENCY_ID }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Ship Qty -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="shipQty">Ship Qty</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign" id="shipQty" type="text" style="text-align: center;" disabled  />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_SHIP_QTY }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tuggage Boat Qty -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="tuggageShipQty">Tuggage Boat Qty</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control numeric-input-no-sign" id="tuggageShipQty" type="text" style="text-align: center;" disabled  />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_TUGGAGE_SHIP_QTY }}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Shipment Type -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselShipment">Shipment Type</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <select class="form-select" id="vesselShipment" disabled>
                                            <option value='Import/Export'>Import/Export</option>
                                            <option value='Local (Domestic)'>Local (Domestic)</option>
                                        </select>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VESSEL_SHIPMENT }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Operation -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="operation">Operation</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <select class="form-select" id="operation" disabled>
                                            @foreach($ctlRefOperation as $k => $value)
                                                @if($value != "-" && $value != "")
                                                    <option value='{{ $value }}'>{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_OPERATION }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Voyage No. -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="voyageNo">Voyage No.</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control" id="voyageNo" type="text" style="text-transform: uppercase;" disabled />
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_VOYAGE_NO }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- ETA -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="eta">ETA</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control datetimepicker" id="eta" type="text" placeholder="yyyy-mm-dd hour:minute" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' style="text-align: center;" disabled/>
                                    @else 
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ tglInggris($ctlData->SO_ETA, 'SHORT') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- ETD -->
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label" for="etd">ETD</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control datetimepicker" id="etd" type="text" placeholder="yyyy-mm-dd hour:minute" data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}' style="text-align: center;" disabled/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ tglInggris($ctlData->SO_ETD, 'SHORT') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Duration (Days) -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label" for="durationDays">Duration (Days)</label>
                                    @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                        <input class="form-control" id="durationDays" type="text" disabled style="text-align: center;"/>
                                    @else
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlData->SO_DURATION_DAYS }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col-md-10">&nbsp;</div>
                            <div class="col-md-2">
                                <div class="font-sans-serif btn-reveal-trigger position-static">
                                    <button class="btn btn-info w-100 _btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        Actions&nbsp; <span class="fas fa-ellipsis-h fs--2"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/download">Download Proforma</a>

                                        @if($ctlData->{'SO_DOCUMENT_STATUS'} == "Contract" && $ctlData->{"SO_INVOICE_CODE"} != "" && $ctlData->{"SO_INVOICE_CODE"} != "-")    
                                            <a class="dropdown-item" href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/invoice">View Invoice</a>
                                        @else
                                            <a class="dropdown-item" href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/payment">Payment Confirmation</a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/attachment">Attachments</a>
                                        <!-- <a class="dropdown-item" href="{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/activity">Activities</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                                            
                        @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#vesselFlag").val("{{ $ctlData->SO_VESSEL_FLAG }}").trigger("change")
                                    $("#vesselCountry").val("{{ $ctlData->SO_VESSEL_COUNTRY }}")
                                    $("#vesselName").val("{{ $ctlData->SO_VESSEL_NAME }}")
                                    $("#vesselGRT").autoNumeric("set", "{{ $ctlData->SO_VESSEL_GRT }}")
                                    $("#vesselDWT").autoNumeric("set", "{{ $ctlData->SO_VESSEL_DWT }}")
                                    $("#vesselLOA").autoNumeric("set", "{{ $ctlData->SO_VESSEL_LOA }}")
                                    $("#cargoQtyMT").autoNumeric("set", "{{ $ctlData->SO_CARGO_QTY_MT }}")
                                    $("#voyageNo").val("{{ $ctlData->SO_VOYAGE_NO }}")
                                    $("#note").val("{{ $ctlData->SO_NOTE }}")
                                    $("#etd").val("{{ $ctlData->SO_ETD }}")
                                    $("#eta").val("{{ $ctlData->SO_ETA }}")
                                    $("#currencyId").val("{{ $ctlData->CURRENCY_ID }}")
                                    $("#durationDays").val("{{ $ctlData->SO_DURATION_DAYS }}")
                                    $("#shipQty").autoNumeric("set", "{{ $ctlData->SO_SHIP_QTY }}")
                                    $("#tuggageShipQty").autoNumeric("set", "{{ $ctlData->SO_TUGGAGE_SHIP_QTY }}")
                                    $("#shipment").val("{{ $ctlData->SO_VESSEL_SHIPMENT }}").trigger("change")
                                    $("#operation").val("{{ $ctlData->SO_OPERATION }}").trigger("change")
                                })                                
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-5">
                            <h3 class="card-title mb-0">Order Items</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Description</th>
                                <th scope="col">GRT</th>
                                <th scope="col">Tariff</th>
                                <th scope="col">Usage</th>
                                <th scope="col">{{ $ctlData->CURRENCY_ID }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandTotal = 0;
                                ?>
                                @if($ctlData->SERVICE_CATEGORY_DATA != null)
                                    @foreach($ctlData->SERVICE_CATEGORY_DATA as $ctg)
                                        <tr style="background: #e3e6ed;">
                                            <th>{{ $ctg }}</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @if($ctlData->SERVICE_DATA != null)
                                            @foreach($ctlData->SERVICE_DATA as $service)
                                                @if($service->SOSVC_SERVICE_CATEGORY == $ctg)
                                                    <tr style="">
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
                                                                            $icon = "";
                                                                            if($ctlData->{'SO_DOCUMENT_STATUS'} != "Contract"){
                                                                                $icon = "";
                                                                            }
                                                                            $html_usages .= '
                                                                                <span class="badge badge-phoenix fs--2 badge-phoenix-secondary py-1" style="cursor: pointer;"
                                                                                onclick="javascript:edit(\''. $tariff_detail->{"SOTRFDTL_ID"} .'\', \''. $tariff_detail->{"SOTRFDTL_VALUE"} .'\', \''. $tariff_detail->{"SOTRFDTL_LABEL"} .'\', \''. $tariff->{"SOTRF_NAME"} .'\', \''. $service->{"SOSVC_SERVICE"} .'\')">
                                                                                <span class="badge-label">'. $tariff_detail->{"SOTRFDTL_VALUE"} . ' x ' . $tariff_detail->{"SOTRFDTL_LABEL"} .'</span><span class="ms-1" data-feather="'. $icon .'" style="height:12.8px;width:12.8px;"></span></span>
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
                                                    <tr>
                                                        <th></th>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>SUB TOTAL</b></td>
                                                        <?php
                                                        $displayAmount = $ctlData->CURRENCY_ID == "IDR" ? $service->{"PROFORMA_AMOUNT_CURRENCY_BASE"} : $service->{"PROFORMA_AMOUNT_CURRENCY_FOREIGN"};
                                                        ?>
                                                        <td>{{ number_format($displayAmount, 2, ".", ",") }}</td>
                                                    </tr>
                                                    <?php
                                                    if($ctlData->{"CURRENCY_ID"} == "IDR") {
                                                        $grandTotal += $service->{"PROFORMA_AMOUNT_CURRENCY_BASE"};
                                                    }
                                                    else {
                                                        $grandTotal += $service->{"PROFORMA_AMOUNT_CURRENCY_FOREIGN"};
                                                    }
                                                    ?>
                                                @endif
                                            @endforeach
                                            
                                        @endif
                                    @endforeach
                                @endif
                                <tr style="font-size: 105%;">
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td><b>GRAND TOTAL</b></td>
                                    <td><b>{{ $ctlData->CURRENCY_ID }} {{ number_format($grandTotal, 2, ".", ",") }}</b></td>
                                </tr>
                                {{-- hanya tampil jika status masih 'Inquiry' --}}
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td><b>Prefunding Payments</b></td>
                                    <td><b>{{ $ctlData->CURRENCY_ID }} {{ number_format($ctlData->{"PAYMENT_TOTAL"}, 2, ".", ",") }}</b></td>
                                </tr>
                                @if($ctlData->{"SO_DOCUMENT_STATUS"} == "Inquiry")
                                    <tr style="background-color: #e3e3e3; font-size: 105%;">
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td><b>Outstanding</b></td>
                                        <td><b>{{ $ctlData->CURRENCY_ID }} {{ number_format($grandTotal - $ctlData->{"PAYMENT_TOTAL"}, 2, ".", ",") }}</b></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-md-8">&nbsp;</div>
                            <div class="col-md-2">
                                <button class="btn btn-info w-100" onclick="window.location = '{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/download'">Download Proforma</button>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    @if($ctlData->{'SO_DOCUMENT_STATUS'} == "Contract" && $ctlData->{"SO_INVOICE_CODE"} != "" && $ctlData->{"SO_INVOICE_CODE"} != "-")    
                                        <button class="btn btn-success w-100" onclick="window.location = '{{ base_url() }}/orders/{{ md5($ctlData->{'SO_ID'}) }}/invoice'">Invoice Available</button>
                                    @else
                                        <button class="btn btn-success _btn-phoenix-secondary w-100" onclick="window.location = window.location.href+'/payment'">Payment Confirmation</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 
                <div class="col-md-5">&nbsp;</div>
                <div class="col-3">
                    @if($ctlData->{'SO_DOCUMENT_STATUS'} != "Contract")
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#mdlConfirm" style="padding-top: 12px;padding-bottom: 12px;"><b>CONFIRM TO FINAL DISBURSEMENT</b><span class="fas fa-chevron-right ms-1 fs--2"></span></button>
                    @endif
                </div>
            --}}
        </div>

    </div><!-- end of .container-->
  
    <div class="modal fade" id="mdlConfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="staticBackdropLabel">CONFIRM TO FINAL DISBURSEMENT</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-700 lh-lg mb-0">This action will change document status to Final Disbursement Account on your behalf and cannot be undone. <br><br>Are you sure to confirm this order ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onClick="confirm()">CONFIRM</button>
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
            if("{{ $ctlData->{'SO_DOCUMENT_STATUS'} }}" == "Contract"){
                // just adding lilbit art
                var scrollPosition = localStorage.getItem('scrollPosition')
                if (scrollPosition !== null) {
                    window.scrollTo(0, scrollPosition)
                    localStorage.removeItem('scrollPosition')
                }
            }
        })

        function edit(id, value, label, tariff, service){
            return
            if("{{ $ctlData->{'SO_DOCUMENT_STATUS'} }}" == "Contract"){
                return
            }
            console.log(id)
            let edit = prompt("Enter new value for " + label + " in " + tariff + " Tariff - " + service, value);
            if (edit != null) {
                if (edit.trim() == ""){
                    toastr.error("Please enter valid value")
                    return
                }
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
                                url: "{{ base_url() }}/orders/update-usage",
                                data: {
                                    "soTrfDtlId": id,
                                    "soTrfDtlValue": edit,
                                    "_token": token
                                },
                                success: function(data) {
                                    gOverlay.hide();
                                    if (data["STATUS"] == "SUCCESS") {
                                        toastr.success(data["MESSAGE"]);
                                        setTimeout(function() {
                                            localStorage.setItem('scrollPosition', window.scrollY);
                                            // Melakukan reload halaman
                                            location.reload();
                                        }, 500);
                                    } else {
                                        toastr.error(data["MESSAGE"]);
                                    }
                                },
                                error: function(error) {
                                    gOverlay.hide();
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
        }

        function confirm() {
            $("#mdlConfirm").modal("hide");

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
                            url: "{{ base_url() }}/orders/contract",
                            data: {
                                "soIdHashed": "{{ md5($ctlData->{'SO_ID'}) }}",
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                    setTimeout(function() {
                                        location.reload();
                                    }, 500);
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
