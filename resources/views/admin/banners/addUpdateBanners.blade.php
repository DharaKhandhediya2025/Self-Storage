@extends('include.master')@section('title','Banners')

@section('content')
    <div class="row">
        <x-admin.form-header title="Banner" subtitle="Banner"></x-admin.form-header>
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
                                                @if(isset($banners->id) && $banners->id > 0)
                                                    <h4 class="card-title">Edit Banner</h4>
                                                @else
                                                    <h4 class="card-title">Add Banner</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <form class="formValidate0" id="banner_form" enctype="multipart/form-data" action="{{ route('admin.savebanners') }}" method="POST">@csrf
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $banners->id }}">
                                            <div class="input-field col s12">

                                                @if(isset($banners->image) && $banners->image != '')
                                                    <div class="col-md-12 mb-2">
                                                        <img id="preview-image-before-upload" src="{{ asset('storage/app/public/'.$banners->image) }}" alt="No Image Available" style="height:150px;width:150px;border-radius: 20px;"/>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 mb-2">
                                                        <img id="preview-image-before-upload" style="height:150px;width:150px;"/>
                                                    </div>
                                                @endif

                                                <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">

                                                @error('image')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">

                                                <a href="{{ url('admin/banners') }}" class="btn waves-effect waves-light left">Cancel</a>

                                                @if(isset($banners->id) && $banners->id != '')
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
@endsection

@section('js')
    <script type="text/javascript">

        $(document).ready(function (e) {
 
            $('#image').change(function() {
                    
                var ext = $('#image').val().split('.').pop().toLowerCase();

                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    
                    alert('Please Select Image File.');
                    this.value = null;
                }
                let reader = new FileReader();
         
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
           });
        });
    </script>
@stop