<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="ThemeSelect">

        <title>RBS - Verify OTP</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{config('global.front_base_url').'images/logo_icon.png'}}"/>
        <link rel="apple-touch-icon" href="{{asset('app-assets/images/favicon/appstore.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/favicon/appstore.png')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- BEGIN: VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/vendors.min.css')}}">
        <!-- END: VENDOR CSS-->

        <!-- BEGIN: Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/vertical-menu-nav-dark-template/materialize.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/vertical-menu-nav-dark-template/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/login.css')}}">
        <!-- END: Page Level CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/custom/custom.css')}}">
        <!-- END: Custom CSS-->

        <style type="text/css">
            .otp_digit {
                text-align: center;
            }
        </style>
    </head>

    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-menu-nav-dark" data-col="1-column">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div id="login-page" class="row">
                        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">

                            @if(session('fail'))
                                <div class="card-alert card red">
                                    <div class="card-content white-text">
                                        <p>{{session('fail')}}</p>
                                    </div>
                                </div>
                            @endif

                            @if(session('message'))
                                <div class="card-alert card green">
                                    <div class="card-content white-text">
                                        <p>{{session('message')}}</p>
                                    </div>
                                </div>
                            @endif

                            <form class="login-form" action="{{url('admin/save-verify-otp')}}" method="POST">@csrf
                                <div class="row">
                                    <h5 class="ml-4">Verification</h5>
                                    <p class="ml-4">Check your email for the OTP</p>

                                    <input class="otp_digit" name="digit1" id="digit1" type="text" required="" maxlength="1" style="width:90px;margin-left: 30px;">
                                
                                    <input class="otp_digit" name="digit2" id="digit2" type="text" required="" maxlength="1" style="width:90px;">
                              
                                    <input class="otp_digit" name="digit3" id="digit3" type="text" required="" maxlength="1" style="width:90px;">
                                
                                    <input class="otp_digit" name="digit4" id="digit4" type="text" required="" maxlength="1" style="width:90px;">
                                </div>

                                <?php $email = session('email'); ?>
                                <input type="hidden" name="email" id="email" value="{{ $email }}">

                                <div class="row">
                                    <div class="input-field col s12">
                                       <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Continue
                                       </button>
                                    </div>
                                    <p style="margin-left: 20px;">Didn’t recive a verification code? &nbsp;&nbsp;&nbsp;<a href="javascript:sendOTP();" class="resend_code">Resend the code</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>

        <!-- BEGIN VENDOR JS-->
        <script src="{{ asset('public/app-assets/js/vendors.min.js')}}"></script>
        <!-- END VENDOR  JS-->

        <!-- BEGIN THEME  JS-->
        <script src="{{ asset('public/app-assets/js/plugins.js')}}"></script>
        <script src="{{ asset('public/app-assets/js/search.js')}}"></script>
        <script src="{{ asset('public/app-assets/js/custom/custom-script.js')}}"></script>
        <!-- END THEME  JS-->

        <script type="text/javascript">
            
            $(".otp_digit").keyup(function () {

                if (this.value.length == this.maxLength) {
                    $(this).next('.otp_digit').focus();
                }
            });

            $('.otp_digit').keypress(function (e) {

                var length = jQuery(this).val().length;

                if(e.which != 8  && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            function sendOTP() {

                var app_url = "{!! env('APP_URL'); !!}";
                var url = app_url+'/admin/send-otp';
                var email = $("#email").val();
                var page = $("#page").val();

                var form = $('<form action="' + url + '" method="post">' +
                '<input type="hidden" name="email" value="'+email+'" />' +
                '<input type="hidden" name="_token" value="{{ csrf_token() }}" />' +
                '</form>');
                $('body').append(form);
                form.submit();
            }
        </script>
    </body>
</html>