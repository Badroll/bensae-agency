@extends('layouts.app')

@section('title', ' Login')

@section('content')
    <div class="container">
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{!! url('/') !!}/jsb/login">
                    <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{!! url('/') !!}/assets/jsb/logo.png" alt="phoenix" width="250" />
                    </div>
                </a>
                <div class="text-center mb-7">
                    <h3 class="text-1000">Log In</h3>
                    <p class="text-700">Log in to your account here</p>
                </div>

                <form>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" placeholder="your@email.com" />
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control form-icon-input" id="password" type="password" placeholder="Password" />
                    </div>
                </form>

                <button class="btn btn-primary w-100 mb-3" onClick="doLogin()">Log In</button>
                <div class="text-center"><a class="fs--1 fw-bold" href="{!! url('/') !!}/auth/register">I don't have an account</a></div>
                <div class="text-center"><a class="fs--1 fw-bold" href="javascript:forgotPassword()">Forgot password?</a></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlResendVerification" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="staticBackdropLabel">RE-SEND VERIFICATION EMAIL</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-700 lh-lg mb-0">If you have registered before, you should receive activation/verification email. Please check your email inbox carefully, including spam folder.</p>
                <br>
                <p class="text-700 lh-lg mb-0">In case you still need to re-send verification email, input your email and password on login form below. Activation/verification email will be sent upon successful authorization.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CLOSE</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlForgotPassword" tabindex="-1" aria-labelledby="mdlForgotPasswordLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlForgotPasswordLabel">RESET PASSWORD FORM</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-2" style="display:block;">
                        <label class="form-label" for="forgotEmail">Your Email</label>
                        <input class="form-control" id="forgotEmail" type="text" value=""/>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" onclick="resetPassword()">RESET NOW</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCEL</button>
                    </div>
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
 
        $("#email").focus();

        @if (Session::has('ERROR'))
            sweetAlert("Got Error", "{{ Session::get('ERROR') }}", "error");
        @endif

        $(document).keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                doLogin();
            }
        });

        function doLogin() {
            var email = $("#email").val();
            var password = $("#password").val();

            if (password == "" || email == "") {
                toastr.error("Email and password cannot be empty", "Empty Fields");
                return;
            }

            var passwordEnc = CryptoJS.AES.encrypt(JSON.stringify(password), email, {
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
                            url: "{!! url('/') !!}/auth/login-store",
                            data: {
                                "email": email,
                                "password": passwordEnc,
                                "_token": token
                            },
                            success: function(data) {
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                    var routeIntended = data["PAYLOAD"]
                                    console.log(routeIntended)
                                    if (routeIntended != "" && routeIntended != null){
                                        window.location = routeIntended;
                                    }
                                    else{
                                        window.setTimeout(function() {
                                            window.location = "{!! url('/') !!}/permohonan";
                                        }, 1000);
                                    }
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

        function forgotPassword() {
            $("#mdlForgotPassword").modal("show");
        }

        function resendVerification() {
            $("#mdlResendVerification").modal("show");
        }

        function resetPassword() {
            let email = $("#forgotEmail").val();
            if(email == "") {
                toastr.error("Input your email for password reset");
                return;
            }

            $("#mdlForgotPassword").modal("hide");

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
                            url: "{!! url('/') !!}/reset-password",
                            data: {
                                "email": email,
                                "_token": token
                            },
                            success: function(data) {
                                if (data["STATUS"] == "SUCCESS") {
                                    toastr.success(data["MESSAGE"]);
                                } 
                                else {
                                    gOverlay.hide();
                                    $("#mdlForgotPassword").modal("show");
                                    toastr.error(data["MESSAGE"]);
                                }
                            },
                            error: function(error) {
                                gOverlay.hide();
                                $("#mdlForgotPassword").modal("show");
                                toastr.error("Network/server error " + error);
                            }
                        });
                    } 
                    else {
                        gOverlay.hide();
                        $("#mdlForgotPassword").modal("show");
                        toastr.error(data["MESSAGE"]);
                    }
                },
                error: function(error) {
                    gOverlay.hide();
                    $("#mdlForgotPassword").modal("show");
                    toastr.error("Network/server error " + error);
                }
            });
        }
    </script>
@endsection
