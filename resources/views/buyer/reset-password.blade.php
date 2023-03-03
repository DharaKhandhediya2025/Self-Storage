@extends('buyer.headerfooter') @section('title','Reset Password - Trouve ton entrepot')

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-5">Reset Password</h3>
                <div class="forgot_password_box text-center mb-4">
                    <img src="{{ config('global.front_base_url').'images/success-img.png' }}" alt="forgot-password-img" class="img-fluid">
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
                
                <form class="login_form" action="{{ url('/set-password') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control login_input" name="password" id="password" placeholder="Type..." required="">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control login_input" name="confirm_password" id="confirm_password" placeholder="Type..." required="">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>

                    <?php $email = session('email'); ?>
                    <input type="hidden" name="email" id="email" value="{{ $email }}">
                    <button type="submit" class="btn btn-primary login_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection