@extends('include.master')@section('title','Contact Us')

@section('content')
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Contact Us</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <!-- HTML VALIDATION  -->
                    <div class="row">
                        <div class="col s12">
                            <div id="html-view-validations">
                                @if(session('message'))
                                    <div class="card-alert card green">
                                        <div class="card-content white-text">
                                            <p>{{session('message')}}</p>
                                        </div>
                                    </div>
                                @endif
                                @if(session('fail'))
                                    <div class="card-alert card red">
                                        <div class="card-content white-text">
                                            <p>{{session('fail')}}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div id="html-validations" class="card card-tabs">
                                <div class="card-content">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col s12 m6 l10">
                                                <h4 class="card-title">Contact Us</h4>
                                            </div>
                                            <div class="col s12 m6 l2"></div>
                                        </div>
                                    </div>
                                    <form class="formValidate0" id="formValidate0" method="post" enctype="multipart/form-data" action="{{ route('admin.contactusadd') }}">@csrf
                                        <div class="row">
                                            <div class="input-field col s6">
                                            	<i class="material-icons prefix">mail</i>

                                            	@if(isset($data))
	                								<input id="icon_email" type="email" class="validate" name="email" id="email" value="{{ $data->email }}" />
	                							@else
	                								<input id="icon_email" type="email" class="validate" name="email" id="email" />
	                							@endif
	                							
                                                <label for="icon_email">Email</label>

	                							@error('email')
                                                    <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                @enderror
	                						</div>
	                						<div class="input-field col s6">
	                							<i class="material-icons prefix">phone</i>
	                								
	                							@if(isset($data))
	                								<input id="icon_telephone" type="text" class="validate" name="phone" id="phone" value="{{ $data->phone }}" maxlength="15">
	                							@else
	                								<input id="icon_telephone" type="text" class="validate" name="phone" id="phone" maxlength="15">
	                							@endif
	                							
                                                <label for="icon_telephone">Phone</label>

	                							@error('phone')
                                                    <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                 @enderror
	                						</div>
                                            <div class="input-field col s12">
                                                <label for="description"></label>

                                                @if(isset($data))
	                								<textarea id="description" name="description" placeholder="Description">{{ $data->description }}
	                									</textarea>
	                							@else
	                								<textarea id="description" name="description" placeholder="Description"></textarea>
	                							@endif

                                                @error('description')
                                                    <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right submit" type="submit">Submit<i class="material-icons right">send</i></button>
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
@endsection

@section('js')
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

	<script>
		CKEDITOR.replace('description', {
        });

        $('#icon_telephone').keypress(function (e) {

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