@extends('layouts.app')
@section('title', ' Permohonan')
@section('content')

@php
    $isEdit = $MODE == "EDIT" ? true : false;
    if(!$isEdit){
        $ID = 0;
    }
@endphp

<div class="container-small cart">
	<!-- <nav class="mb-2" aria-label="breadcrumb">
		<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="#!">Page 1</a></li>
			<li class="breadcrumb-item"><a href="#!">Page 2</a></li>
			<li class="breadcrumb-item active" aria-current="page">Default</li>
		</ol>
	</nav> -->
    @if($isEdit)
        <h2 class="mb-5">Edit Permohonan <b>#PM-01</b><span class="text-700 fw-normal ms-2">.</span></h2>
    @else
        <h2 class="mb-5">Buat Permohonan Baru<span class="text-700 fw-normal ms-2">.</span></h2>
    @endif
	<div class="card shadow-none border border-300 my-4" data-component-card="data-component-card">
		<div class="card-header p-4 border-bottom border-300 bg-soft">
			<div class="row g-3 justify-content-between align-items-center">
				<div class="col-12 col-md">
					<h4 class="text-900 mb-0" data-anchor="data-anchor">Form Input Permohonan</h4>
				</div>
				<div class="col col-md-auto">
					<nav class="nav nav-underline justify-content-end doc-tab-nav align-items-center" role="tablist">
						<!-- <button class="btn btn-link px-2 text-900 copy-code-btn" type="button"><span class="fas fa-copy me-1"></span>Copy Code</button>
                        <a class="btn btn-sm btn-phoenix-primary preview-btn ms-2">
                            <span class="me-2" data-feather="eye"></span>Preview
                        </a> -->
					</nav>
				</div>
			</div>
		</div>
		<div class="card-body p-0">
			<div class="p-4 code-to-copy">
				<form class="row g-3">
                    <!--  -->
					<div class="col-md-4">
                        <label class="form-label" for="tanggal">Tanggal</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="sponsor">Sponsor</label>
						<select class="form-select custom-choices" id="sponsor">
                            @php $prefix = "SPONSOR_"; @endphp
                            @foreach($MASTER_SPONSOR as $k => $v)
                                <option value="{{ $v->{$prefix . 'ID'} }}">{{ $v->{$prefix . 'NAMA'} }}</option>
                            @endforeach
                        </select>
					</div>
					<div class="col-md-4">
						<label class="form-label" for="nama">Nama</label>
						<input class="form-control" id="nama" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-3">
						<label class="form-label" for="proses">Proses</label>
						<select class="form-select custom-choices" id="proses">
                            @php $prefix = "PROSES_"; @endphp
                            @foreach($MASTER_PROSES as $k => $v)
                                <option value="{{ $v->{$prefix . 'ID'} }}">{{ $v->{$prefix . 'NAMA'} }}</option>
                            @endforeach
                        </select>
					</div>
					<div class="col-md-3">
						<label class="form-label" for="wilayah">Wilayah Kanim</label>
						<select class="form-select custom-choices" id="wilayah">
                            @php $prefix = "WILAYAH_"; @endphp
                            @foreach($MASTER_WILAYAH as $k => $v)
                                <option value="{{ $v->{$prefix . 'ID'} }}">{{ $v->{$prefix . 'NAMA'} }}</option>
                            @endforeach
                        </select>
					</div>
                    <div class="col-md-3">
						<label class="form-label" for="ita_jenis">Jenis Izin Tinggal Awal</label>
						<select class="form-select custom-choices" id="ita_jenis">
                            @php $prefix = "JENIS_"; @endphp
                            @foreach($MASTER_JENIS as $k => $v)
                                <option value="{{ $v->{$prefix . 'ID'} }}">{{ $v->{$prefix . 'NAMA'} }}</option>
                            @endforeach
                        </select>
					</div>
                    <div class="col-md-3">
						<label class="form-label" for="ita_exp">Expired</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="ita_exp" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <hr>
                    <!--  -->
					<div class="col-md-4">
						<label class="form-label" for="kirim_tim">Kirim Tim</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="kirim_tim" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="rptka">RPTKA</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="rptka" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="astaka">ASTAKA</label>
						<input class="form-control" id="astaka" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="dkptka_terbit">DKPTKA Terbit</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="dkptka_terbit" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="dkptka_paid">DKPTKA Paid</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="dkptka_paid" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="imta">IMTA</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="imta" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <hr>
                    <!--  -->
					<div class="col-md-4">
						<label class="form-label" for="masuk_berkas">Masuk Berkas / Molina</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="masuk_berkas" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="billing_pnbp_terbit">Billing PNBP Terbit</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="billing_pnbp_terbit" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="billing_pnbp_paid">Billing PNBP Paid</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="billing_pnbp_paid" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <!--  -->
                    <div class="col-md-6">
						<label class="form-label" for="visa">Visa</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="visa" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-6">
						<label class="form-label" for="foto">Foto</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="foto" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <!--  -->
                    <div class="col-md-6">
						<label class="form-label" for="paspor_tanggal">Ambil Paspor</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="paspor_tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-6">
						<label class="form-label" for="paspor_via">Via</label>
						<input class="form-control" id="paspor_via" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-6">
						<label class="form-label" for="molina_konfirm">Molina Konfirmasi</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="molina_konfirm" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-6">
						<label class="form-label" for="molina_terbit">Molina Terbit</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="molina_terbit" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <hr>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanwil_tanggal">Loket Kanwil</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="lk_kanwil_tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanwil_nominal">Nominal</label>
						<input class="form-control numeric-input-idr" id="lk_kanwil_nominal" type="text" />
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanwil_via">Via</label>
						<input class="form-control" id="lk_kanwil_via" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="lk_direktorat_tanggal">Loket Direktorat</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="lk_direktorat_tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_direktorat_nominal">Nominal</label>
						<input class="form-control numeric-input-idr" id="lk_direktorat_nominal" type="text" />
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_direktorat_via">Via</label>
						<input class="form-control" id="lk_direktorat_via" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanim_tanggal">Loket Kanim</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="lk_kanim_tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanim_nominal">Nominal</label>
						<input class="form-control numeric-input-idr" id="lk_kanim_nominal" type="text" />
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="lk_kanim_via">Via</label>
						<input class="form-control" id="lk_kanim_via" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-6">
						<label class="form-label" for="ith_terbit">Terbit Izin Tinggal Baru</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="ith_terbit" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-6">
						<label class="form-label" for="ith_exp">Expired</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="ith_exp" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <hr>
                    <!--  -->
                    <div class="col-md-6">
						<label class="form-label" for="serah_paspor_tanggal">Serah Paspor</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="serah_paspor_tanggal" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-6">
						<label class="form-label" for="serah_paspor_via">Via</label>
						<input class="form-control" id="serah_paspor_via" type="text" />
					</div>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="stm">STM</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="stm" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="sktl">SKTL</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="sktl" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="sktt">SKTT</label>
						<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control custom-datetimepicker" id="sktt" type="text" aria-describedby="basic-addon1" />
                        </div>
					</div>
                    <hr>
                    <!--  -->
                    <div class="col-md-4">
						<label class="form-label" for="note">Note</label>
						<input class="form-control" id="note" type="text" />
					</div>
                    <div class="col-md-4">
						<label class="form-label" for="status">STATUS</label>
						<select class="form-select custom-choices" id="status">
                            @php $prefix = "STATUS_"; @endphp
                            @foreach($MASTER_STATUS as $k => $v)
                                <option value="{{ $v->{$prefix . 'ID'} }}">{{ $v->{$prefix . 'NAMA'} }}</option>
                            @endforeach
                        </select>
					</div>
                    <!--  -->
					<!-- <div class="col-12">
						<div class="form-check">
							<input class="form-check-input" id="gridCheck" type="checkbox" />
							<label class="form-check-label" for="gridCheck">Check me out</label>
						</div>
					</div> -->
                    <!--  -->
					<div class="col-4">
                        <div class=" text-end">
						    <a class="btn btn-primary mt-4" onclick="save()">SIMPAN PERMOHONAN</a>
                        </div>
                    </div>
                    <!--  -->
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')

<script type="text/javascript">

    var isEdit = "{{ $MODE }}" == "EDIT"

    //
    var choices_config = {
        placeholder: true,
    }

    var _sponsor = new Choices('#sponsor', choices_config); sponsor = ""
    var _proses = new Choices('#proses', choices_config); proses = ""
    var _wilayah = new Choices('#wilayah', choices_config); wilayah = ""
    var _ita_jenis = new Choices('#ita_jenis', choices_config); ita_jenis = ""
    var _status = new Choices('#status', choices_config); status = ""

    /*
    _sponsor.setChoiceByValue("opsi1")
    */


    //
    var flatpickr_dateFormat = "Y-m-d"
    var flatpickr_config = {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: flatpickr_dateFormat,
        onChange: function(selectedDates, dateStr, instance) {
            console.log(`flatpickr onChange ${dateStr}`)
        }
    }

    var _tanggal = $("#tanggal").flatpickr(flatpickr_config); var tanggal = ""
    var _ita_exp = $("#ita_exp").flatpickr(flatpickr_config); var ita_exp = ""
    var _kirim_tim = $("#kirim_tim").flatpickr(flatpickr_config); var kirim_tim = ""
    var _rptka = $("#rptka").flatpickr(flatpickr_config); var rptka = ""
    var _dkptka_terbit = $("#dkptka_terbit").flatpickr(flatpickr_config); var dkptka_terbit = ""
    var _dkptka_paid = $("#dkptka_paid").flatpickr(flatpickr_config); var dkptka_paid = ""
    var _imta = $("#imta").flatpickr(flatpickr_config); var imta = ""
    var _masuk_berkas = $("#masuk_berkas").flatpickr(flatpickr_config); var masuk_berkas = ""
    var _billing_pnbp_terbit = $("#billing_pnbp_terbit").flatpickr(flatpickr_config); var billing_pnbp_terbit = ""
    var _billing_pnbp_paid = $("#billing_pnbp_paid").flatpickr(flatpickr_config); var billing_pnbp_paid = ""
    var _visa = $("#visa").flatpickr(flatpickr_config); var visa = ""
    var _foto = $("#foto").flatpickr(flatpickr_config); var foto = ""
    var _paspor_tanggal = $("#paspor_tanggal").flatpickr(flatpickr_config); var paspor_tanggal = ""
    var _molina_konfirm = $("#molina_konfirm").flatpickr(flatpickr_config); var molina_konfirm = ""
    var _molina_terbit = $("#molina_terbit").flatpickr(flatpickr_config); var molina_terbit = ""
    var _lk_kanwil_tanggal = $("#lk_kanwil_tanggal").flatpickr(flatpickr_config); var lk_kanwil_tanggal = ""
    var _lk_direktorat_tanggal = $("#lk_direktorat_tanggal").flatpickr(flatpickr_config); var lk_direktorat_tanggal = ""
    var _lk_kanim_tanggal = $("#lk_kanim_tanggal").flatpickr(flatpickr_config); var lk_kanim_tanggal = ""
    var _ith_terbit = $("#ith_terbit").flatpickr(flatpickr_config); var ith_terbit = ""
    var _ith_exp = $("#ith_exp").flatpickr(flatpickr_config); var ith_exp = ""
    var _serah_paspor_tanggal = $("#serah_paspor_tanggal").flatpickr(flatpickr_config); var serah_paspor_tanggal = ""
    var _stm = $("#stm").flatpickr(flatpickr_config); var stm = ""
    var _sktl = $("#sktl").flatpickr(flatpickr_config); var sktl = ""
    var _sktt = $("#sktt").flatpickr(flatpickr_config); var sktt = ""


	$(document).ready(function(){

        if(isEdit){
            getDetail()
        }

        //_tanggal.setDate("2024-08-17")
        //$("#lk_kanwil_nominal").autoNumeric("set", 240000000)
	
    })


    function save(){
        // define all input
        var lk_kanwil_nominal = $("#lk_kanwil_nominal").autoNumeric("get"); if(lk_kanwil_nominal == "") lk_kanwil_nominal = "0"
        var lk_direktorat_nominal = $("#lk_direktorat_nominal").autoNumeric("get"); if(lk_direktorat_nominal == "") lk_direktorat_nominal = "0"
        var lk_kanim_nominal = $("#lk_kanim_nominal").autoNumeric("get"); if(lk_kanim_nominal == "") lk_kanim_nominal = "0"

        var nama = $("#nama").val()
        var astaka = $("#astaka").val()
        var paspor_via = $("#paspor_via").val()
        var lk_kanwil_via = $("#lk_kanwil_via").val()
        var lk_kanim_via = $("#lk_kanim_via").val()
        var lk_direktorat_via = $("#lk_direktorat_via").val()
        var serah_paspor_via = $("#serah_paspor_via").val()
        var note = $("#note").val()

        sponsor = _sponsor.getValue(true)
        proses = _proses.getValue(true)
        wilayah = _wilayah.getValue(true)
        ita_jenis = _ita_jenis.getValue(true)
        status = _status.getValue(true)

        if (_tanggal.selectedDates.length > 0) tanggal = _tanggal.formatDate(_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_ita_exp.selectedDates.length > 0) ita_exp = _ita_exp.formatDate(_ita_exp.selectedDates[0], flatpickr_dateFormat);
        if (_kirim_tim.selectedDates.length > 0) kirim_tim = _kirim_tim.formatDate(_kirim_tim.selectedDates[0], flatpickr_dateFormat);
        if (_rptka.selectedDates.length > 0) rptka = _rptka.formatDate(_rptka.selectedDates[0], flatpickr_dateFormat);
        if (_dkptka_terbit.selectedDates.length > 0) dkptka_terbit = _dkptka_terbit.formatDate(_dkptka_terbit.selectedDates[0], flatpickr_dateFormat);
        if (_dkptka_paid.selectedDates.length > 0) dkptka_paid = _dkptka_paid.formatDate(_dkptka_paid.selectedDates[0], flatpickr_dateFormat);
        if (_imta.selectedDates.length > 0) imta = _imta.formatDate(_imta.selectedDates[0], flatpickr_dateFormat);
        if (_masuk_berkas.selectedDates.length > 0) masuk_berkas = _masuk_berkas.formatDate(_masuk_berkas.selectedDates[0], flatpickr_dateFormat);
        if (_billing_pnbp_terbit.selectedDates.length > 0) billing_pnbp_terbit = _billing_pnbp_terbit.formatDate(_billing_pnbp_terbit.selectedDates[0], flatpickr_dateFormat);
        if (_billing_pnbp_paid.selectedDates.length > 0) billing_pnbp_paid = _billing_pnbp_paid.formatDate(_billing_pnbp_paid.selectedDates[0], flatpickr_dateFormat);
        if (_visa.selectedDates.length > 0) visa = _visa.formatDate(_visa.selectedDates[0], flatpickr_dateFormat);
        if (_foto.selectedDates.length > 0) foto = _foto.formatDate(_foto.selectedDates[0], flatpickr_dateFormat);
        if (_paspor_tanggal.selectedDates.length > 0) paspor_tanggal = _paspor_tanggal.formatDate(_paspor_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_molina_konfirm.selectedDates.length > 0) molina_konfirm = _molina_konfirm.formatDate(_molina_konfirm.selectedDates[0], flatpickr_dateFormat);
        if (_molina_terbit.selectedDates.length > 0) molina_terbit = _molina_terbit.formatDate(_molina_terbit.selectedDates[0], flatpickr_dateFormat);
        if (_lk_kanwil_tanggal.selectedDates.length > 0) lk_kanwil_tanggal = _lk_kanwil_tanggal.formatDate(_lk_kanwil_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_lk_direktorat_tanggal.selectedDates.length > 0) lk_direktorat_tanggal = _lk_direktorat_tanggal.formatDate(_lk_direktorat_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_lk_kanim_tanggal.selectedDates.length > 0) lk_kanim_tanggal = _lk_kanim_tanggal.formatDate(_lk_kanim_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_ith_terbit.selectedDates.length > 0) ith_terbit = _ith_terbit.formatDate(_ith_terbit.selectedDates[0], flatpickr_dateFormat);
        if (_ith_exp.selectedDates.length > 0) ith_exp = _ith_exp.formatDate(_ith_exp.selectedDates[0], flatpickr_dateFormat);
        if (_serah_paspor_tanggal.selectedDates.length > 0) serah_paspor_tanggal = _serah_paspor_tanggal.formatDate(_serah_paspor_tanggal.selectedDates[0], flatpickr_dateFormat);
        if (_stm.selectedDates.length > 0) stm = _stm.formatDate(_stm.selectedDates[0], flatpickr_dateFormat);
        if (_sktl.selectedDates.length > 0) sktl = _sktl.formatDate(_sktl.selectedDates[0], flatpickr_dateFormat);
        if (_sktt.selectedDates.length > 0) sktt = _sktt.formatDate(_sktt.selectedDates[0], flatpickr_dateFormat);

        // validation
        if(tanggal == ""){
            toastr.error("Tanggal permohohan harus diisi")
            return
        }
        if(sponsor == ""){
            toastr.error("Sponsor harus diisi")
            return
        }
        if(nama.trim() == ""){
            toastr.error("Nama harus diisi")
            return
        }
        if(proses == ""){
            toastr.error("Proses harus diisi")
            return
        }
        if(wilayah == ""){
            toastr.error("Wilayah harus diisi")
            return
        }
        if(ita_jenis == ""){
            toastr.error("Jenis izin tinggal awal harus diisi")
            return
        }
        if(ita_exp == ""){
            toastr.error("Tanggal expired izin tinggal awal harus diisi")
            return
        }

        // send http req
        createOverlay("Saving data..")
        $.ajax({
            type: "GET",
            url: "{!! url('/') !!}/token",
            data: "",
            success: function(data) {
                if (data["STATUS"] == "SUCCESS") {
                    var token = data["PAYLOAD"];
                    var params = {
                        tanggal: tanggal,
                        sponsor: sponsor,
                        nama: nama,
                        proses: proses,
                        ita_jenis: ita_jenis,
                        ita_exp: ita_exp,
                        wilayah: wilayah,
                        kirim_tim: kirim_tim,
                        rptka: rptka,
                        astaka: astaka,
                        dkptka_terbit: dkptka_terbit,
                        dkptka_paid: dkptka_paid,
                        imta: imta,
                        masuk_berkas: masuk_berkas,
                        billing_pnbp_terbit: billing_pnbp_terbit,
                        billing_pnbp_paid: billing_pnbp_paid,
                        visa: visa,
                        foto: foto,
                        paspor_tanggal: paspor_tanggal,
                        paspor_via: paspor_via,
                        molina_konfirm: molina_konfirm,
                        molina_terbit: molina_terbit,
                        lk_kanwil_tanggal: lk_kanwil_tanggal,
                        lk_kanwil_nominal: lk_kanwil_nominal,
                        lk_kanwil_via: lk_kanwil_via,
                        lk_direktorat_tanggal: lk_direktorat_tanggal,
                        lk_direktorat_nominal: lk_direktorat_nominal,
                        lk_direktorat_via: lk_direktorat_via,
                        lk_kanim_tanggal: lk_kanim_tanggal,
                        lk_kanim_nominal: lk_kanim_nominal,
                        lk_kanim_via: lk_kanim_via,
                        ith_terbit: ith_terbit,
                        ith_exp: ith_exp,
                        serah_paspor_tanggal: serah_paspor_tanggal,
                        serah_paspor_via: serah_paspor_via,
                        stm: stm,
                        sktl: sktl,
                        sktt: sktt,
                        note: note,
                        status: status
                    }
                    var apiAction = "save"
                    if(isEdit){
                        params.id = "{{ $ID }}"
                        apiAction = "update"
                    }
                    $.ajax({
                        type: "POST",
                        url: "{!! url('/') !!}/api/permohonan/" + apiAction,
                        data: params,
                        success: function(data) {
                            gOverlay.hide()
                            if (data["STATUS"] == "SUCCESS") {
                                toastr.success(data["MESSAGE"]);
                                window.location = "{!! url('/') !!}/permohonan"
                            } else {
                                toastr.error(data["MESSAGE"]);
                            }
                        },
                        error: function(error) {
                            gOverlay.hide()
                            toastr.error("Network/server error\r\n" + error)
                        }
                    });
                } else {
                    gOverlay.hide()
                    toastr.error(data["MESSAGE"])
                }
            },
            error: function(error) {
                gOverlay.hide();
                toastr.error("Network/server error " + error)
            }
        });

    }
	

    function getDetail() {
        createOverlay("Loading data..")
        $.ajax({
            type: "GET",
            url: "{!! url('/') !!}/token",
            data: "",
            success: function(data) {
                if (data["STATUS"] == "SUCCESS") {
                    var token = data["PAYLOAD"];
                    let params = {
                        id : "{{ $ID }}"
                    }
                    $.ajax({
                        type: "GET",
                        url: "{!! url('/') !!}/api/permohonan/detail",
                        data: params,
                        success: function(data) {
                            gOverlay.hide()
                            if (data["STATUS"] == "SUCCESS") {
                                var pemh = data["PAYLOAD"]

                                $("#lk_kanwil_nominal").autoNumeric("set", pemh.PEMH_LK_KANWIL_NOMINAL)
                                $("#lk_direktorat_nominal").autoNumeric("set", pemh.PEMH_LK_DIREKTORAT_NOMINAL)
                                $("#lk_kanim_nominal").autoNumeric("set", pemh.PEMH_LK_KANIM_NOMINAL)

                                _sponsor.setChoiceByValue(pemh.PEMH_SPONSOR)
                                _proses.setChoiceByValue(pemh.PEMH_PROSES)
                                _wilayah.setChoiceByValue(pemh.PEMH_WILAYAH)
                                _ita_jenis.setChoiceByValue(pemh.PEMH_ITA_JENIS)
                                _status.setChoiceByValue(pemh.PEMH_STATUS)

                                if(pemh.PEMH_TANGGAL != "") _tanggal.setDate(pemh.PEMH_TANGGAL)
                                if (pemh.PEMH_ITA_EXP != "") _ita_exp.setDate(pemh.PEMH_ITA_EXP);
                                if (pemh.PEMH_KIRIM_TIM != "") _kirim_tim.setDate(pemh.PEMH_KIRIM_TIM);
                                if (pemh.PEMH_RPTKA != "") _rptka.setDate(pemh.PEMH_RPTKA);
                                if (pemh.PEMH_DKPTKA_TERBIT != "") _dkptka_terbit.setDate(pemh.PEMH_DKPTKA_TERBIT);
                                if (pemh.PEMH_DKPTKA_PAID != "") _dkptka_paid.setDate(pemh.PEMH_DKPTKA_PAID);
                                if (pemh.PEMH_IMTA != "") _imta.setDate(pemh.PEMH_IMTA);
                                if (pemh.PEMH_MASUK_BERKAS != "") _masuk_berkas.setDate(pemh.PEMH_MASUK_BERKAS);
                                if (pemh.PEMH_BILLING_PNBP_TERBIT != "") _billing_pnbp_terbit.setDate(pemh.PEMH_BILLING_PNBP_TERBIT);
                                if (pemh.PEMH_BILLING_PNBP_PAID != "") _billing_pnbp_paid.setDate(pemh.PEMH_BILLING_PNBP_PAID);
                                if (pemh.PEMH_VISA != "") _visa.setDate(pemh.PEMH_VISA);
                                if (pemh.PEMH_FOTO != "") _foto.setDate(pemh.PEMH_FOTO);
                                if (pemh.PEMH_PASPOR_TANGGAL != "") _paspor_tanggal.setDate(pemh.PEMH_PASPOR_TANGGAL);
                                if (pemh.PEMH_MOLINA_KONFIRM != "") _molina_konfirm.setDate(pemh.PEMH_MOLINA_KONFIRM);
                                if (pemh.PEMH_MOLINA_TERBIT != "") _molina_terbit.setDate(pemh.PEMH_MOLINA_TERBIT);
                                if (pemh.PEMH_LK_KANWIL_TANGGAL != "") _lk_kanwil_tanggal.setDate(pemh.PEMH_LK_KANWIL_TANGGAL);
                                if (pemh.PEMH_LK_DIREKTORAT_TANGGAL != "") _lk_direktorat_tanggal.setDate(pemh.PEMH_LK_DIREKTORAT_TANGGAL);
                                if (pemh.PEMH_LK_KANIM_TANGGAL != "") _lk_kanim_tanggal.setDate(pemh.PEMH_LK_KANIM_TANGGAL);
                                if (pemh.PEMH_ITH_TERBIT != "") _ith_terbit.setDate(pemh.PEMH_ITH_TERBIT);
                                if (pemh.PEMH_ITH_EXP != "") _ith_exp.setDate(pemh.PEMH_ITH_EXP);
                                if (pemh.PEMH_SERAH_PASPOR_TANGGAL != "") _serah_paspor_tanggal.setDate(pemh.PEMH_SERAH_PASPOR_TANGGAL);
                                if (pemh.PEMH_STM != "") _stm.setDate(pemh.PEMH_STM);
                                if (pemh.PEMH_SKTL != "") _sktl.setDate(pemh.PEMH_SKTL);
                                if (pemh.PEMH_SKTT != "") _sktt.setDate(pemh.PEMH_SKTT);

                                $("#nama").val(pemh.PEMH_NAMA)
                                $("#astaka").val(pemh.PEMH_ASTAKA)
                                $("#paspor_via").val(pemh.PEMH_PASPOR_VIA)
                                $("#lk_kanwil_via").val(pemh.PEMH_LK_KANWIL_VIA)
                                $("#lk_kanim_via").val(pemh.PEMH_LK_KANIM_VIA)
                                $("#lk_direktorat_via").val(pemh.PEMH_LK_DIREKTORAT_TANGGAL)
                                $("#serah_paspor_via").val(pemh.PEMH_SERAH_PASPOR_VIA)
                                $("#note").val(pemh.PEMH_NOTE)

                            }
                            else {
                                toastr.error(data["MESSAGE"])
                            }
                        },
                        error: function(error) {
                            gOverlay.hide();
                            toastr.error("Network/server error\r\n" + error)
                        }
                    });
                } else {
                    gOverlay.hide()
                    toastr.error(data["MESSAGE"])
                }
            },
            error: function(error) {
                gOverlay.hide()
                toastr.error("Network/server error " + error)
            }
        });

    }

	
</script>

@endsection
