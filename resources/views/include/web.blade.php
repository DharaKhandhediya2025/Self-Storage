<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		@yield('customcss')

		<link rel="icon" type="image/png" href="{{config('global.front_base_url').'images/logo_icon.png'}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/ion.rangeSlider.min.css'}}">
		<!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/jquery-ui.css'}}">
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/slick.css'}}">
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/slick-theme.css'}}">
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/bootstrap.min.css'}}">
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/style.css'}}">
		<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/responsive.css'}}">
	</head>
	<body>
		<div id="main">
			@yield('content')
		</div>

		@yield('customjs')

		<!-- script start -->
		<script src="{{ config('global.front_base_url').'js/jquery.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/popper.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/bootstrap.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/slick.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/ion.rangeSlider.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/jquery-ui.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/jquery.ui.touch-punch.min.js'}}"></script>
        <script src="{{ config('global.front_base_url').'js/script.js'}}"></script>
        <script type="text/javascript">

            // Facebook Redirection Changes
            var idx = window.location.toString().indexOf("#_=_"); 
            if (idx > 0) { 
                window.location = window.location.toString().substring(0, idx); 
            }
        </script>
	</body>
</html>