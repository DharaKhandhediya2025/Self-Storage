@extends('buyer.headerfooter') @section('title','Verify OTP - Trouve ton entrepot')

@section('customcss')
	<style type="text/css">
		.verification_input {
			text-align: center;
		}
	</style>
@stop

@section('content')
   <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box">
            <div class="login_box">

            	@if (session()->has('message')) 
                    <div class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        </button>{{ session('message') }} 
                    </div>
                @endif

                @if (session()->has('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('error') }} 
                    </div>
                @endif

                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-5">Verification</h3>
                <div class="forgot_password_box text-center">
                    <p class="mb-3">Check your email for the OTP</p>
                </div>
                <form action="{{ url('/save-verify-otp') }}" method="POST">
                    <div class="form-group verification_form_group">

                    	<input type="text" class="form-control verification_input" maxlength="1" id="digit1" name="digit1" required="">
						<input type="text" class="form-control verification_input" maxlength="1" id="digit2" name="digit2" required="">
						<input type="text" class="form-control verification_input" maxlength="1" id="digit3" name="digit3" required="">
						<input type="text" class="form-control verification_input" maxlength="1" id="digit4" name="digit4" required="">
                    </div>

                    <?php 
						$email = session('email');
						$page = session('page');
					?>
                    <input type="hidden" name="email" id="email" value="{{ $email }}">
					<input type="hidden" name="page" id="page" value="{{ $page }}">

                    <div class="verification_box_bottom text-center">
                        <p>Didn’t recive a verification code?</p>
                        <a href="javascript:sendOTP();" class="resend_text">Resend the code</a>
                    </div>

                    <button type="submit" class="btn btn-primary login_btn mt-5">Continue</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">

		$(".verification_input").keyup(function () {

		    if (this.value.length == this.maxLength) {
		      $(this).next('.verification_input').focus();
		    }
		});

		$('.verification_input').keypress(function (e) {

            var length = jQuery(this).val().length;

            if(e.which != 8  && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

		function sendOTP() {

			var app_url = "{!! env('APP_URL'); !!}";
			var url = app_url+'/resend-otp';
			var email = $("#email").val();
			var page = $("#page").val();

            var form = $('<form action="' + url + '" method="post">' +
            '<input type="hidden" name="email" value="'+email+'" />' +
            '<input type="hidden" name="page" value="'+page+'" />' +
            '<input type="hidden" name="_token" value="{{ csrf_token() }}" />' +
            '</form>');
            $('body').append(form);
            form.submit();
		}
	</script>
@stop