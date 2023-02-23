<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="ThemeSelect">

        <title>RBS - Reset Password</title>

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

                            <form class="login-form" action="{{url('admin/set-password')}}" method="POST">@csrf
                                <div class="row">
                                    <h5 class="ml-4">Reset Password</h5>
                                </div>

                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="pwd" name="pwd" type="password" required="" placeholder="New Password">
                                        <i class="material-icons new_visibility" id="new_visibility_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                        <i class="material-icons new_visibility_off" id="new_visibility_off_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>
                                        <label for="pwd">New Password</label>
                                    </div>
                                </div>

                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="confirm_pwd" name="confirm_pwd" type="password" required="" placeholder="Confirm Password">
                                        <i class="material-icons confirm_visibility" id="confirm_visibility_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                        <i class="material-icons confirm_visibility_off" id="confirm_visibility_off_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>
                                        <label for="confirm_pwd">Confirm Password</label>
                                    </div>
                                </div>

                                <?php $email = session('email'); ?>
                                <input type="hidden" name="email" id="email" value="{{ $email }}">
                                
                                <div class="row">
                                    <div class="input-field col s12">
                                       <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Reset
                                       </button>
                                    </div>
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

                // For New Password
                const new_visibility_pwd = document.querySelector('#new_visibility_pwd');
                const pwd = document.querySelector('#pwd');

                new_visibility_pwd.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    pwd.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".new_visibility").hide();
                    $(".new_visibility_off").show();
                });

                // For Hide New Password
                const new_visibility_off_pwd = document.querySelector('#new_visibility_off_pwd');
                const hide_pwd = document.querySelector('#pwd');

                new_visibility_off_pwd.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = hide_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    hide_pwd.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".new_visibility_off").hide();
                    $(".new_visibility").show();
                });

                // For Confirm Password
                const confirm_visibility_pwd = document.querySelector('#confirm_visibility_pwd');
                const confirm_pwd = document.querySelector('#confirm_pwd');

                confirm_visibility_pwd.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = confirm_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirm_pwd.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".confirm_visibility").hide();
                    $(".confirm_visibility_off").show();
                });

                // For Hide Confirm Password
                const confirm_visibility_off_pwd = document.querySelector('#confirm_visibility_off_pwd');
                const hide_confirm_pwd = document.querySelector('#confirm_pwd');

                confirm_visibility_off_pwd.addEventListener('click', function (e) {

                    // toggle the type attribute
                    const type = hide_confirm_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    hide_confirm_pwd.setAttribute('type', type);

                    // toggle the eye slash icon
                    $(".confirm_visibility_off").hide();
                    $(".confirm_visibility").show();
                });
            });
        </script>
    </body>
</html>