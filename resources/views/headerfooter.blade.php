<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ config('global.front_base_url').'images/favicon.ico' }}" type="image/x-icon">
        
        <title>@yield('title')</title>

        @yield('customcss')

        <link rel="icon" type="image/png" href="{{ config('global.front_base_url').'images/logo_icon.png' }}"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/bootstrap.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/slick.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/slicktheme.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/style.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/responsive.css' }}">
    </head>

    <body>

        <!-- Header Section Start -->
        <div class="Header_main">
            <div class="header_top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="header_top_left">
                                <a href="#"><img src="{{ config('global.front_base_url').'images/mail.png' }}" alt="mail"><span>loremipsum@mail.com</span></a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="header_top_right">
                                <a href="#"><img src="{{ config('global.front_base_url').'images/youtube.png' }}" alt="youtube"></a>
                                <a href="#"><img src="{{ config('global.front_base_url').'images/instagram.png' }}" alt="instagram"></a>
                                <a href="#"><img src="{{ config('global.front_base_url').'images/facebook-white.png' }}" alt="Facebook"></a>
                                <a href="#"><img src="{{ config('global.front_base_url').'images/twitter.png' }}" alt="Twitter"></a>
                                <a href="#"><img src="{{ config('global.front_base_url').'images/linkedin.png' }}" alt="Linkedin"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <header>
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md ">
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/about-us') }}">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/contact-us') }}">Contact us</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link p-0" href="#"><img src="{{ config('global.front_base_url').'images/user-profile.png' }}" alt="user-profile" class="img-fluid"></a>
                                </li> -->

                               

                                @if(isset($buyer) && $buyer != '')
                                    
                                    @if(isset($buyer->profile_image) && $buyer->profile_image != '')
                                        <li class="nav-item">
                                            <a class="nav-link p-0" href="{{ url('/manage-profile') }}"><img src="{{ asset('storage/app/public/'.$buyer->profile_image) }}" alt="user-profile" class="img-fluid header_profile_img"></a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link p-0" href="{{ url('/manage-profile') }}"><img src="{{ asset('public/front/images/user_default.png') }}" alt="user-profile" class="img-fluid header_profile_img"></a>
                                        </li>
                                    @endif

                                   <!-- <li class="nav-item">
                                        <a class="nav-link header_login_btn" href="{{ url('/web-logout') }}" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                                    </li> -->

                                @elseif(isset($seller) && $seller != '')

                                    @if(isset($seller->profile_image) && $seller->profile_image != '')
                                       <li class="nav-item">
                                            <a class="nav-link p-0" href="{{ url('seller/manage-profile') }}"><img src="{{ asset('storage/app/public/'.$seller->profile_image) }}" alt="user-profile" class="img-fluid header_profile_img"></a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link p-0" href="{{ url('seller/manage-profile') }}"><img src="{{ asset('public/front/images/user_default.png') }}" alt="user-profile" class="img-fluid header_profile_img"></a>
                                        </li>
                                    @endif

                                   <!-- <li class="nav-item">
                                        <a class="nav-link header_login_btn" href="{{ url('/seller-logout') }}" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                                    </li> -->
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link header_login_btn" href="{{ url('/login') }}">Login</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
        </div>
        <!-- Header Section End -->

        <!-- Main Section Start -->
        @yield('content')
        <!-- Main Section End -->

        <!-- Email box Section Start -->
        <section class="email_box_section">
            <div class="container-fluid">
                <div class="email_box">
                    <h2>Lorem Ipsum is simply dummy text of the printing and type setting industry.</h2>
                    <div class="email_search_box">
                        <input type="email" id="email" placeholder="Enter Your Email Address">
                        <button class="emil_submit" onclick="addSubscriber();"><span>Submit</span></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Email box Section End -->

        <!-- Footer  Start -->
        <footer>
            <div class="container">
                <div class="footer_top">
                    <img src="{{ config('global.front_base_url').'images/Logo-white.png' }}" alt="logo-white" class="img-fluid">
                    <div class="footer_social_icon">
                        <a href="#"><img src="{{ config('global.front_base_url').'images/youtube-footer.png' }}" alt="youtube-footer" class="img-fluid"></a>
                        <a href="#"><img src="{{ config('global.front_base_url').'images/insta.png' }}" alt="insta-footer" class="img-fluid"></a>
                        <a href="#"><img src="{{ config('global.front_base_url').'images/facebook-footer.png' }}" alt="facebook-footer" class="img-fluid"></a>
                        <a href="#"><img src="{{ config('global.front_base_url').'images/twitter-footer.png' }}" alt="twitter-footer" class="img-fluid"></a>
                        <a href="#"><img src="{{ config('global.front_base_url').'images/linkedin-footer.png' }}" alt="linkedin-footer" class="img-fluid"></a>
                    </div>
                    <div class="footer_menus">
                        <a href="{{ url('/about-us') }}">About us <span>|</span></a>
                        <a href="{{ url('/contact-us') }}">Contact Us<span>|</span></a>
                        <a href="{{ url('/terms-condition') }}">Terms and conditions </a>
                    </div>
                </div>
            </div>
            <div class="footer_bottom"><p>© 2023 - Trouve Ton Entrepot. All Right Reserved</p></div>
            <a href="#" class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
        </footer>
        <!-- Footer End -->

        @yield('customjs')

        <!-- Script start -->
        <script src="{{ config('global.front_base_url').'js/jQuery.js' }}"></script>
        <script src="{{ config('global.front_base_url').'js/popper.min.js' }}"></script>
        <script src="{{ config('global.front_base_url').'js/bootstrap.js' }}"></script>
        <script src="{{ config('global.front_base_url').'js/slick.js' }}"></script>
        <script src="{{ config('global.front_base_url').'js/ion.rangeSlider.min.js' }}"></script>
        <script src="{{ config('global.front_base_url').'js/custom.js' }}"></script>
        <!-- Script End -->

        <script type="text/javascript">

            function addSubscriber() {

                var email = $("#email").val();
                var app_url = "{!! env('APP_URL') !!}";
                var token = $("input[name=_token]").val();

                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                if(email == '') {

                    alert("Please Enter Email Address.");
                    return false;
                }
                else if (reg.test(email) == false) {

                    alert('Please Enter Valid Email Address.');
                    $("#email").val("");
                    return false;
                }
                else {

                    $.ajax({

                        type: 'GET',
                        url:app_url+'/subscribe-newsletter',
                        data: {'email': email, '_token':token},
                        dataType:'json',

                        success: function (data) {
                            alert(data);
                        }
                    });
                    $("#email").val("");
                }
            }
        </script>
    </body>
</html>