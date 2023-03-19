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
                            <li class="breadcrumb-item"><a href="{{ url('admin/contact-us')}}">Contact Us
                            </a></li>
                            <li class="breadcrumb-item active">Contact Us Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m12">
                                <table class="table striped">
                                    <tbody>
                                        <tr>
                                            <b><th>Name :</th></b>
                                            <td>{{ $contact_us->name }}</td>

                                            <b><th>Email :</th></b>
                                            <td>{{ $contact_us->email }}</td>

                                            <b><th>Subject :</th></b>
                                            <td>{{ $contact_us->subject }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m12">
                                <table class="table striped">
                                    <tbody>
                                        <b><th>Message :</th></b>
                                        <tr style="margin-left: 20px;">
                                            <td>{!! $contact_us->message !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection