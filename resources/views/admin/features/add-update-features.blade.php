@extends('include.master')@section('title','Features')

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
        <x-admin.form-header title="Features" subtitle="Features"></x-admin.form-header>
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
                                                @if(isset($features->id) && $features->id > 0)
                                                    <h4 class="card-title">Edit Features</h4>
                                                @else
                                                    <h4 class="card-title">Add Features</h4>
                                                @endif
                                            </div>
										</div>	
									</div>
									<form class="formValidate0" id="features_form" enctype="multipart/form-data" action="{{ route('admin.savefeatures') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $features->id }}">

                							<div class="input-field col s12">
                								<input type="text" name="name" id="name" class="form-control" value="{{ $features->name }}"/>
                								@error('name')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s3">
                								<a href="{{ url('admin/features') }}" class="btn waves-effect waves-light left">Cancel</a>
                							</div>

                							<div class="input-field col s6"></div>

                							@if(isset($features->id) && $features->id != '')
                								<div class="input-field col s3">
                									<button class="btn waves-effect waves-light right submit" type="submit" name="action">Update</button>
                								</div>
                							@else
	                							<div class="input-field col s3">
	                								<button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
	                								<i class="material-icons right">send</i></button>
	                							</div>
	                						@endif
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

            $("#features_form").validate({
                rules: {
                    "name": {
                        required: true
                    },
                },
                messages: {
                    "name": {
                        required: "Feature Name is Required."
                    },
                }
            });
        });
    </script>
@stop