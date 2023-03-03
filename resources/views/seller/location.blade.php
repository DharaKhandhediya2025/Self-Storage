@extends('seller.headerfooter') @section('title','Confirm Location - Trouve ton entrepot')

@section('customcss')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@stop

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_seller_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-5">Select location</h3>
                <!-- <div class="location__box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.297337633656!2d72.6680990149575!3d23.049558221103034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e87960158f889%3A0x2bda7d524f9233f4!2sApp%20Ideas%20Infotech%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1677742577017!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <form class="login_form">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control login_input" placeholder="Select Location">
                    </div>
                   
                    <button type="submit" class="btn btn-primary login_btn ">Confirm location</button>
                </form> -->
                <div id="iframe_div"></div>
                    
                <form class="login_form" action="{{ url('/seller-save-location') }}" method="POST">@csrf
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="autocomplete" id="autocomplete" class="form-control login_input" placeholder="Select Location">
                        <input type="hidden" id="latitude" name="latitude" class="form-control">
                        <input type="hidden" name="longitude" id="longitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <?php $email = session('email'); ?>
                        <input type="hidden" name="email" id="email" value="{{ $email }}">
                    </div>
                    <button type="submit" class="btn btn-primary login_btn ">Confirm location</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $(window).keydown(function(event) {

                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        google.maps.event.addDomListener(window, 'load', initialize);
        
        function initialize() {

            getLocation();

            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
  
            autocomplete.addListener('place_changed', function () {

                var place = autocomplete.getPlace();

                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            });
        }

        function getLocation() {
            navigator.geolocation.getCurrentPosition(onSuccess, onError);
        }

        function onError() {
            console.log("Please allow to location fetched");
        }

        function onSuccess(position) {

            const {
                latitude,
                longitude
            } = position.coords;

            $("#iframe_div").html('');

            var html = '';

            html += '<div class="location__box">';

            html += '<iframe src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAP_KEY') }} &q='+latitude+','+longitude+'"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
            html += '</div>';

            $("#iframe_div").html(html);

            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
        }
    </script>
@stop