@extends('include.master')@section('title','Category')

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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Category</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Category List</li>
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
                                                @if(isset($category->id) && $category->id > 0)
                                                    <h4 class="card-title">Edit Category</h4>
                                                @else
                                                    <h4 class="card-title">Add Category</h4>
                                                @endif
                                            </div>
										</div>	
									</div>
									<form class="formValidate0" id="category_form" enctype="multipart/form-data" action="{{ route('admin.savecategory') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $category->id }}">

                							<div class="input-field col s12">
                								<input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"/>
                								@error('name')
	                                                <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s3">
                								<a href="{{ url('admin/category') }}" class="btn waves-effect waves-light left">Cancel</a>
                							</div>

                							<div class="input-field col s6"></div>

                							@if(isset($category->id) && $category->id != '')
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

            $("#category_form").validate({
                rules: {
                    "name": {
                        required: true
                    },
                },
                messages: {
                    "name": {
                        required: "Category Name is Required."
                    },
                }
            });
        });
    </script>
@stop