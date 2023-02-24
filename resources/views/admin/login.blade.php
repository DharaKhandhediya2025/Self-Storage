<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="ThemeSelect">

        <title>Self Storage - Admin Login</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{config('global.front_base_url').'images/favicon.png'}}"/>
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

                            <form class="login-form" action="{{url('admin/login')}}" method="POST">@csrf
                                <div class="row">
                                    <h5 class="ml-4">Admin Login</h5>
                                </div>

                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">mail_outline</i>
                                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" required="" placeholder="Email">
                                        <label for="email">Email</label>

                                        @error('email')
                                        <span class="invalid-feedback" role='alert' style="color: red;">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password" required="" placeholder="Password">
                                        <i class="material-icons visibility" id="visibility_password" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                        <i class="material-icons visibility_off" id="visibility_off_password" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>
                                        <label for="password">Password</label>

                                        @error('password')
                                        <span class="invalid-feedback" role='alert' style="color: red;">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                       <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login
                                       </button>
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <p class="margin right-align"><a href="{{ url('admin/forgot-password') }}">Forgot password ?</a></p>
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
            
            jQuery(document).ready(function() {

                // For Show Password
                const visibility_password = document.querySelector('#visibility_password');
                const password = document.querySelector('#password');

                visibility_password.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".visibility").hide();
                    $(".visibility_off").show();
                });

                // For Hide Password
                const visibility_off_password = document.querySelector('#visibility_off_password');
                const hide_password = document.querySelector('#password');

                visibility_off_password.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = hide_password.getAttribute('type') === 'password' ? 'text' : 'password';
                    hide_password.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".visibility_off").hide();
                    $(".visibility").show();
                });
            });
        </script>
    </body>
</html>