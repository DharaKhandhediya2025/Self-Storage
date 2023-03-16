@extends('buyer.headerfooter') @section('title','Create An Account - Trouve ton entrepot')

@section('customcss')
	
	<link rel="stylesheet" type="text/css" href="{{ config('global.front_base_url').'css/select2.min.css' }}">

	<style type="text/css">
		.select2-container .select2-selection--single {
			height: 45px;
		}
		.select2-container--default .select2-selection--single .select2-selection__arrow b {
			top: 80%;
		}
		.select2-container--default .select2-selection--single span {
			top: 80%;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered {
			line-height: 40px;
		}
	</style>
@stop

@section('content')
    <div class="login_wrapper">
        <div class="logo_box">
            <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
        </div>
        <div class="login_main_box ">
            <div class="login_box create_login_main_box">
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-4 Create_Account_text">Create An Account</h3>

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

                <form class="login_form" autocomplete="off" action="{{ url('/buyer-register') }}" method="POST" onsubmit="disabledButton();" enctype="multipart/form-data">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">

                	<div class="img_upload_box text-center">
	                    <!-- <div class="img-edit">
                            <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                            <label for="imageUpload"></label>
	                    </div>
	                    <div class="img_priview">
	                        <img src="{{ config('global.front_base_url').'images/user_default.png' }}" alt="avtar" class="img-fluid">
	                    </div> -->
	                    <div class="profle_img">
	                        <div class="circle">
	                            <img class="profile-pic" src="{{ config('global.front_base_url').'images/user_default.png' }}" alt="profile_signup">

	                        </div>
	                        <div class="p-image">
	                            <i class="fa fa-camera upload-button"></i>
	                            <input class="file-upload" type="file" accept="image/*" id="profile_image" name="profile_image" />
	                        </div>
                    	</div>
	                </div>

                    <div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id= "name" class="form-control login_input" placeholder="Type..." required="">
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" name="email" id= "email" class="form-control login_input" placeholder="Type..." required="">
					</div>
					<div class="form-group">
						<label>Country Code</label>
						<select name="country_code" id="country_code" class="form-control login_country_select" required="" placeholder="Select Country Code">
							<option value="">Select Country Code</option>
							@if(isset($countries) && sizeof($countries) > 0)
								@foreach($countries as $key => $value)
									<option value="{{ $value->dial_code }}">{{ $value->name }} ({{ $value->dial_code }})</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input maxlength="15" type="tel" name="phone" id="phone" class="form-control login_input" placeholder="Type..." required="" >
						<span class="phonealert" style="color:red;"></span>
					</div>
					<div class="form-group mb-4">
                        <label>Password</label>
                        <input type="password" name="password" id= "password" class="form-control login_input"><i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>
                    <button type="submit" class="btn btn-primary login_btn" id="submitbtn">Register
                    </button>
                </form>
                <div class="text-center">
                    <p class="new_user_text mb-0">Already have an account ? <a href="{{ url('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ config('global.front_base_url').'js/select2.min.js' }}"></script>
	<script type="text/javascript">

		$("#country_code").select2();

		function disabledButton() {
			document.getElementById("submitbtn").disabled = true;
		}

		$(document).ready(function () {

		    var readURL = function (input) {

		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('.profile-pic').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }

		    $(".file-upload").on('change', function () {
		        readURL(this);
		    });

		    $(".upload-button").on('click', function () {
		        $(".file-upload").click();
	    	});
		});


	</script>
	<script type="text/javascript">

			$("#country_code").select2({'height' : '50px'});

			function disabledButton() {
				document.getElementById("submitbtn").disabled = true;
			}

			$('#phone').keypress(function (e) {

            	var length = jQuery(this).val().length;

	            if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
	                return false;
	            }
	            else if((length == 0) && (e.which == 48)) {
	                return false;
	            }
	            else if(length < 3 || length > 15) {
	        		$("span.phonealert").html("Your number must be between 7 to 15 digits.");
	            }
	            else if(length > 7) {
	        		$("span.phonealert").html('');
	            }
	        });
		</script>
@stop