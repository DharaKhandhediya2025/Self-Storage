@extends('include.master')@section('title','Buyer Inquiry')

@section('content')

    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Buyer Inquiry</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/buyer-inquiry')}}">Buyer Inquiry</a></li>
                            <li class="breadcrumb-item active">Buyer Inquiry Details</li>
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
                                            <b><th>Storage Name :</th></b>
                                            <td>{{ @$buyer_inquiry->storage_details->title }}</td>

                                            <b><th>Name :</th></b>
                                            <td>{{ $buyer_inquiry->name }}</td>
                                        </tr>
                                        <tr>
                                            <b><th>Email :</th></b>
                                            <td>{{ $buyer_inquiry->email }}</td>

                                            <b><th>Phone :</th></b>
                                            <td>{{ $buyer_inquiry->phone }}</td>
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
                                            <td>{!! $buyer_inquiry->message !!}</td>
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