@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{!! url('/') !!}/jsb/login">
                    <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{!! url('/') !!}/assets/jsb/logo.png" alt="phoenix" width="58" />
                    </div>
                </a>
                <div class="text-center mb-7">
                    <h3 class="text-1000">Register</h3>
                    <p class="text-700">Create your account now</p>
                </div>

                <form>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" placeholder="" />
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email (this email will be your account ID)</label>
                        <input class="form-control" id="email" type="email" placeholder="your@email.com" />
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="phone">Mobile phone number</label>
                        <input class="form-control" id="phone" type="text" placeholder="+628123456789" />
                    </div>
                    <!-- <div class="mb-3 text-start">
                        <label class="form-label" for="companyAddress">Company Address</label>
                        <input class="form-control" id="companyAddress" type="text" placeholder="Company address" style="text-transform: uppercase;"/>
                    </div> -->
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control form-icon-input" id="password" type="password" placeholder="Password" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="password_confirm">Confirm Password</label>
                            <input class="form-control form-icon-input" id="password_confirm" type="password" placeholder="Confirm password" />
                        </div>
                    </div>
                </form>

                <button class="btn btn-primary w-100 mb-3" onClick="registerAccount()">Sign Up</button>
                <div class="text-center"><a class="fs--1 fw-bold" href="{!! url('/') !!}/auth/login">I already have an account</a></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlInfo" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="staticBackdropLabel">WAITING FOR ACCOUNT VERIFICATION</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-700 lh-lg mb-0" id="divSuccessMsg"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onClick="window.location='{!! url('/') !!}/auth/login'">LOGIN</button>
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CLOSE</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlError" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="staticBackdropLabel">REGISTRATION ERROR</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-700 lh-lg mb-0" id="divErrorMsg"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CLOSE</button>
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

        function onLoad() {
            $("#name").focus();

            @if (Session::has('ERROR'))
                sweetAlert("Error", "{{ Session::get('ERROR') }}", "error");
            @endif

            $(document).keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    registerAccount();
                }
            });
        }

        function registerAccount() {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var password = $("#password").val();
            var passwordConfirm = $("#password_confirm").val();

            if (name == "" || email == "" || phone == "" || password == "" || passwordConfirm == "") {
                toastr.error("Input required", "Please fill all input below");
                return;
            }

            if(password != passwordConfirm){
                toastr.error("Confirmation password doesn't match", "Please check your passwrod and confirmation password");
                return;
            }

            var passwordEnc = CryptoJS.AES.encrypt(JSON.stringify(password), email, {
                format: CryptoJSAesJson
            }).toString();
            var passwordConfirmEnc = CryptoJS.AES.encrypt(JSON.stringify(passwordConfirm), email, {
                format: CryptoJSAesJson
            }).toString();

            @if (Session::has('SESSION_NEXT_ACTION'))
                var next = "{{ Session::get('SESSION_NEXT_ACTION') }}";
            @endif

            createOverlay("Processing...");
            $.ajax({
                type: "GET",
                url: "{!! url('/') !!}/token",
                data: "",
                success: function(data) {
                    if (data["STATUS"] == "SUCCESS") {
                        var token = data["PAYLOAD"];

                        $.ajax({
                            type: "POST",
                            url: "{!! url('/') !!}/auth/register-store",
                            data: {
                                "name": name,
                                "email": email,
                                "phone": phone,
                                "password": passwordEnc,
                                "password_confirm": passwordConfirmEnc,
                                "_token": token
                            },
                            success: function(data) {
                                gOverlay.hide();
                                if (data["STATUS"] == "SUCCESS") {
                                    //toastr.success(data["MESSAGE"]);
                                    $("#divSuccessMsg").html(data["MESSAGE"]);
                                    $("#mdlInfo").modal("show");
                                } 
                                else {
                                    //toastr.error(data["MESSAGE"]);
                                    $("#divErrorMsg").html(data["MESSAGE"]);
                                    $("#mdlError").modal("show");
                                }
                            },
                            error: function(error) {
                                gOverlay.hide();
                                toastr.error("Network/server error " + error);
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
                    toastr.error("Network/server error " + error);
                }
            });
        }
    </script>
@endsection
