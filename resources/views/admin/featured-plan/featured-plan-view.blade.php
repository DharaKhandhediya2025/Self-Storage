@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/app-assets/css/pages/page-faq.css') }}">
@stop

@extends('include.master')@section('title','Featured Plan')

@section('content')

    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Featured Plan Details</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/featured-plan')}}">Featured Plan</a></li>
                            <li class="breadcrumb-item active">Featured Plan Details</li>
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
                                            <b><th>Plan Type :</th></b>
                                            <td>{{ $featured_plan->type }}</td>

                                            <b><th>Price :</th></b>
                                            <td>{{ $featured_plan->price }}</td>

                                            <b><th>Validity :</th></b>
                                            <td>{{ $featured_plan->validity }} {{ $featured_plan->duration }}</</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($featured_plan->plan_functionality))
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <table class="table striped">
                                        <tbody>
                                            <b><th>Functionalities :</th></b>
                                            @foreach($featured_plan->plan_functionality as $functionality)
                                               <tr style="margin-left: 20px;"><td><li>{{ $functionality->functionality }}</li></td></tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection