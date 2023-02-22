<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Self Storage">
        <meta name="keywords" content="Self Storage">
        <meta name="author" content="ThemeSelect">

        <link rel="shortcut icon" type="image/x-icon" href="{{config('global.front_base_url').'images/logo_icon.png'}}"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Self Storage</title>
        
        <!-- BEGIN: VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/vendors/vendors.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
        <!-- END: VENDOR CSS-->

        <!-- BEGIN: DATA TABLES CSS-->
        <link rel="stylesheet" type="text/css" href="{{ url('/public/app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('/public/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('/public/app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
        <!-- END: DATA TABLES CSS-->

        <!-- BEGIN: Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/vertical-dark-menu-template/materialize.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/themes/vertical-dark-menu-template/style.css') }}">
        <!-- END: Page Level CSS-->

        <!-- BEGIN: DATA TABLES CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/data-tables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/page-users.css')}}">
        <!-- END: DATA TABLES CSS-->
        
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/dashboard.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/custom/custom.css') }}">
        <!-- END: Custom CSS-->

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    </head>
    <!-- END: Head-->

    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
        
        <!--Header Start-->
        <header class="page-topbar" id="header">
            <div class="navbar navbar-fixed">
                <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
                    <div class="nav-wrapper">
                        <ul class="navbar-list right">
                            <li>
                                <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online" style="width: 35px;"><img src="{{ asset('public/app-assets/images/avatar/user_default.png') }}" alt="avatar"><i></i></span></a>
                            </li>
                        </ul>

                        <ul class="dropdown-content" id="profile-dropdown">
                            
                            <li><a class="grey-text text-darken-1" href="{{ route('admin.changepassword') }}">
                                <i class="material-icons">edit</i>Change Password</a></li>

                            <li>
                                <a class="grey-text text-darken-1" href="{{ url('/admin/logout') }}" onclick="return confirm('Are you sure you want to logout?')">
                                <i class="material-icons">power_settings_new</i>{{ __('Logout')}}</a>
                            </li>
                        </ul>
                    </div>

                    <nav class="display-none search-sm">
                        <div class="nav-wrapper">
                            <form id="navbarForm">
                                <div class="input-field search-input-sm">
                                    <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">

                                    <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>

                                    <ul class="search-list collection search-list-sm display-none"></ul>
                                </div>
                            </form>
                        </div>
                    </nav>
                </nav>
            </div>
        </header>
        <!--Header End-->

        <!--Sidebar Start-->
        <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a class="brand-logo darken-1 sidebar_logo" href="{{ url('/admin/dashboard') }}">
                        <img class="hide-on-med-and-down " src="{{ config('global.front_base_url').'images/logo.png'}}" alt="Self Storage" />
                        <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ config('global.front_base_url').'images/logo.png'}}" alt="Self Storage" />
                    </a>
                </h1>
            </div>

            <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">

                <li class="active bold">
                    <a class="waves-effect waves-cyan {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}" title="Dashboard">
                        <i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="active bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/banners') ? 'active' : '' }}" href="{{ url('/admin/banners') }}" title="Banners">
                        <i class="material-icons">image</i><span class="menu-title" data-i18n="Banners">Banners</span>
                    </a>
                </li>

                <li class="active bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/country') ? 'active' : '' }}" href="{{ url('/admin/country') }}" title="Country">
                        <i class="material-icons">my_location</i><span class="menu-title" data-i18n="Country">Country</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/category') ? 'active' : '' }}" href="{{ url('/admin/category') }}" title="Category">
                        <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Category">Category</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/subcategory') ? 'active' : '' }}" href="{{ url('/admin/subcategory') }}" title="Sub Category">
                        <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Sub Category">Sub Category</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'inquiry') ? 'active' : '' }}" href="{{ url('/admin/inquiry') }}" title="Inquiry">
                        <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Inquiry">Inquiry</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'feedback') ? 'active' : '' }}" href="{{ url('/admin/feedback') }}" title="Feedback">
                        <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Feedback">Feedback</span>
                    </a>
                </li>

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">assignment</i><span data-i18n="Content Page">Content Pages</span></a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li class="bold">
                                <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'faq') ? 'active' : '' }}" href="{{ url('/admin/faq-list') }}">
                                    <i class="material-icons">question_answer</i><span class="menu-title" data-i18n="FAQ's">FAQ's</span>
                                </a>
                            </li>
                            <li class="bold">
                                <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/terms-condition') ? 'active' : '' }}" href="{{ url('/admin/terms-condition') }}">
                                    <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Terms & Conditions">Terms & Conditions</span>
                                </a>
                            </li>
                            <li class="bold">
                                <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/privacy-policy') ? 'active' : '' }}" href="{{ url('/admin/privacy-policy') }}">
                                    <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Privacy Policy">Privacy Policy</span>
                                </a>
                            </li>
                            <li class="bold">
                                <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/about-us') ? 'active' : '' }}" href="{{ url('/admin/about-us') }}">
                                    <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="About Us">About Us</span>
                                </a>
                            </li>
                            <li class="bold">
                                <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/contact-us') ? 'active' : '' }}" href="{{ url('/admin/contact-us') }}">
                                    <i class="material-icons">phone</i><span class="menu-title" data-i18n="Contact Us">Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <div class="navigation-background"></div>

            <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
        </aside>
        <!--Sidebar End-->

        <div id="main">
            <div>
                <div class="row">
                    <div class="col s12">
                        <div class="container">
                            <div class="section">
                                <!-- card stats start -->
                                <div id="card-stats" class="pt-0">
                                    <div class="row">
                                        <div class="col s12 m12">
                                            <h6><b>
                                                <div id="reportrange" style="cursor: pointer;margin-top: 15px;">
                                                    <i class="material-icons">date_range</i>&nbsp;<span></span>
                                                </div>
                                            </b></h6>
                                            <input type="hidden" name="date_range" id="date_range">
                                        </div>
                                        <a href="#" onClick="getData('/admin/buyers')" title="Buyers">
                                            <div class="col s12 m6 l6 xl3">
                                                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                                    <div class="padding-4">
                                                        <div class="row">
                                                            <div class="col s7 m7">
                                                                <i class="material-icons background-round mt-5">person</i><p>Buyers</p>
                                                            </div>
                                                            <div class="col s5 m5 right-align">
                                                                <h5 class="mb-0 white-text"><span id="buyers_count">{{ $buyers }}</span></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" onClick="getData('/admin/sellers')" title="Sellers">
                                            <div class="col s12 m6 l6 xl3">
                                                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                                    <div class="padding-4">
                                                        <div class="row">
                                                            <div class="col s7 m7">
                                                                <i class="material-icons background-round mt-5">person</i><p>Sellers</p>
                                                            </div>
                                                            <div class="col s5 m5 right-align">
                                                                <h5 class="mb-0 white-text"><span id="sellers_count">{{ $sellers }}</span></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--card stats end-->
                            </div>
                        </div><div class="content-overlay"></div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
        
        {{-- @include('include.footer') --}}

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <!-- BEGIN VENDOR JS-->
        <script src="{{ asset('public/app-assets/js/vendors.min.js') }}"></script>
        <script src="{{ asset('public/app-assets/vendors/sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- END VENDOR JS-->

        <!-- BEGIN DATA TABLES JS-->
        <script src="{{ asset('public/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('public/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('public/app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>
        <!-- END DATA TABLES JS-->

        <!-- BEGIN THEME  JS-->
        <script src="{{ asset('public/app-assets/js/plugins.js') }}"></script>
        <script src="{{ asset('public/app-assets/js/search.js') }}"></script>
        <script src="{{ asset('public/app-assets/js/custom/custom-script.js') }}"></script>
        <script src="{{ asset('public/app-assets/js/scripts/advance-ui-carousel.js') }}"></script>
        <!-- END THEME  JS-->

        <!-- BEGIN PAGE LEVEL JS-->
        <!-- <script src="{{ asset('public/app-assets/js/scripts/dashboard-analytics.js') }}"></script> -->
        <script src="{{ asset('public/app-assets/js/scripts/data-tables.js')}}"></script>
        <script src="{{ asset('public/app-assets/js/scripts/page-users.js')}}"></script>
        <!-- END PAGE LEVEL JS-->

        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script type="text/javascript">

            jQuery(document).ready(function() {

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {

                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, getCalender);

                // Call for on page load
                getCalender(start, end);

                $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                    getDataByDate();
                });
            });
            
            var start = moment();
            var end = moment();

            function getCalender(start, end) {
                
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('#date_range').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            
            var start_date = '';
            var end_date = '';

            function getDataByDate() {
                
                var date_range = $('#date_range').val();
                const dateArray = date_range.split("-");

                var from_date = moment(dateArray[0]).format("YYYY-MM-DD");
                var to_date = moment(dateArray[1]).format("YYYY-MM-DD");

                start_date = moment(dateArray[0]).format("YYYY-MM-DD");
                end_date = moment(dateArray[1]).format("YYYY-MM-DD");

                var app_url = "{!! env('APP_URL'); !!}";
                var token = $('input[name="csrf_token"]').val();

                $.ajax({

                    type : 'GET',
                    url : app_url+'/admin/dashboard/datewise',
                    data : {from_date : from_date,to_date : to_date, '_token':token},
                    dataType : 'json',
                    success: function(response) {
                       
                        var buyers_count = response['buyers'];
                        var sellers_count = response['sellers'];
                        var posts_count = response['posts'];
                        var featured_plans_count = response['featured_plans'];
                        var buyers_contact_sellers_count = response['buyers_contact_sellers'];

                        $("#buyers_count").html("" + buyers_count + "");
                        $("#sellers_count").html("" + sellers_count + "");
                        $("#posts_count").html("" + posts_count + "");
                        $("#featured_plans_count").html("" + featured_plans_count + "");
                        $("#buyers_contact_sellers_count").html("" + buyers_contact_sellers_count + "");
                    }
                });
            }

            function getData(passed_url) {

                var base_url = "{!! env('APP_URL'); !!}";

                if(start_date != '' && end_date != '') {
                    var redirect_url = base_url+passed_url+"?start_date="+start_date+"&end_date="+end_date;
                }
                else {
                    var redirect_url = base_url+passed_url;
                }
                window.location = redirect_url;
            }
        </script>
    </body>
</html>