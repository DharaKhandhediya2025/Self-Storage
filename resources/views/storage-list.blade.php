@extends('headerfooter')@section('title','Home - Trouve ton entrepot')

@section('content')
    <!--Find Self Storage Section Start -->
    <section class="self_store_section">
        <div class="container-fluid">
            <div class="self_storage_top">
                <form action="{{ url('storage')}}/{{$slug}}" method="post">@csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-5 col-xl-6">
                            <div class="search_box_left">
                                <div class="form-group">
                                    <input type="text" class="form-control search_input" placeholder="Enter Country, City or Zipcode" value="{{ $search }}" name="search">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-9 col-lg-7 col-xl-6 d-flex">
                            <div class="search_box_right">
                                <div class="dropdown_box">
                                    <button class="btn btn-secondary dropdown-toggle search_dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown button</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>

                                <div class="price__box">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Price" name="price" value="{{$price}}">
                                    <span class="price__span"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                </div>

                                <div class="filter__box">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Filter </a>
                                    <span class="filter__span"><i class="fa fa-filter"></i></span>
                                </div>

                                <div>
                                    <button type="submit" class="btn find_storage_btn">Find Storage
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Filter Modal -->
                        <div class="Fiter_Model">
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Filters</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                                            </span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="multip__step_range">
                                                <fieldset class="formSlider">
                                                    <h4>Distance</h4>
                                                    <div class="__range __range-step">
                                                        <input value="1" type="range" max="4" min="1" step="1" list="ticks1">
                                                        <datalist id="ticks1">
                                                            <option value="1" class="active"><span class="km_span">1KM</span></option>
                                                            <option value="2"><span class="km_span">5 KM</span></option>
                                                            <option value="3"><span class="km_span">10 KM</span></option>
                                                            <option value="4"><span class="km_span">10+KM</span></option>
                                                            <!-- <option value="5"><span class="km_span">5mm</span>
                                                            </option> -->
                                                        </datalist>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="mutiple_circle_range mt-5">
                                                <div class="filter_content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mutiple_circle_range">
                                                                <h2>Size</h2>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 text-right">
                                                            <div>
                                                                <div class="drop-down">
                                                                    <div class="selected position-relative">
                                                                        <a href="#"><span>sq ft.</span><i class="fa fa-angle-down drop_doown_icon"></i></a>
                                                                    </div>
                                                                    <div class="options">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">250 sq ft<span class="value">1</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">500 sq ft<span class="value">2</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">1000 sq ft<span class="value">3</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="js-range-slider" name="my_range"
                                                            value="" data-skin="round" data-type="double" data-min="0"
                                                            data-max="1000" data-grid="false" />
                                                        <div class="row mt-4">
                                                            <div class="col-lg-4 from_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" class="from" placeholder="500 sq.ft">
                                                            </div>

                                                            <div class="col-lg-4 center_slide" style="width: 33.33%;">
                                                                <h6 class="center_slode_text">TO
                                                                </h6>
                                                            </div>

                                                            <div class="col-lg-4 to_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" value="" class="to" placeholder="1,700 sq.ft">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rating__box">
                                                <h2>Rating</h2>
                                                <div class="rating_box_content">
                                                    <div class="form-group">
                                                        <div class="form-check active">
                                                            <input type="radio" class="form-check-input" id="5 Star">
                                                            <label class="form-check-label" for="5 Star">5 Star</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="4 Star">
                                                            <label class="form-check-label" for="4 Star">4 Star</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="3 Star">
                                                            <label class="form-check-label" for="3 Star">3 Star</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="2+ Star">
                                                            <label class="form-check-label" for="2+ Star">2+ Star</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button " class="btn cancel_btn" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary model_save_btn">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Filter Modal -->
                    </div>
                </form>
            </div>

            <div class="self_storage_center">
                @if(isset($search) && $search != '')
                    <div class="self_storage_content">
                        <h4>Find Storages in <span>“{{$search}}”</span></h4>
                    </div>
                @endif

                @if(isset($storages_count) && $storages_count > 0)
                    <div class="storage_grid">
                        <div class="storage_grid_tabing">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="list-tab" data-toggle="pill" href="#list" role="tab" aria-controls="list" aria-selected="true"><i class="fa fa-list"></i><span>List</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="grid-tab" data-toggle="pill" href="#grid" role="tab" aria-controls="grid" aria-selected="false"><i class="fa fa-th"></i><span>Grid</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="map-tab" data-toggle="pill" href="#map" role="tab" aria-controls="map" aria-selected="false"><i class="fa fa-map"></i> <span>Map</span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="storage_grid_reault">
                            <p>{{ $storages_count }} results found</p>
                        </div>

                        <div class="storage_grid_shorting">
                            <span class="sortbt_text">Sort by</span>

                            <div class="dropdown_box">
                                <button class="btn btn-secondary dropdown-toggle storage_btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Highest rating</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Price low to high</a>
                                    <a class="dropdown-item" href="#">Price high to low</a>
                                    <a class="dropdown-item" href="#">Near me</a>
                                    <a class="dropdown-item" href="#">Highest rating</a>
                                    <a class="dropdown-item" href="#">Lowest rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($storages_count) && $storages_count > 0)

                    <div class="storage_tabing_main pb-0 pt-4">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <div class="list_tab_box">
                                    <div class="row">
                                        @if(isset($storage) && sizeof($storage) > 0)
                                            @foreach($storage as $key => $value)  
                                            <div class="col-12 mt-3">
                                                <div class="grid__main__box">
                                                    <div class="grid_left_box">
                                                        <div class="grid_left_subbox">
                                                            <div class="list_img_box">
                                                                @if(isset($value->storage_image) && sizeof($value->storage_image)>0)
                                                                    <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one"
                                                                    class="img-fluid" style="height: 200px;width: 200px;">
                                                                @endif
                                                            </div>

                                                            <div class="list_content_box">
                                                                <h6>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</h6>
                                                                @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                                                    <ul>
                                                                        @foreach($value->storage_aminites as $key1 => $value1)
                                                                            <li>{{ @$value1->aminites_detail->name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                                <!--<div class="list_rating_box">
                                                                    <a href="#"><span>4.0</span></a>
                                                                    <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/star.png') }}" alt="star"
                                                                            class="img-fluid"></a>
                                                                    <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/star.png') }}" alt="star"
                                                                            class="img-fluid"></a>
                                                                    <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/star.png') }}" alt="star"
                                                                            class="img-fluid"></a>
                                                                    <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/star.png') }}" alt="star"
                                                                            class="img-fluid"></a>
                                                                    <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/empty-star.png') }}" alt="star"
                                                                            class="img-fluid"></a>
                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid_right_box">
                                                        <h6>${{$value->price}}/mo</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        <!--<div class="col-12 text-center mt-3">
                                            <a href="#" class="btn more_btn">257 More <i class="fa fa-arrow-down pl-4"></i></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <div class="grid_tab_box">
                                    <div class="row">
                                        @if(isset($storage) && sizeof($storage) > 0)
                                            @foreach($storage as $key => $value)
                                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                                    <div class="grid_tab_card">
                                                        <a href="#">
                                                            <div class="grid_tab_img">
                                                                @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                                                    <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one" class="img-fluid" style="height: 200px;width: 320px;">
                                                                @endif
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="grid_tab_content">
                                                                <p>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</p>
                                                                @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                                                    <ul>
                                                                        @foreach($value->storage_aminites as $key1 => $value1)
                                                                            <li>{{ @$value1->aminites_detail->name }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                                <h4>${{$value->price}}/mo</h4>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <!--<div class="col-12 text-center mt-3">
                                            <a href="#" class="btn more_btn">257 More <i class="fa fa-arrow-down pl-4"></i></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                                <div class="map_tab_box">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="grid_tab_box">
                                                <div class="row">
                                                    @if(isset($storage) && sizeof($storage) > 0)
                                                        @foreach($storage as $key => $value)
                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                <div class="grid_tab_card">
                                                                    <a href="#">
                                                                        <div class="grid_tab_img">
                                                                            @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                                                                <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one" class="img-fluid" style="height: 200px;width: 320px;">
                                                                            @endif
                                                                        </div>
                                                                    </a>
                                                                    <a href="#">
                                                                        <div class="grid_tab_content">
                                                                            <p>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</p>
                                                                            @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                                                                <ul>
                                                                                    @foreach($value->storage_aminites as $key1 => $value1)
                                                                                        <li>{{ @$value1->aminites_detail->name }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                            <h4>${{$value->price}}/mo</h4>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <!--<div class="col-12 mt-3">
                                                        <a href="#" class="btn more_btn">257 More <i class="fa fa-arrow-down pl-4"></i></a>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0 mt-xl-0">
                                            <div class="map_right_box">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.297337633656!2d72.6680990149575!3d23.049558221103034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e87960158f889%3A0x2bda7d524f9233f4!2sApp%20Ideas%20Infotech%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1677506155919!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="storage_tabing_main">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="list" role="tabpanel"
                                aria-labelledby="list-tab">
                                <div class="no_result_box text-center">
                                    <i class="fa fa-search search_icon" ></i>
                                    <h4>No result found</h4>
                                    <h6>You will find new result here</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--Find Self Storage Section End -->
@endsection