@extends('jsb.layouts.app')
@section('title', ' Order')
@section('content')
<div class="container-small cart py-3" style="margin-top: 1rem !important;">
	<nav class="mb-3" aria-label="breadcrumb">
		<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Disbursements</li>
		</ol>
	</nav>
	<h2 class="mb-3">Disbursements</h2>
	<!-- <div class="row mb-2">
		<div class="col-12 col-lg-12">
		<p>These are your disbursements</p>
		</div>
	</div> -->
	<div class="mb-4">
		<div class="row g-3">
			<div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
				<div class="btn-group position-static" role="group">
					<div class="btn-group position-static text-nowrap" role="group">
						<button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
							@if($ctlDocumentStatus == "inquiry")
								Proforma DA
							@elseif($ctlDocumentStatus == "contract")
								Final DA
							@else
								Document Status
							@endif
							<span class="fas fa-angle-down ms-2"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item {{ $ctlDocumentStatus == "all" ? "active" : "" }}" href="?documentStatus=all">All</a></li>
							<li><a class="dropdown-item {{ $ctlDocumentStatus == "inquiry" ? "active" : "" }}" href="?documentStatus=inquiry">Proforma</a></li>
							<li><a class="dropdown-item {{ $ctlDocumentStatus == "contract" ? "active" : "" }}" href="?documentStatus=contract">Final</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="orderTable">
		<div class="search-box">
			<form class="position-relative" data-bs-toggle="search" data-bs-display="static">
				<input class="form-control search-input search" type="search" placeholder="Search disbursement" aria-label="Search"/>
				<span class="fas fa-search search-box-icon"></span>
			</form>
		</div>
		<br>
		<!-- table -->
		<div class="table-responsive scrollbar">
			<table class="table fs--1 mb-0">
				<thead>
					<tr>
						<th class="sort align-middle" scope="col" data-sort="id">Order #</th>
						<th class="sort align-middle" scope="col" data-sort="date">Date Placed</th>
						<th class="sort align-middle" scope="col" data-sort="port">Port</th>
						<th class="sort align-middle" scope="col">ETA / ETD</th>
						<th class="sort align-middle" scope="col">Status</th>
						<th class="sort align-middle" scope="col">Invoice</th>
						<!-- <th class="sort align-middle" scope="col"></th> -->
					</tr>
				</thead>
				<tbody class="list">
					@if(isset($ctlOrders) && count($ctlOrders) > 0)
						@foreach ($ctlOrders as $value)
							<tr class="hover-actions-trigger btn-reveal-trigger position-static">
								<td style="vertical-align: top;" class="id align-middle fw-bold text-1000 order-code">
									<a href="{{ base_url() }}/orders/{{ md5($value->SO_ID) }}" class="align-middle white-space-nowrap py-0"><b>{{ $value->{'SO_CODE'} }}</b></a>
									@if($value->SO_NOTIFICATION_AT != "0000-00-00 00:00:00")
										<div class="badge badge-phoenix fs--2 pb-1 badge-phoenix-success" style="margin-left:2px;"><span class="badge-label">Updated</span></div>
									@endif
								</td>
								<td style="vertical-align: top;" class="date align-middle white-space-nowrap text-700 fs--1 order-date">{{ tglInggris($value->{'SO_DOCUMENT_STATUS_DATE'}, "SHORT") }}</td>
								<td style="vertical-align: top;" class="port align-middle white-space-nowrap fw-semi-bold fs--1 text-900 port-name">{{ $value->{'PORT_DATA'}->{'PORT_NAME'} }}</td>
								<td style="vertical-align: top;" class="align-middle white-space-nowrap fs--1 text-900">
									<span  style="font-size: 85%;">
									{{ tglInggris($value->{'SO_ETA'}, "SHORT") }}
									<br>
									{{ tglInggris($value->{'SO_ETD'}, "SHORT") }}
									</span>
								</td>
								<?php
								$color = "info";
								$displayStatus = "Final";
								if ($value->{"SO_DOCUMENT_STATUS"} == "Inquiry"){
									$color = "warning";
									$displayStatus = "Proforma";
								}
								?>

								<td style="vertical-align: top;" class="align-middle white-space-nowrap fs--1 text-900 order-status">
									<span class="badge badge-phoenix fs--2 pb-1 badge-phoenix-{{ $color }}"><span class="badge-label">{{ $displayStatus }}</span></span>
								</td>
								
								<td style="vertical-align: top;" class="align-middle white-space-nowrap fs--1 text-900">
									@if($value->{"SO_INVOICE_CODE"} == "" || $value->{"SO_INVOICE_CODE"} == "-")
										<span style="opacity: 0.7;"><i>- Not available - </i></span>
									@else
										<a href="{{ base_url() }}/orders/{{ md5($value->SO_ID) }}/invoice">#{{ $value->{'SO_INVOICE_CODE'} }}</td>
									@endif
								</td>
								<!-- <td class="align-middle fw-bold text-1000 text-end text-nowrap pe-0">
									<a href="{{ base_url() }}/orders/{{ md5($value->SO_ID) }}" class="btn btn-primary btn-sm fs--2">Details</a>
								</td> -->
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mdlConfirm" style="display: none;" id="showInfo">Checkout Now</button> -->
<div class="modal fade" id="mdlConfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header bg-primary">
			<h5 class="modal-title text-white" id="staticBackdropLabel">ORDER RECEIVED</h5>
			<button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
		</div>
		<div class="modal-body">
			<p class="text-700 lh-lg mb-0">Your Appointment have been received, please wait our admin to process further and contact you.</p>
			<p class="text-500 lh-lg mb-0">You can close or leave this page</p>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary" type="button" data-bs-dismiss="modal">OK</button>
		</div>
		</div>
	</div>
</div>
	
<!-- end of .container-->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var options = {
			valueNames : ["order-code", "order-date", "port-name", "order-status"]
		}
		var orderTable = new List("orderTable", options);
	});

	@if (Session::has('CHECKOUT') && Session::get('CHECKOUT') != "")
		sweetAlert("Checkout", "{{ Session::get('ERROR') }}", "error");
		$("#showInfo").trigger("click");
		@php 
		Session::put("CHECKOUT", "");
		@endphp
	@endif
</script>
@endsection
