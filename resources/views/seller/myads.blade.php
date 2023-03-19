@extends('headerfooter')@section('title','Post - Trouve ton entrepot')

@section('customcss')
    
    <link rel="stylesheet" type="text/css" href="{{ config('global.front_base_seller_url').'css/select2.min.css' }}">

    <style type="text/css">
        .select2-container .select2-selection--single {
            height: 45px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 80%;
        }
        .select2-container--default .select2-selection--single span {
            top: 80%;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px;
        }
    </style>
@stop

@section('content')
    <!-- Header Section End -->

    <!-- Myads Section Start -->
    <section class="myads_section">
        <div class="container-fluid">
            <div class="myads_top row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="myads_left">
                        <h2>My Ads</h2>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="storage_grid_shorting myads_grid_shorting">
                        <span class="sortbt_text">Sort by</span>

                        <div class="dropdown_box">
                            <button class="btn btn-secondary dropdown-toggle storage_btn" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                New first
                            </button>
                            <div class="dropdown-menu myads_dropdown_menu" aria-labelledby="dropdownMenuButton"
                                style="left: -23px !important;">
                                <a class="dropdown-item" href="#">Price low to high</a>
                                <a class="dropdown-item" href="#">Price high to low</a>
                                <a class="dropdown-item" href="#">Near me</a>
                                <a class="dropdown-item" href="#">Highest rating</a>
                                <a class="dropdown-item" href="#">Lowest rating</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                @foreach($storage as $row)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="myads_storage_card">
                        <div class="myads_storage_card_lft">

                            <img src="{{ asset('storage/app/public/'.$image->image) }}" style="height: 150px;width: 150px;" alt="card-img" class="img-fluid">
                        </div>
                        <div class="myads_storage_card_rht">
                            <h2>{{$row->title}}</h2>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item edit_text" href="storage-edit/{{$row->slug}}">Edit</a>
                                    @if($row->storage_status == 1)
                                    <a class="dropdown-item deactivate_text" href="storage-deactivate/{{$row->slug}}">Deactivate</a>
                                    @else
                                    <a class="dropdown-item deactivate_text" href="storage-activate/{{$row->slug}}">Activate</a>
                                    @endif
                                    <a class="dropdown-item delete_text" href="storage-delete/{{$row->slug}}">Delete</a>
                                </div>
                            </div>

                            <h6>{{$inquiry}} Inquires</h6>
                            @if($row->storage_status == 1)
                            <p>This ad currently live.</p>
                            @else
                            <p style="color: red;">This Ad is Currently Deactivated.</p>
                            @endif
                            <h4>${{$row->price}}</h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Myads Section End -->

   @stop