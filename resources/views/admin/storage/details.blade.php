@extends('include.master')@section('title','Storage Details')

@section('content')

    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}');">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Storage Details</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/storages')}}">Storage</a></li>
                            <li class="breadcrumb-item active">Storage Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section users-view">
                    <!-- users view media object start -->
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m7">
                                <div class="display-flex media">
                                    <div class="media-body">
                                        <h6>{{ $storages->title }}</h6>
                                    </div>
                                </div>
                            </div>
                            @if(isset($storages->video_url) && $storages->video_url != '')
                                <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center">
                                    <a href="{{ $storages->video_url }}" class="waves-effect waves-light btn border-round mr-1 z-depth-4" target="_blank" style="background-color: #f48fb1;">View Video</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- users view media object ends -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <table class="table striped">
                                        <tbody>
                                            <tr>
                                                <b><th>Seller Name :</th></b>
                                                <td>{{ $storages->seller->name }}</td>

                                                <td>Storage Type :</td>
                                                <td>{{ $storages->storage_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>Category :</td>
                                                <td>{{ $storages->category->name }}</td>

                                                <td>Size :</td>
                                                <td>{{ $storages->size }} {{ $storages->size_unit }}</td>
                                            </tr>
                                            <tr>
                                                <td>Storage No. :</td>
                                                <td>{{ $storages->storage_no }}</td>

                                                <td>No. Of Floors :</td>
                                                <td>{{ $storages->no_of_floors }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country :</td>
                                                <td>{{ $storages->country_details->name }}</td>

                                                <td>City :</td>
                                                <td>{{ $storages->city }}</td>
                                            </tr>
                                            @if(isset($storages->storage_aminites) && $storages->storage_aminites != '')
                                                <tr>
                                                    <td>Aminites :</td>
                                                    <?php $name_string = ''; ?>
                                                    @foreach($storages->storage_aminites as $key => $value)
                                                        <?php

                                                            if($name_string == '') {
                                                                $name_string = $value->aminites_detail->name;
                                                            }
                                                            else {
                                                                $name_string .= ', ' . $value->aminites_detail->name;
                                                            }
                                                        ?>
                                                    @endforeach
                                                    <td colspan="3"><p style="text-align:justify;">
                                                    {!! $name_string !!}</p></td>
                                                </tr>
                                            @endif
                                            {{-- @if(isset($storages->storage_variants) && $storages->storage_variants != '')
                                                <tr>
                                                    <td>Variants :</td>
                                                    <td>Dimension :</td>
                                                    <td>Inventory :</td>
                                                    <td>Price :</td>
                                                    <td>Surface :</td>

                                                    @foreach($storages->storage_variants as $key => $value)
                                                        <td></td>
                                                        <td>{{ $value->dimension }}</td>
                                                        <td>{{ $value->inventory }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        <td>{{ $value->surface }}</td>
                                                    @endforeach
                                                    
                                                </tr>
                                            @endif --}}
                                            <tr>
                                                <td>Description :</td>
                                                <td colspan="3"><p style="text-align:justify;">
                                                {!! $storages->description !!}</p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(isset($storages->storage_image) && sizeof($storages->storage_image) > 0)
                        <div class="card">
                            <div class="carousel">
                                @foreach($storages->storage_image as $key1 => $value1)
                                    <a class="carousel-item">
                                        <img src="{{ asset('storage/app/public/'.$value1['image']) }}" alt="No Image Available" title="Storage Image" style="height: 230px;width: 230px;cursor: pointer">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection