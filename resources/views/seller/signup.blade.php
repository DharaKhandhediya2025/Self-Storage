@extends('seller.headerfooter') @section('title','Create An Account')

@section('customcss')
	
	<style type="text/css">

		.select2-container--default .select2-selection--single .select2-selection__arrow b {
			top: 80%;
		}
		.select2-container--default .select2-selection--single span {
			top: 80%;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered {
			line-height: 60px;
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
                <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                <h3 class="login_text mt-4 mb-4">Create An Account</h3>

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

                <form class="login_form" autocomplete="off" action="{{ url('/seller-register') }}" method="POST" onsubmit="disabledButton();" enctype="multipart/form-data">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">

                	<div class="img_upload_box text-center">
	                    <div class="img-edit">
                            <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                            <label for="imageUpload"></label>
	                    </div>
	                    <div class="img_priview">
	                        <img src="{{ config('global.front_base_url').'images/user_default.png' }}" alt="avtar" class="img-fluid">
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
						<select name="country_code" id= "country_code" class="form-control" required="" placeholder="Select Country Code">
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
						<input type="number" name="phone" id= "phone" class="form-control login_input" placeholder="Type..." required="">
					</div>
					<div class="form-group mb-4">
                        <label>Password</label>
                        <input type="password" class="form-control login_input">
                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>
                    <button type="submit" class="btn btn-primary login_btn" id="submitbtn">Register
                    </button>
                </form>
                <div class="text-center">
                    <p class="new_user_text mb-0">Already have an account ? <a href="{{ url('seller/login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
	<script type="text/javascript">

		$("#country_code").select2({'height' : '50px'});

		function disabledButton() {
			document.getElementById("submitbtn").disabled = true;
		}
	</script>
@stop