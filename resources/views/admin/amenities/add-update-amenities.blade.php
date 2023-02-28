@extends('include.master')@section('title','Amenities')

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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Amenities</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Amenities List</li>
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
                                                @if(isset($amenities->id) && $amenities->id > 0)
                                                    <h4 class="card-title">Edit Amenities</h4>
                                                @else
                                                    <h4 class="card-title">Add Amenities</h4>
                                                @endif
											</div>
										</div>	
									</div>
                                    <form class="formValidate0" id="amenities_form" enctype="multipart/form-data" action="{{ route('admin.saveamenities') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $amenities->id }}">
                							<div class="input-field col s6">
                								<strong>Category :</strong>
                								<select id="cat_id" name="cat_id" class="browser-default" tabindex="1">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $key => $value)
                                                    	@if($value->id == $amenities->cat_id)
                                                        	<option value="{{ $value->id }}" selected>
                                                        	{{ $value->name }}</option>
                                                        @else
                                                        	<option value="{{ $value->id }}">
                                                            {{ $value->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('cat_id')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                							</div>

                							<div class="input-field col s6">
                								<strong>Name :</strong>
                								<input type="text" name="name" id="name" class="form-control" value="{{ $amenities->name }}" placeholder="Name" tabindex="2" />
                								@error('name')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s12">
                								<a href="{{ url('admin/amenities') }}" class="btn waves-effect waves-light left">Cancel</a>

	                							@if(isset($amenities->id) && $amenities->id != '')
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

            $("#amenities_form").validate({
                rules: {
                    "cat_id": {
                        required: true
                    },
                    "name": {
                        required: true
                    },
                },
                messages: {
                    "cat_id": {
                        required: "Please Select Category."
                    },
                    "name": {
                        required: "Name is Required."
                    },
                }
            });
        });
    </script>
@stop