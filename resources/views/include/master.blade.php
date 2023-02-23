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

        <title>@yield('title')</title>
        
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
        
        @yield('css')
    </head>
    <!-- END: Head-->

    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
        
        <!--Header Start-->
            @include('include.header')
        <!--Header End-->

        <!--Sidebar Start-->
            @include('include.sidebar')
        <!--Sidebar End-->

        <div id="main">
            @yield('content')
            <div class="content-overlay"></div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <!-- BEGIN VENDOR JS-->
        <script src="{{ asset('public/app-assets/js/vendors.min.js') }}"></script>
        <script src="{{ asset('public/app-assets/vendors/sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- END VENDOR JS-->

        <!-- BEGIN CHART JS-->
        <!-- <script src="{{ asset('public/app-assets/vendors/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('public/app-assets/vendors/chartist-js/chartist.min.js') }}"></script>
        <script src="{{ asset('public/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js') }}"></script>
        <script src="{{ asset('public/app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js') }}">
        </script> -->
        <!-- END CHART JS-->

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

        @yield('js')

        @livewireScripts

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