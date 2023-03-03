@extends('seller.headerfooter') @section('title','Forgot Password - Trouve ton entrepot')

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_seller_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-5">Forgot Password</h3>
                <div class="forgot_password_box text-center">
                    <img src="{{ config('global.front_base_seller_url').'images/forgot-password-img.png' }}" alt="forgot-password-img" class="img-fluid">
                    <p>Enter your email below and we will send you<br> a reset link on your email</p>
                </div>

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
                
                <form class="login_form" action="{{ url('/seller/send-otp') }}" method="POST" onsubmit="disabledButton();">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input name="email" id="email" type="email" class="form-control login_input" placeholder="Type..." required="">
                        <input name="page" id="page" type="hidden" class="form-control" value="Reset">
                    </div>
                    <button type="submit" class="btn btn-primary login_btn" id="submitbtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsectio

@section('customjs')
    <script type="text/javascript">
        function disabledButton() {
            document.getElementById("submitbtn").disabled = true;
        }
    </script>
@stop