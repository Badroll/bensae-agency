@extends('jsb.layouts.app')
@section('title', ' Invoice')
@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders">Disbursements</a></li>
                <li class="breadcrumb-item"><a href="{{ base_url() }}/orders/{{ md5($ctlOrder->SO_ID) }}">#{{ ($ctlOrder->SO_CODE) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Activities</li>
            </ol>
        </nav>

        <br>
        <div class="row g-5 mb-3">
            @if($ctlActivity != null)
                @foreach($ctlActivity as $key => $value)
                    <div class="timeline-item">
                        <div class="row g-md-3 align-items-center mb-8 mb-lg-10">
                            <div class="col-12 col-md-auto d-flex">
                                <div class="timeline-item-date text-end order-1 order-md-0 me-md-4">
                                    <p class="fs--2 fw-semi-bold text-700 mb-0">{{ tglInggris($value->SOACT_TIME_START, "SHORT") }}<br class="d-none d-md-block">{{ tglInggris($value->SOACT_TIME_END, "SHORT") }}</p>
                                </div>

                                <div class="timeline-item-bar position-relative me-3 me-md-0 border-400">
                                    <div class="icon-item icon-item-sm bg-success dark__bg-success"><span class="fa-solid fa-check text-white dark__text-white fs--2"></span></div>
                                    @if($key < len($ctlActivity) - 1)
                                        <span class="timeline-bar border-end border-success"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col">
                                <div class="timeline-item-content ps-6 ps-md-3">
                                    <h4>{{ $value->SOACT_TITLE }}</h4>
                                    <p class="fs--1 text-800 mb-0">{{ $value->SOACT_INFO }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="fs--1 text-800 mb-0"><i>- No activities -</i></p>
            @endif
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
