@extends('include.master')@section('title','FAQs')

@section('content')
	<div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>FAQs</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">FAQ List</li>
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
												<h4 class="card-title">FAQ</h4>
											</div>
											<div class="col s12 m6 l2"></div>
										</div>	
									</div>
									<form class="formValidate0" id="faq_form" enctype="multipart/form-data" action="{{ route('admin.savefaq') }}" method="POST">@csrf

                						<div class="row">
                							<input type="hidden" name="id" value="{{ $faq->id }}">
                							<div class="input-field col s12">
                								<strong>Question : </strong>
                								<input type="text" name="question" id="question" class="form-control" value="{{ $faq->question }}"/>
                								@error('question')
	                                                <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>
                							<div class="input-field col s12">
                								<strong>Answer : </strong><br/>
                								<textarea id="answer" name="answer" class="materialize-textarea" placeholder="Description">{{ $faq->answer }}</textarea>
                								@error('answer')
	                                                <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
	                                            @enderror
                							</div>

                							<div class="input-field col s3">
                								<a href="{{ url('admin/faq-list') }}" class="btn waves-effect waves-light left">Cancel</a>
                							</div>
                							<div class="input-field col s6"></div>

                							@if(isset($faq->id) && $faq->id != '')
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
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('answer', {
        });
	</script>
@stop