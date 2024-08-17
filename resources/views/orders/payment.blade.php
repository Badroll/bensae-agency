@extends('jsb.layouts.app')

@section('title', ' Invoice')

@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders">Disbursements</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders/{{ md5($ctlInvoice->SalesOrderData->SO_ID) }}">#{{ ($ctlInvoice->SalesOrderData->SO_CODE) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Confirmation</li>
            </ol>
        </nav>

        <!-- <h3 class="mb-6">Payment Confirmation</h3> -->
        
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-3">
                            <h3 class="card-title mb-0">Bank Account Information</h3>
                        </div>

                        <div class="row mb-2">
                            <p style="font-size: 90%;">
                                Please use following bank account information upon payment
                            </p>
                        </div>

                        <div class="row">
                            <!-- Bank Name -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselName">Bank Name/Swift Code</label>
                                    <div style="padding-left: 1rem;" class="fw-bold">PT. BANK MANDIRI (PERSERO) Tbk./BMRIIDJA</div>
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label" for="vesselFlag">Account Number</label>
                                    <div style="padding-left: 1rem;" class="fw-bold">165-00-0240611-5</div>
                                </div>
                            </div>

                            <!-- Beneficiary -->
                            <div class="col-md-4">
                                <div class="mb-2" id="divVesselCountry">
                                    <label class="form-label" for="vesselCountry">Beneficiary</label>
                                    <div style="padding-left: 1rem;" class="fw-bold">PT. JANGKAR SAMPURAN BERKAT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($ctlInvoice->SalesOrderData->SO_DOCUMENT_STATUS == "Contract" && $ctlInvoice->SalesOrderData->SO_INVOICE_CODE != "" && $ctlInvoice->SalesOrderData->SO_INVOICE_CODE != "-")
            <div class="row g-5">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-between-center mb-3">
                                <h4 class="card-title mb-0">Invoice #{{ $ctlInvoice->SalesOrderData->SO_INVOICE_CODE }}</h4>
                            </div>

                            <div class="row">
                                <!-- Currency -->
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlInvoice->SalesOrderData->CURRENCY_ID }}</div>
                                    </div>
                                </div>

                                <!-- Billed Amount -->
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label" for="vesselFlag">Billed Amount</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->InvoiceGrandTotalCurrencyBaseWithStampDuty,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->InvoiceGrandTotalCurrencyForeignWithStampDuty,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Paid Amount -->
                                <div class="col-md-3">
                                    <div class="mb-2" id="divVesselCountry">
                                        <label class="form-label" for="vesselCountry">Paid Amount</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->TotalPaymentCurrencyBase,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->TotalPaymentCurrencyForeign,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Amount Due -->
                                <div class="col-md-3">
                                    <div class="mb-2" id="divVesselCountry">
                                        <label class="form-label" for="vesselCountry">Amount Due</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->TotalOutstandingCurrencyBase,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->TotalOutstandingCurrencyForeign,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row g-5">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-between-center mb-3">
                                <h4 class="card-title mb-0">Proforma Invoice #{{ $ctlInvoice->SalesOrderData->SO_CODE }}</h4>
                            </div>

                            <div class="row">
                                <!-- Currency -->
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">{{ $ctlInvoice->SalesOrderData->CURRENCY_ID }}</div>
                                    </div>
                                </div>

                                <!-- Billed Amount -->
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label" for="vesselFlag">Billed Amount</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->InvoiceGrandTotalCurrencyBaseWithStampDuty,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->InvoiceGrandTotalCurrencyForeignWithStampDuty,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Paid Amount -->
                                <div class="col-md-3">
                                    <div class="mb-2" id="divVesselCountry">
                                        <label class="form-label" for="vesselCountry">Paid Amount</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->TotalPaymentCurrencyBase,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->TotalPaymentCurrencyForeign,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Amount Due -->
                                <div class="col-md-3">
                                    <div class="mb-2" id="divVesselCountry">
                                        <label class="form-label" for="vesselCountry">Amount Due</label>
                                        <div style="padding-left: 1rem;" class="fw-bold">
                                            @if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR")
                                                {{ number_format($ctlInvoice->TotalOutstandingCurrencyBase,2,'.',',') }}
                                            @else
                                                {{ number_format($ctlInvoice->TotalOutstandingCurrencyForeign,2,'.',',') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <br>
        <div class="row mb-2">
            <p style="font-size: 90%;">
                Please attach/upload payment confirmation proof using form below. Payment will be filed automatically under <b>#{{ ($ctlInvoice->SalesOrderData->SO_CODE) }}</b>.
                <br>
                Upon successful submission, our staff may need some time to verify your payment and update your account balance.
            </p>
        </div>

        <div class="row g-5 pt-3">
            <div class="col-md-3">
                <div class="mb-2">
                    <label class="form-label" for="payment">Payment Date</label>
                    <input class="form-control datetimepicker" id="payment" type="text" placeholder="yyyy-mm-dd" data-options='{"enableTime":false,"dateFormat":"Y-m-d","disableMobile":true}' />
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-2">
                    <label class="form-label" for="bank">Bank Name</label>
                    <input class="form-control" id="bank" type="text" style="text-transform: uppercase;"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-2">
                    <label class="form-label" for="account">Account Name</label>
                    <input class="form-control" id="account" type="text" style="text-transform: uppercase;" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-2">
                    <?php
                    $format = "usd";
                    if($ctlInvoice->SalesOrderData->CURRENCY_ID == "IDR"){
                        $format = "idr";
                    }
                    ?>
                    <label class="form-label" for="amount">Amount</label>
                    <input class="form-control numeric-input-{{ $format }}" id="amount" type="text" />
                </div>
            </div>
        </div>

        <div class="row g-5 pt-2">
            <div class="col-12 col-lg-12">
                <div class="dropzone dropzone-multiple p-0" id="dropzone" data-dropzone="data-dropzone" data-options='{"url":"{valid/url}","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                    <div class="fallback">
                        <input type="file" id="file" name="file" accept="image/png,image/jpg,image/jpeg,application/pdf"/>
                    </div>
                    <div class="dz-message" data-dz-message="data-dz-message">
                        <div class="dz-message-text"><img class="me-2" src="../../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Drop attachment file here (PDF/JPG/PNG)</div>
                    </div>
                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                        <div class="d-flex pb-3 border-bottom media px-2">
                            <div class="border border-300 p-2 rounded-2 me-2"><img id="file-preview" class="rounded-2 dz-image" src="../../../assets/img/icons/file.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                            <div class="flex-1 d-flex flex-between-center">
                                <div>
                                    <h6 data-dz-name="data-dz-name"></h6>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                    </div>
                                    <span class="fs--2 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                                </div>
                                
                                <div class="dropdown font-sans-serif">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-2">
            <div class="col-md-10">&nbsp;</div>
            <div class="col-md-2">
                <button onClick="upload()" class="btn btn-primary w-100">UPLOAD<span class="fas fa-chevron-right ms-1 fs--2"></span></button>
            </div>
        </div>
        <hr>
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-5">
                            <h3 class="card-title mb-0">Payment History for #{{ ($ctlInvoice->SalesOrderData->SO_CODE) }}</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Payment Code</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Confirm Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($ctlInvoice->Payments) && count($ctlInvoice->Payments) > 0)
                                    <?php
                                    $totalConfirmed = 0;
                                    ?>
                                    @foreach($ctlInvoice->Payments as $value)
                                        <?php
                                        if($value->{"SOPAY_CONFIRMED_AT"} != "0000-00-00 00:00:00") {
                                            $totalConfirmed += $value->{"SOPAY_AMOUNT"};
                                        }
                                        ?>
                                        <tr>
                                            <td>{{ tglInggris($value->{"SOPAY_DATE"},"SHORT") }}</td>
                                            <td>{{ $value->{"SOPAY_CODE"} }}</td>
                                            <td>{{ $value->{"CURRENCY_ID"} }}</td>
                                            <td>{{ number_format($value->{"SOPAY_AMOUNT"},2,'.',',') }}</td>
                                            <td>{{ tglInggris($value->{"SOPAY_CONFIRMED_AT"},"SHORT") }}</td>
                                        </tr>
                                    @endforeach
                                    <tr style="background-color: #e3e3e3">
                                        <td>&nbsp;</td>
                                        <td><b>Total Confirmed Payment</b></td>
                                        <td><b>{{ $value->{"CURRENCY_ID"} }}</b></td>
                                        <td><b>{{ number_format($totalConfirmed,2,'.',',') }}</b></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end of .container-->
@endsection

@section('script')
    <script type="text/javascript">
        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif

        $(document).ready(function() {
            //document.getElementById("dropzone").addEventListener("change", handleFileSelect, false);
        })

        var gBase64String = "";
        var gMIMEType = "";
        function handleFileSelect(evt) {
            var f = evt.target.files[0]; // FileList object
            var reader = new FileReader();
            
            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    var binaryData = e.target.result;
                    //Converting Binary Data to base 64
                    gBase64String = window.btoa(binaryData);
                    
                    //showing file converted to base64
                    console.log("gBase64String : " + gBase64String);
                };
            })(f);
            
            // Read in the image file as a data URL.
            reader.readAsBinaryString(f);

            console.log("f.type : " + f.type);
            if(f.type != "image/png" && f.type != "image/jpg" && f.type != "image/jpeg" && f.type != "application/pdf") {
                toastr.error("Please attach valid image or PDF file");
                return;
            }

            gMIMEType = f.type;
        }

        function upload(){
            var payment = $("#payment").val()
            var bank = $("#bank").val()
            var account = $("#account").val()
            var amount = $("#amount").autoNumeric("get")
            var file = $("#file-preview").attr("src")
            console.log("file : " + file)

            // if (gBase64String == "" || gMIMEType == "") {
            //     toastr.error("Please attach file")
            //     return   
            // }

            if (payment.trim() == ""){
                toastr.error("Please input payment date")
                return
            }
            if (bank.trim() == ""){
                toastr.error("Please input bank name")
                return
            }
            if (account.trim() == ""){
                toastr.error("Please input account name")
                return
            }
            if (typeof(file) == "undefined" || file.trim() == ""){
                toastr.error("Please attach file")
                return
            }
            if(amount == 0){
                toastr.error("Please input amount")
                return
            }
            payment = payment.replaceAll("+", " ")

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
                            url: window.location.href + "-save",
                            data: {
                                "paymentDate": payment,
                                "bankName": bank.toUpperCase(),
                                "accountName" : account.toUpperCase(),
                                "attachment": file,
                                "attachmentBase64" : gBase64String,
                                "attachmentMIMEType" : gMIMEType,
                                "amount": amount,
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                    window.location.reload()
                                }
                                else {
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
    </script>
@endsection
