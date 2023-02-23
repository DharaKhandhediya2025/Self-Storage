@extends('include.master')@section('title','Change Password')

@section('css')
    <style>
        .error{
            color:#f56954 !important;
            border-color:#f56954 !important;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Change Password</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                                </a></li>
                                <li class="breadcrumb-item active">Change Password</li>
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
                                                    <h4 class="card-title">Change Password</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="formValidate0" id="password_form" enctype="multipart/form-data" action="{{ url('admin/change-password') }}" method="POST">@csrf
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="password" id="old_password" name="old_password" placeholder="Current Password" tabindex="1"/>

                                                    <i class="material-icons old_visibility" id="old_visibility_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                                    <i class="material-icons old_visibility_off" id="old_visibility_off_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>

                                                    @error('old_password')
                                                        <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>
    
                                                <div class="input-field col s12">
                                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" tabindex="2"/>
                                                    
                                                    <i class="material-icons new_visibility" id="new_visibility_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                                    <i class="material-icons new_visibility_off" id="new_visibility_off_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>

                                                    @error('new_password')
                                                        <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="input-field col s12">
                                                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" tabindex="3"/>
                                                    
                                                    <i class="material-icons confirm_visibility" id="confirm_visibility_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;">visibility</i>

                                                    <i class="material-icons confirm_visibility_off" id="confirm_visibility_off_pwd" style="position: absolute;margin-top: 10px;right: 20px;color: #123763;cursor: pointer;display: none;">visibility_off</i>

                                                    @error('confirm_password')
                                                        <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light right" type="submit">Update</button>
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
    </div>
@endsection

@section('js')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            // For Old Password
            const old_visibility_pwd = document.querySelector('#old_visibility_pwd');
            const old_pwd = document.querySelector('#old_password');

            old_visibility_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = old_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                old_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".old_visibility").hide();
                $(".old_visibility_off").show();
            });

            // For Hide Old Password
            const old_visibility_off_pwd = document.querySelector('#old_visibility_off_pwd');
            const hide_old_pwd = document.querySelector('#old_password');

            old_visibility_off_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = hide_old_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                hide_old_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".old_visibility_off").hide();
                $(".old_visibility").show();
            });

            // For New Password
            const new_visibility_pwd = document.querySelector('#new_visibility_pwd');
            const new_pwd = document.querySelector('#new_password');

            new_visibility_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = new_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                new_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".new_visibility").hide();
                $(".new_visibility_off").show();
            });

            // For Hide New Password
            const new_visibility_off_pwd = document.querySelector('#new_visibility_off_pwd');
            const hide_new_pwd = document.querySelector('#new_password');

            new_visibility_off_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = hide_new_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                hide_new_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".new_visibility_off").hide();
                $(".new_visibility").show();
            });

            // For Confirm Password
            const confirm_visibility_pwd = document.querySelector('#confirm_visibility_pwd');
            const confirm_pwd = document.querySelector('#confirm_password');

            confirm_visibility_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = confirm_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                confirm_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".confirm_visibility").hide();
                $(".confirm_visibility_off").show();
            });

            // For Hide Confirm Password
            const confirm_visibility_off_pwd = document.querySelector('#confirm_visibility_off_pwd');
            const hide_confirm_pwd = document.querySelector('#confirm_password');

            confirm_visibility_off_pwd.addEventListener('click', function (e) {

                // toggle the type attribute
                const type = hide_confirm_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                hide_confirm_pwd.setAttribute('type', type);

                // toggle the eye slash icon
                $(".confirm_visibility_off").hide();
                $(".confirm_visibility").show();
            });
           
            $("#password_form").validate({
                rules: {
                    "old_password": {
                        required: true
                    },
                    "new_password": {
                        required: true
                    },
                    "confirm_password": {
                        required: true
                    }
                },
                messages: {
                    "old_password": {
                        required: "Old Password is required field."
                    },
                    "new_password": {
                        required: "New Password is required field."
                    },
                    "confirm_password": {
                        required: "Confirm Password is required field."
                    }
                }
            });
        });
    </script>
@stop