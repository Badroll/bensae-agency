@extends('jsb.layouts.app')

@section('title', ' Account Balance')

@section('content')
    <div class="container-small cart py-3" style="margin-top: 1rem !important;">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account Balance</li>
            </ol>
        </nav>

        <br>
        <div class="row g-5">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-5">
                            <h3 class="card-title mb-0">In USD</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Note</th>
                                <th scope="col">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($ctlData->USD != null)
                                    @foreach($ctlData->USD as $value)
                                        <tr>
                                            <td>{{ tglInggris($value->Date, "LONG") }}</td>
                                            <td>{{ number_format($value->Amount, 2, ".", ",") }}</td>
                                            <td>{{ $value->Note }}</td>
                                            <td><b>{{ number_format($value->Balance, 2, ".", ",") }}</b></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <br>
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
                            <h3 class="card-title mb-0">In IDR</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Note</th>
                                <th scope="col">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($ctlData->IDR != null)
                                    @foreach($ctlData->IDR as $value)
                                        <tr>
                                            <td>{{ tglInggris($value->Date, "LONG") }}</td>
                                            <td>{{ number_format($value->Amount, 2, ".", ",") }}</td>
                                            <td>{{ $value->Note }}</td>
                                            <td><b>{{ number_format($value->Balance, 2, ".", ",") }}</b></td>
                                        </tr>
                                    @endforeach
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

        })

    </script>
@endsection
