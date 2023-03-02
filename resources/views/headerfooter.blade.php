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
                                <li class="nav-item">
                                    <a class="nav-link header_login_btn" href="#">Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
        </div>
        <!-- Header Section End -->

        <!-- Banner Section Start -->
        <section class="hero_banner__Section">
            <div class="container">
                <div class="banner__box">
                    <div class="banner_content_box text-center">
                        <h2>Find your <span>Storage Unite</span></h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="banner_tabing">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Residential</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Residential</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="banner_search_main">
                                        <form action="">
                                            <div class="banner_text_location">
                                                <input type="text" placeholder="Enter City, State or Zipcode">
                                            </div>
                                            <div class="banner_text_price">
                                                <input type="text" placeholder="Price">
                                                <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="banner_text_filter">
                                                <input type="text" placeholder="Filter">
                                                <span class="filter_text"><i class="fa fa-filter"aria-hidden="true"></i></span>
                                            </div>
                                            <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="banner_search_main">
                                        <form action="">
                                            <div class="banner_text_location">
                                                <input type="text" placeholder="Enter City, State or Zipcode">
                                            </div>
                                            <div class="banner_text_price">
                                                <input type="text" placeholder="Price">
                                                <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="banner_text_filter">
                                                <input type="text" placeholder="Filter">
                                                <span class="filter_text"><i class="fa fa-filter" aria-hidden="true"></i></span>
                                            </div>
                                            <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section End -->

        <!-- Main Section Start -->
        @yield('content')
        <!-- Main Section End -->

        <!-- Email box Section Start -->
        <section class="email_box_section">
            <div class="container-fluid">
                <div class="email_box">
                    <h2>Lorem Ipsum is simply dummy text of the printing and type setting industry.</h2>

                    <div class="email_search_box">
                        <input type="text" placeholder="Enter Your Email Address">
                        <button class="emil_submit"><span>Submit</span></button>
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

            jQuery(document).ready(function() {
           
            });
        </script>
    </body>
</html>