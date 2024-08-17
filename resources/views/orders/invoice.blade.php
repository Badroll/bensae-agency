@extends('jsb.layouts.app')

@section('title', ' Invoice')

@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders">Disbursements</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders/{{ md5($ctlOrderData->SalesOrderData->SO_ID) }}">#{{ ($ctlOrderData->SalesOrderData->SO_CODE) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>


        <br>
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-5">
                            <h3 class="card-title mb-0">Invoice #{{ $ctlOrderData->SalesOrderData->SO_INVOICE_CODE }}</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                                <th scope="col">USD</th>
                                <th scope="col">IDR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalBase = $ctlOrderData->InvoiceGrandTotalCurrencyBase;
                                $totalBaseStampDuty = $ctlOrderData->InvoiceGrandTotalCurrencyBaseWithStampDuty;
                                $totalForeign = $ctlOrderData->InvoiceGrandTotalCurrencyForeign;
                                $totalForeignStampDuty = $ctlOrderData->InvoiceGrandTotalCurrencyForeignWithStampDuty;

                                $stampDutyBase = $totalBaseStampDuty - $totalBase;
                                $stampDutyForeign = $totalForeignStampDuty - $totalForeign;

                                $totalBase = $totalBaseStampDuty > $totalForeignStampDuty ? $totalBaseStampDuty : $totalForeignStampDuty;
                                $totalForeign = $totalBaseStampDuty < $totalForeignStampDuty ? $totalBaseStampDuty : $totalForeignStampDuty;

                                $stampdutyBase = $stampDutyBase > $stampDutyForeign ? $stampDutyBase : $stampDutyForeign;
                                $stampDutyForeign = $stampDutyBase < $stampDutyForeign ? $stampDutyBase : $stampDutyForeign;
                                ?>
                                @if($ctlOrderData->InvoiceItems != null)
                                    @foreach($ctlOrderData->InvoiceItems as $category)                        
                                        <tr style="background: #e3e6ed;">
                                            <th>{{ $category->CATEGORY }}</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @if($category->SERVICE_DATA != null)
                                            @foreach($category->SERVICE_DATA as $service)
                                                <tr>
                                                    <th style="font-weight: initial !important;">{{ $service->SERVICE_NAME }}</th>
                                                    <?php
                                                        $idr = $service->SERVICE_INVOICE_AMOUNT_CURRENCY_BASE > $service->SERVICE_INVOICE_AMOUNT_CURRENCY_FOREIGN ? $service->SERVICE_INVOICE_AMOUNT_CURRENCY_BASE : $service->SERVICE_INVOICE_AMOUNT_CURRENCY_FOREIGN;
                                                        $usd = $service->SERVICE_INVOICE_AMOUNT_CURRENCY_BASE < $service->SERVICE_INVOICE_AMOUNT_CURRENCY_FOREIGN ? $service->SERVICE_INVOICE_AMOUNT_CURRENCY_BASE : $service->SERVICE_INVOICE_AMOUNT_CURRENCY_FOREIGN;
                                                    ?>
                                                    <td></td>
                                                    <td>{{ number_format($usd, 2, ".", ",") }}</td>
                                                    <td>{{ number_format($idr, 2, ".", ",") }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <?php
                                        $idr = ($category->CATEGORY_TOTAL_CURRENCY_BASE > $category->CATEGORY_TOTAL_CURRENCY_FOREIGN) ? $category->CATEGORY_TOTAL_CURRENCY_BASE : $category->CATEGORY_TOTAL_CURRENCY_FOREIGN;
                                        $usd = ($category->CATEGORY_TOTAL_CURRENCY_BASE < $category->CATEGORY_TOTAL_CURRENCY_FOREIGN) ? $category->CATEGORY_TOTAL_CURRENCY_BASE : $category->CATEGORY_TOTAL_CURRENCY_FOREIGN;
                                        ?>
                                        <tr>
                                            <th></th>
                                            <td><b>SUB TOTAL</b></td>
                                            <td>{{ number_format($usd, 2, ".", ",") }}</td>
                                            <td>{{ number_format($idr, 2, ".", ",") }}</td>
                                        </tr>
                                        @if($category->CATEGORY == "Taxables")
                                            <tr>
                                                <th></th>
                                                <td>STAMP & DUTY</td>
                                                <td>{{ number_format($stampDutyForeign, 2, ".", ",") }}</td>
                                                <td>{{ number_format($stampdutyBase, 2, ".", ",") }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr style="font-size : 105%;">
                                        <th></th>
                                        <td><b>GRAND TOTAL</b></td>
                                        <td><b>{{ number_format($totalForeign, 2, ".", ",") }}</b></td>
                                        <td><b>{{ number_format($totalBase, 2, ".", ",") }}</b></td>
                                    </tr>
                                    <tr style="font-size : 105%;">
                                        <th></th>
                                        <td><b>CONFIRMED PAYMENT</b></td>
                                        <td>
                                            @if($ctlOrderData->SalesOrderData->{"CURRENCY_ID"} == "USD")
                                                <b>{{ number_format($ctlOrderData->{"TotalPaymentCurrencyForeign"}, 2, ".", ",") }}</b>
                                            @endif
                                        </td>
                                        <td>
                                            @if($ctlOrderData->SalesOrderData->{"CURRENCY_ID"} == "IDR")
                                                <b>{{ number_format($ctlOrderData->{"TotalPaymentCurrencyBase"}, 2, ".", ",") }}</b>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="font-size : 105%;">
                                        <th></th>
                                        <td><b>AMOUNT DUE</b></td>
                                        <td>
                                            @if($ctlOrderData->SalesOrderData->{"CURRENCY_ID"} == "USD")
                                                <b>{{ number_format($ctlOrderData->{"TotalOutstandingCurrencyForeign"}, 2, ".", ",") }}</b>
                                            @endif
                                        </td>
                                        <td>
                                            @if($ctlOrderData->SalesOrderData->{"CURRENCY_ID"} == "idr")
                                                <b>{{ number_format($ctlOrderData->{"TotalOutstandingCurrencyBase"}, 2, ".", ",") }}</b>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-md-8">&nbsp;</div>
                            <div class="col-md-2">
                                <button class="btn btn-success w-100" onclick="window.location = '{{ base_url() }}/orders/{{ md5($ctlOrderData->SalesOrderData->SO_ID) }}/payment'">Payment Confirmation</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-phoenix-secondary w-100" onclick="window.location = '{{ base_url() }}/orders/{{ md5($ctlOrderData->SalesOrderData->SO_ID) }}/invoice/download'">Download Invoice</button>
                            </div>
                        </div>
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

        })

    </script>
@endsection
