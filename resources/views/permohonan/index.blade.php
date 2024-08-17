@extends('layouts.app')
@section('title', ' Permohonan')
@section('content')
<div class="container-small cart">
	<!-- <nav class="mb-2" aria-label="breadcrumb">
		<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="#!">Page 1</a></li>
			<li class="breadcrumb-item"><a href="#!">Page 2</a></li>
			<li class="breadcrumb-item active" aria-current="page">Default</li>
		</ol>
	</nav> -->
	<h2 class="mb-5">Permohonan<span class="text-700 fw-normal ms-2">({{ count($PERMOHONAN) }})</span></h2>

	<div id="orderTable" data-list='{"valueNames":["order","payment_status","date","total","customer","delivery_type","date_exp","action"],"page":10,"pagination":true}'>
		<div class="mb-4">
			<div class="row g-3">
				<div class="col-auto">
					<div class="search-box">
						<form class="position-relative" data-bs-toggle="search" data-bs-display="static">
							<input class="form-control search-input search" type="search" placeholder="Search orders" aria-label="Search" />
							<span class="fas fa-search search-box-icon"></span>
						</form>
					</div>
				</div>
				<div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
					<div class="btn-group position-static" role="group">
						<div class="btn-group position-static text-nowrap" role="group">
							<button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
							Status<span class="fas fa-angle-down ms-2"></span></button>
							<ul class="dropdown-menu dropdown-menu-end">
								<li><a class="dropdown-item" href="#">ALL</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<!-- <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button> -->
					<a class="btn btn-primary" href="{{ url('/') }}/permohonan/add"><span class="fas fa-plus me-2"></span>Tambah</a>
				</div>
			</div>
		</div>
		<div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
			<div class="table-responsive scrollbar mx-n1 px-1">
				<table class="table table-sm fs--1 mb-0">
					<thead>
						<tr>
							<th class="sort white-space-nowrap align-middle pe-3" scope="col" data-sort="order" style="width:10%;">KODE</th>
							<th class="sort align-middle text-start pe-3" scope="col" data-sort="payment_status" style="width:15%;">STATUS</th>
							<th class="sort align-middle text-start pe-0" scope="col" data-sort="date" style="width:15%;">TANGGAL</th>
							<th class="sort align-middle text-start" scope="col" data-sort="total" style="width:15%;">PROSES</th>
							<th class="sort align-middle text-start ps-8" scope="col" data-sort="customer" style="width:20%; min-width: 150px;">NAMA & SPONSOR</th>
                            <!-- <th class="sort align-middle pe-3" scope="col" data-sort="payment_status2" style="width:10%;">PAYMENT STATUS 2</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="payment_status3" style="width:10%;">PAYMENT STATUS 3</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="payment_status4" style="width:10%;">PAYMENT STATUS 4</th>
							<th class="sort align-middle text-start pe-3" scope="col" data-sort="fulfilment_status" style="width:12%; min-width: 200px;">FULFILMENT STATUS</th> -->
							<th class="sort align-middle text-start" scope="col" data-sort="delivery_type" style="width:15%;">JENIS ITA</th>
                            <th class="sort align-middle text-start pe-0" scope="col" data-sort="date_exp" style="width:15%;">EXPIRED ITA</th>
                            <th class="sort align-middle text-start pe-0" scope="col" data-sort="action" style="width:25%;"></th>
						</tr>
					</thead>
					<tbody class="list" id="main-table-body">
                        @foreach($PERMOHONAN as $k => $v)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
							<td class="order align-middle white-space-nowrap py-0"><a class="fw-bold" href="#!">{{ $v->PEMH_KODE }}</a></td>
                            <td class="payment_status2 align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-info"><span class="badge-label">{{ $v->STATUS_NAMA }}</span><span class="ms-1" data-feather="info" style="height:12.8px;width:12.8px;"></span></span></td>
							<td class="date align-middle white-space-nowrap text-700 fs--1 text-start">{{ tglInggris($v->PEMH_TANGGAL, "SHORT") }}</td>
							<td class="total align-middle text-start fw-semi-bold text-1000">{{ $v->PROSES_NAMA }}</td>
							<td class="customer align-middle white-space-nowrap ps-8">
								<a class="d-flex align-items-center text-900" href="#">
									<!-- <div class="avatar avatar-m"><img class="rounded-circle" src="../../../assets/img/team/32.webp" alt="" />
									</div> -->
									<h6 class="mb-0 text-900">{{ $v->PEMH_NAMA }} ({{ $v->SPONSOR_NAMA }})</h6>
								</a>
							</td>
                            <!-- <td class="payment_status3 align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">Complete</span><span class="ms-1" data-feather="clock" style="height:12.8px;width:12.8px;"></span></span></td>
                            <td class="payment_status4 align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Complete</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
							<td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-secondary"><span class="badge-label">Cancelled</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td> -->
							<td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">{{ $v->JENIS_NAMA }}</td>
                            <td class="date_exp align-middle white-space-nowrap text-700 fs--1">{{ tglInggris($v->PEMH_ITA_EXP, "SHORT") }}</td>
                            <td class="action align-middle fw-bold text-1000 text-end text-nowrap pe-0">
                                <a class="btn btn-primary fs--2" href="{{ url('/') }}/permohonan/update?id={{ md5($v->PEMH_ID) }}"><span class="fas fa-info me-1 fs--2"></span>Details</a>
                            </td>
						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
			<div class="row align-items-center justify-content-between py-2 pe-0 fs--1" id="pagination-info">
				<div class="col-auto d-flex">
					<p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
					<a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
				</div>
				<div class="col-auto d-flex">
					<button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
					<ul class="mb-0 pagination"></ul>
					<button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">

	$(document).ready(function(){
		//getList()
	})


    /*
    function untuk render data tabel dari API
    sementara tidak dipakai (menggunakan cara klasik, data dari controller web)
    karena List.js masih sulit ditaklukkan
    */
    function getList() {
        createOverlay("Loading data..")
        $.ajax({
            type: "GET",
            url: "{!! url('/') !!}/token",
            data: "",
            success: function(data) {
                if (data["STATUS"] == "SUCCESS") {
                    var token = data["PAYLOAD"];
                    $.ajax({
                        type: "GET",
                        url: "{!! url('/') !!}/api/permohonan",
                        data: {},
                        success: function(data) {
                            gOverlay.hide();
                            if (data["STATUS"] == "SUCCESS") {
                                var payload = data["PAYLOAD"];
                                var permohonan = payload["PERMOHONAN"];

                                var tbody = $('#main-table-body');
                                var items = [];

                                permohonan.forEach(function(item) {
                                    var row = `
                                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                            <td class="order align-middle white-space-nowrap py-0">
                                                <a class="fw-semi-bold" href="#!">${item.PEMH_KODE}</a>
                                            </td>
                                            <td class="total align-middle text-end fw-semi-bold text-1000">
                                                ${item.PEMH_KODE}
                                            </td>
                                            <td class="customer align-middle white-space-nowrap ps-8">
                                                <a class="d-flex align-items-center text-900" href="#">
                                                    <div class="avatar avatar-m">
                                                        <img class="rounded-circle" src="${item.PEMH_KODE}" alt="" />
                                                    </div>
                                                    <h6 class="mb-0 ms-3 text-900">${item.PEMH_KODE}</h6>
                                                </a>
                                            </td>
                                            <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-700">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                                    <span class="badge-label">${item.PEMH_KODE}</span>
                                                    <span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </td>
                                            <td class="payment_status2 align-middle white-space-nowrap text-start fw-bold text-700">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                                    <span class="badge-label">${item.PEMH_KODE}</span>
                                                    <span class="ms-1" data-feather="clock" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </td>
                                            <td class="payment_status3 align-middle white-space-nowrap text-start fw-bold text-700">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                                    <span class="badge-label">${item.PEMH_KODE}</span>
                                                    <span class="ms-1" data-feather="info" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </td>
                                            <td class="payment_status4 align-middle white-space-nowrap text-start fw-bold text-700">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                                    <span class="badge-label">${item.PEMH_KODE}</span>
                                                    <span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </td>
                                            <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-700">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-secondary">
                                                    <span class="badge-label">${item.PEMH_KODE}</span>
                                                    <span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </td>
                                            <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">
                                                ${item.PEMH_KODE}
                                            </td>
                                            <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-end">
                                                ${item.PEMH_KODE}
                                            </td>
                                            <td class="action align-middle fw-bold text-1000 text-end text-nowrap pe-0">
                                                <button class="btn btn-primary fs--2"><span class="fas fa-shopping-cart me-1 fs--2"></span>Add to cart</button>
                                            </td>
                                        </tr>
                                    `;

                                    tbody.append(row);

                                    items.push({
                                        order: item.PEMH_KODE,
                                        total: item.PEMH_KODE,
                                        customer: item.PEMH_KODE,
                                        payment_status: item.PEMH_KODE,
                                        payment_status2: item.PEMH_KODE,
                                        payment_status3: item.PEMH_KODE,
                                        payment_status4: item.PEMH_KODE,
                                        fulfilment_status: item.PEMH_KODE,
                                        delivery_type: item.PEMH_KODE,
                                        date: item.PEMH_KODE,
                                        action: item.PEMH_KODE,
                                    });
                                });

                                // Inisialisasi List.js setelah semua elemen ditambahkan
                                `
                                <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","payment_status2","payment_status3","payment_status4","fulfilment_status","delivery_type","date","action"],"page":10,"pagination":true}'>
                                `
                                var options = {
                                    valueNames: ["order", "total", "customer", "payment_status", "payment_status2", "payment_status3", "payment_status4", "fulfilment_status", "delivery_type", "date", "action"],
                                    page: 10,
                                    pagination: true
                                };
                                var orderList = new List('orderTable', options);

                                // Tambahkan semua item ke List.js
                                orderList.add(items);

                                // $("#asdasd").append(
                                //     `
                                //     <div class="col-auto d-flex">
                                //         <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                                //         <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                                //     </div>
                                //     <div class="col-auto d-flex">
                                //         <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                //         <ul class="mb-0 pagination"></ul>
                                //         <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                                //     </div>
                                //     `
                                // )

                                feather.replace();
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

</script>
@endsection
