@extends('include.master')@section('title','Featured Plan')

@section('css')
    <style>
        .error{
            color:#f56954 !important;
            border-color:#f56954 !important;
        }
    </style>
@endsection

@section('content')
	<div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Featured Plan</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Featured Plan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="col s12">
			<div class="container">
				<div class="section">
					<div class="row">
						<div class="col s12">
							<div id="validations" class="card card-tabs">
								<div class="card-content">
									<div class="card-title">
										<div class="row">
											<div class="col s12 m6 l10">
												<h4 class="card-title">Featured Plan</h4>
											</div>
											<div class="col s12 m6 l2"></div>
										</div>	
									</div>
                                    <form class="formValidate0" id="plan_form" enctype="multipart/form-data" action="{{ route('admin.savefeaturedplan') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $featured_plans->id }}">
                							<div class="input-field col s6">
                								<strong>Type :</strong>
                								<select id="type" name="type" class="browser-default" tabindex="1">
                                                    <option value="">Select</option>
                                                    @foreach ($plan_type as $key => $value)
                                                    	@if($key == $featured_plans->type)
                                                        	<option value="{{ $key }}" selected>
                                                        	{{ $value }}</option>
                                                        @else
                                                        	<option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                							</div>

                							<div class="input-field col s6">
                								<strong>Price :</strong>
                								<input type="text" name="price" id="price" class="form-control" value="{{ $featured_plans->price }}" placeholder="Price" tabindex="2" />
                								@error('price')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s6">
                								<strong>Validity :</strong>
                								<input type="text" name="validity" id="validity" class="form-control" value="{{ $featured_plans->validity }}" maxlength="3" placeholder="Validity" tabindex="3" />
                								@error('validity')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s6">
                								<strong>Duration :</strong>
                								<select id="duration" name="duration" class="browser-default" tabindex="4">
                                                    <option value="">Select</option>
                                                    @foreach ($duration_list as $key => $value)
                                                    	@if($value == $featured_plans->duration)
                                                        	<option value="{{ $value }}" selected>
                                                        	{{ $value }}</option>
                                                        @else
                                                        	<option value="{{ $value }}">{{ $value }}
                                                        	</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('duration')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                							</div>

                							<div class="input-field col s12">
                								<a href="{{ url('admin/featured-plan') }}" class="btn waves-effect waves-light left">Cancel</a>

	                							@if(isset($featured_plans->id) && $featured_plans->id != '')
	                								<button class="btn waves-effect waves-light right submit" type="submit" name="action">Update</button>
	                							@else
		                							<button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
		                							<i class="material-icons right">send</i></button>
		                						@endif
	                						</div>
	                					</div>
                					</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript">

        jQuery(document).ready(function() {

            $("#plan_form").validate({
                rules: {
                    "type": {
                        required: true
                    },
                    "price": {
                        required: true
                    },
                    "validity": {
                        required: true
                    },
                    "duration": {
                        required: true
                    },
                },
                messages: {
                    "type": {
                        required: "Please Select Plan Type."
                    },
                    "price": {
                        required: "Price is Required."
                    },
                    "validity": {
                        required: "Validity is Required."
                    },
                    "duration": {
                        required: "Duration is Required."
                    },
                }
            });
        });

        $('#price').keypress(function (e) {

            var length = jQuery(this).val().length;

            if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            else if((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        $('#validity').keypress(function (e) {

            var length = jQuery(this).val().length;

            if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            else if((length == 0) && (e.which == 48)) {
                return false;
            }
        });
    </script>
@stop