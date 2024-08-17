@extends('jsb.layouts.app')
@section('title', ' Order')
@section('content')
<div class="container-small cart py-3" style="margin-top: 1rem !important;">
	<nav class="mb-3" aria-label="breadcrumb">
		<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="{{ base_url() }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ base_url() }}/orders">Disbursements</a></li>
            <li class="breadcrumb-item"><a href="{{ base_url() }}/orders/{{ md5($ctlOrder->SO_ID) }}">#{{ ($ctlOrder->SO_CODE) }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attachments</li>
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

    <div id="attachments">
        <div class="search-box">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                <input class="form-control search-input search" type="search" placeholder="Search attachment" aria-label="Search"/>
                <span class="fas fa-search search-box-icon"></span>
            </form>
        </div>
        <br>
        <!-- table -->
        <div class="table-responsive scrollbar">
            <table class="table fs--1 mb-0">
                <thead>
                    <tr>
                        <th class="sort align-middle">Attachment Name</th>
                        <th class="sort align-middle">Note</th>
                        <th class="sort align-middle">&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @if(isset($ctlAttachments) && count($ctlAttachments) > 0)
                        @foreach($ctlAttachments as $rowAttachment)
                        <tr>
                            <td class="white-space-nowrap attachment-name"><span id="rowAttachmentName_{{ md5($rowAttachment->{'SOATT_ID'}) }}">{{ $rowAttachment->{"SOATT_NAME"} }}</span></td>
                            <td class="white-space-nowrap attachment-note"><span id="rowAttachmentInfo_{{ md5($rowAttachment->{'SOATT_ID'}) }}">{{ $rowAttachment->{"SOATT_INFO"} }}</span></td>
                            <td class="align-middle fw-bold text-1000 text-end text-nowrap pe-0">
								<a href="javascript:downloadAttachment('{{ md5($rowAttachment->{'SOATT_ID'}) }}')" class="btn btn-primary btn-sm fs--2">Download</a>
							</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end of .container-->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var options = {
			valueNames : ["attachment-name", "attachment-note", "attachment-type"]
		}
		var attachments = new List("attachments", options);
	});

    function downloadAttachment(soAttIdHashed) {
        window.open("{{ env("GO_URL") }}/api/sales-orders/attachments/download/" + soAttIdHashed + "?loginToken={{ getLoginToken() }}", '_blank').focus();
    }
</script>
@endsection
