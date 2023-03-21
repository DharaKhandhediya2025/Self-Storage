@extends('buyer.headerfooter') @section('title','Buyer Login - Trouve ton entrepot')

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-5">Login</h3>

                @if (session()->has('message')) 
                    <div class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('message') }} 
                    </div> 
                @endif

                @if (session()->has('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('error') }} 
                    </div> 
                @endif

                <form class="login_form" autocomplete="off" action="{{ url('/buyer-login') }}" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control login_input">
                    </div>
                    <div class="form-group mb-4">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control login_input"><i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>
                    <button type="submit" class="btn btn-primary login_btn">Login</button>
                </form>

                <div class="text-center">
                    <a href="{{ url('forgot-password') }}" class="forgot_password_text">Forgot Password</a>
                    <h6 class="or_sign_text">Or sign in with</h6>
                    <div class="other_login_box">
                        <a href="{{ url('buyer-google-login') }}"><img src="{{ config('global.front_base_url').'images/google.png' }}" alt="google-img"></a>
                        <a href="{{ url('buyer-facebook-login') }}"><img src="{{ config('global.front_base_url').'images/facebook.png' }}" alt="facebook-img"></a>
                        
                    </div>
                    <p class="new_user_text">New user? <a href="{{ url('buyer-signup') }}">Create an account</a></p>
                    <p class="seller_text">You are a seller? <a href="{{ url('seller/login') }}">Seller login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection