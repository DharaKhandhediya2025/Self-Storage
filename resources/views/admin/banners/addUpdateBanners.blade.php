@extends('include.master')@section('title','Banners')

@section('content')
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Banners</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Banner List</li>
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
                                                <label for="image">Banner Image</label><br/>
                                                <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror">

                                                @if(isset($banners->image) && $banners->image != '')
                                                    <img src="{{ asset('storage/app/public/'.$banners->image) }}" alt="No Image Available" style="height:100px;width:100px;" />
                                                @endif

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