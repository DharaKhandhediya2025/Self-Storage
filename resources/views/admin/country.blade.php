@extends('include.master')@section('title','Country')

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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Country</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Country List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if($view_page == 'form')
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
                                                    <h4 class="card-title">Edit Country</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="formValidate0" id="country_form" enctype="multipart/form-data" action="{{ route('admin.updatecountry' ,['id'=>$country->id ])}}" method="POST">@csrf

                                            <div class="row">
                                                <div class="input-field col s4">
                                                    <strong>Country Name :  <span style="color: red;">*
                                                    </span></strong>
                                                    <input type="text" name="name" id="name" value="{{ $country->name }}" class=" @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="input-field col s4">
                                                    <strong>Country Code :  <span style="color: red;">*
                                                    </span></strong>
                                                    <input type="text" name="code" id="code" value="{{ $country->code }}" class=" @error('code') is-invalid @enderror">
                                                    @error('code')
                                                        <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="input-field col s4">
                                                    <strong>Dial Code :  <span style="color: red;">*
                                                    </span></strong>
                                                    <input type="text" name="dial_code" id="dial_code" value="{{ $country->dial_code }}" class=" @error('dial_code') is-invalid @enderror">
                                                    @error('dial_code')
                                                        <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="input-field col s12">

                                                    <a href="{{ url('admin/country') }}" class="btn waves-effect waves-light left">Cancel</a>

                                                    <button class="btn waves-effect waves-light right submit" type="submit" name="action">Update</button>
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
        @else
            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div id="button-trigger" class="card card card-default scrollspy">
                                    <div class="card-content">

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

                                        <h4 class="card-title">Country List ({{ $count }})</h4>

                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display" style="color:black;">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">Sr No.</th>
                                                            <th style="text-align: center;">Code</th>
                                                            <th style="text-align: center;">Name</th>
                                                            <th style="text-align: center;">Dial Code</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($country->count() > 0)
                                                        @php $i=0 @endphp
                                                            @foreach ($country as $row)
                                                                <tr>
                                                                    <td style="width: 10px;text-align: center;">{{ ++$i }}</td>
                                                                    <td style="text-align: center;">{{ $row->code }}</td>
                                                                    <td style="text-align: center;">{{ $row->name }}</td>
                                                                    <td style="text-align: center;">{{ $row->dial_code }}</td>
                                                                    <td style="text-align: center;">
                                                                        <a href="{{ route('admin.editcountry' ,['id'=> $row->id ])}}" title="Edit" class="btn-small btn-light-blue">Edit</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="content-overlay"></div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $("#country_form").validate({
                rules: {
                    "name": {
                        required: true
                    },
                    "code": {
                        required: true
                    },
                    "dial_code": {
                        required: true
                    },
                },
                messages: {
                    "name": {
                        required: "Country Name is Required."
                    },
                    "code": {
                        required: "Country Code is Required."
                    },
                    "dial_code": {
                        required: "Dial Code is Required."
                    },
                }
            });
        });
    </script>
@stop