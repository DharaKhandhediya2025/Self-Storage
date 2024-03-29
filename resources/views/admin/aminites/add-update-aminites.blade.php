@extends('include.master')@section('title','Aminites')

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
        <x-admin.form-header title="Aminites" subtitle="Aminites"></x-admin.form-header>
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
                                                @if(isset($aminites->id) && $aminites->id > 0)
                                                    <h4 class="card-title">Edit Aminites</h4>
                                                @else
                                                    <h4 class="card-title">Add Aminites</h4>
                                                @endif
											</div>
										</div>	
									</div>
                                    <form class="formValidate0" id="aminites_form" enctype="multipart/form-data" action="{{ route('admin.saveaminites') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $aminites->id }}">
                							<div class="input-field col s6">
                								<strong>Category :</strong>
                								<select id="cat_id" name="cat_id" class="browser-default" tabindex="1">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $key => $value)
                                                    	@if($value->id == $aminites->cat_id)
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
                								<input type="text" name="name" id="name" class="form-control" value="{{ $aminites->name }}" placeholder="Name" tabindex="2" />
                								@error('name')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s12">
                								<a href="{{ url('admin/aminites') }}" class="btn waves-effect waves-light left">Cancel</a>

	                							@if(isset($aminites->id) && $aminites->id != '')
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

            $("#aminites_form").validate({
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