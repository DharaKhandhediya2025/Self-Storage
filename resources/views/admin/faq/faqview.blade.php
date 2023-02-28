@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/page-faq.css') }}">
@stop

@extends('include.master')@section('title','FAQs')

@section('content')

    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>FAQ Details</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/faq-list')}}">FAQs</a></li>
                            <li class="breadcrumb-item active">FAQ Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section" id="faq">
                    <div class="faq row">
                        <div class="col s12">
                            <ul class="collapsible categories-collapsible">
                                <li>
                                    <div class="collapsible-header">
                                        Q : {!! $faq->question !!}<i class="material-icons">keyboard_arrow_right </i>
                                    </div>
                                    <div class="collapsible-body"><p>{!! $faq->answer !!}</p></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection