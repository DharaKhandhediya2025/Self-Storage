<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ config('global.front_base_seller_url').'images/favicon.ico' }}" type="image/x-icon">
        
        <title>@yield('title')</title>

        @yield('customcss')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ config('global.front_base_seller_url').'css/bootstrap.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_seller_url').'css/style.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_seller_url').'css/responsive.css' }}">
    </head>

    <body>

        <!-- Main Section Start -->
        @yield('content')
        <!-- Main Section End -->

        @yield('customjs')

        <!-- Script start -->
        <script src="{{ config('global.front_base_seller_url').'js/jQuery.js' }}"></script>
        <script src="{{ config('global.front_base_seller_url').'js/bootstrap.js' }}"></script>
        <script src="{{ config('global.front_base_seller_url').'js/custom.js' }}"></script>
        <!-- Script End -->

        <script type="text/javascript">

            jQuery(document).ready(function() {
           
            });
        </script>
    </body>
</html>