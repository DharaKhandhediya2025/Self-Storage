@extends('buyer.headerfooter') @section('title','Reset Success - Trouve ton entrepot')

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <div class="forgot_password_box text-center mb-4 mt-5">
                    <img src="{{ config('global.front_base_url').'images/password-reset-img.png' }}" alt="forgot-password-img" class="img-fluid">
                    <h4 class="pasword_succ_text">Password Reset Successfully.</h4>
                    <p>Verification is a success and you can <br>now proceed</p>
                </div>
                <a href="{{ url('/login') }}">
                    <button type="submit" class="btn btn-primary login_btn mb-5">Continue</button>
                </a>
            </div>
        </div>
    </div>
@endsection