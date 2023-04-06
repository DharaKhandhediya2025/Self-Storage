@extends('headerfooter')@section('title','Home - Trouve ton entrepot')

@section('content')
    <!--Find Self Storage Section Start -->
    <section class="self_store_section">
        <div class="container-fluid">
            <div class="self_storage_top">
                <form action="{{ url('storages')}}/{{$slug}}" method="get">
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
                                    <select class="form-control banner__Select__Dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="type" style="float: left;"> 
                                        @if($type == "Heated")
                                            <option class="dropdown-item" value="">Select Type</option>
                                            <option class="dropdown-item" value="Heated" selected>Heated</option>
                                            <option class="dropdown-item" value="Non-Heated">Non-Heated</option>
                                        @elseif($type == "Non-Heated")
                                            <option class="dropdown-item" value="">Select Type</option>
                                            <option class="dropdown-item" value="Heated">Heated</option>
                                            <option class="dropdown-item" value="Non-Heated" selected>Non-Heated</option>
                                        @else
                                            <option class="dropdown-item" value="" style="float: left;">Select Type</option>
                                            <option class="dropdown-item" value="Heated">Heated</option>
                                            <option class="dropdown-item" value="Non-Heated">Non-Heated</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="dropdown_box">
                                    <select class="form-control banner__Select__Dropdown" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="access">
                                        @if($access == "Inside")
                                            <option class="dropdown-item" value="">Select Access</option>
                                            <option class="dropdown-item" value="Inside" selected>Inside</option>
                                            <option class="dropdown-item" value="Outside">Outside</option>
                                        @elseif($access == "Outside")
                                            <option class="dropdown-item" value="">Select Access</option>
                                            <option class="dropdown-item" value="Inside">Inside</option>
                                            <option class="dropdown-item" value="Outside" selected>Outside</option>
                                        @else
                                            <option class="dropdown-item" value="">Select Access</option>
                                            <option class="dropdown-item" value="Inside">Inside</option>
                                            <option class="dropdown-item" value="Outside">Outside</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="filter__box">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Filter </a>
                                    <span class="filter__span"><i class="fa fa-filter"></i></span>
                                </div>

                                <div>
                                    <button type="submit" class="btn find_storage_btn">Find Storage</button>
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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-6">
                                                <div class="mutiple_circle_range">
                                                    <h2>Distance</h2>
                                                </div>
                                            </div>
                                            <div class="mutiple_circle_range">
                                                <div class="filter_content">
                                                    <div class="form-groups">
                                                        <input type="text" class="js-range-slider" name="distance" value="" data-skin="round" data-type="double" data-min="0" data-max="50" data-grid="false" id="distance"/>

                                                        <div class="row mt-4">
                                                            <div class="col-lg-4 from_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" class="from" id="from_distance" placeholder="1 Km" name="from" value="{{$from}}">
                                                            </div>

                                                            <div class="col-lg-4 center_slide" style="width: 33.33%;">
                                                                <h6 class="center_slode_text">TO</h6>
                                                            </div>

                                                            <div class="col-lg-4 to_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" class="to" id="to_distance"placeholder="50 Km" name="to" value="{{$to}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @if($slug == "residential")
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
                                                                        <a href="#">
                                                                            <select class="form-control banner__Select__Dropdown" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="size" onclick="addtextbox(value);" style="margin-left: 20px;">
                                                                                <option value="">Select Size :
                                                                                </option>
                                                                                @foreach($residential_size as $key => $value)
                                                                                    @if($size != '' && $value == $size)
                                                                                        <option value="{{ $value }}" selected>{{ $value }}</option>
                                                                                    @else
                                                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                                <option value="1">Add Custom</option>
                                                                            </select>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control search_input" id="myDIV" placeholder="Add Custom Size" name="custom_size" style="visibility: hidden; width: 50%!important;">
                                            </div>
                                        @else
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
                                                                    <div class="options">
                                                                       <select class="form-control banner__Select__Dropdown" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="size" onchange="removeSizeSlider();" style="margin-left: 20px;">
                                                                            <option value="">Select Size :</option>
                                                                            @foreach($commercial_size as $key => $value)
                                                                                @if($size != '' && $value == $size)
                                                                                    <option value="{{ $value }}" selected>{{ $value }}</option>
                                                                                @else
                                                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group" id="size_slide">
                                                        <input type="text" class="js-range-slider" name="rangesize" value="" data-skin="round" data-type="double" data-min="0" data-max="101000" data-grid="false" id="size"  data-result-min="#rangeSliderExample2MinResult"/>

                                                        <div class="row mt-4">
                                                            <div class="col-lg-4 from_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" class="from" id="from_size" placeholder="0" value="">
                                                            </div>

                                                            <div class="col-lg-4 center_slide" style="width: 33.33%;">
                                                                <h6 class="center_slode_text">TO
                                                                </h6>
                                                            </div>

                                                            <div class="col-lg-4 to_slide" style="width: 33.33%;">
                                                                <input type="number" maxlength="4" value="" class="to" id="to_size"placeholder="101000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                            <div class="rating__box">
                                                <h2>Rating</h2>
                                                <div class="rating_box_content">
                                                    <div class="form-group" > 
                                                
                                                @for($i=5;$i>=2;$i--)
                                                        @foreach($storage as $key => $value)  
                                                        <?php
                                                            $avg = 0;
                                                            $avg = round($value->storage_rating_avg_rate,1);
                                                        ?> 
                                                        @endforeach 
                                                        @if($rate == $i)                    
                                                        <div class="form-check rating_cls active" id="ratingcls_{{$i}}">
                                                            <input type="radio" class="form-check-input" id="rating_{{$i}}" name="rating" onclick="displayRatingStyle({{$i}});" value="{{$i}}" checked>{{$i}} Star
                                                        </div>
                                                        @elseif($i == 5 && $rate == '')
                                                        <div class="form-check rating_cls active" id="ratingcls_{{$i}}">
                                                            <input type="radio" class="form-check-input" id="rating_{{$i}}" name="rating" onclick="displayRatingStyle({{$i}});" value="{{$i}}" checked>{{$i}} Star
                                                        </div>
                                                        @else
                                                        <div class="form-check rating_cls" id="ratingcls_{{$i}}">
                                                            <input type="radio" class="form-check-input" id="rating_{{$i}}" name="rating" onclick="displayRatingStyle({{$i}});" value="{{$i}}">{{$i}} Star
                                                        </div>
                                                        @endif
                                                @endfor
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button " class="btn cancel_btn" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary model_save_btn">Save changes</button>
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

                            <form action="{{ url('storages')}}/{{$slug}}" method="get">
                            <div class="dropdown_box" style="margin-right: 20px;">
                                <select class="form-control banner__Select__Dropdown" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="sort" style="margin-left: 20px;" onchange="window.location.href = this.value">
                                    <option value="">popularity</option>
                                    @if($sort == "Price high to low")
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high">Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low" selected>Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me">Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating">Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating">Lowest rating</option>
                                    @elseif($sort == "Price low to high")
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high" selected>Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low">Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me">Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating">Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating">Lowest rating</option>
                                    @elseif($sort == "Near me")
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high">Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low">Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me" selected>Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating">Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating">Lowest rating</option>
                                    @elseif($sort == "Highest rating")
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high">Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low">Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me">Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating" selected>Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating">Lowest rating</option>
                                    @elseif($sort == "Lowest rating")
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high">Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low">Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me">Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating">Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating" selected>Lowest rating</option>
                                    @else
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price low to high">Price low to high</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Price high to low">Price high to low</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Near me">Near me</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Highest rating">Highest rating</option>
                                    <option value="{{ url('storages')}}/{{$slug}}?sort=Lowest rating">Lowest rating</option>
                                    @endif
                                </select>
                            </div>
                        </form>
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
                                                        <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                                        <div class="grid_left_subbox">
                                                            <div class="list_img_box">

                                                                @if(isset($value->storage_image) && sizeof($value->storage_image)>0)
                                                                    <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one"
                                                                    class="img-fluid" style="height: 200px;width: 200px;">
                                                                      <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>
                                                                    

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite" style="margin-right: -15px !important; margin-top: -10px;"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif
                                                                @else
                                                                
                                                                     <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                                                     <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif
                                                                @endif
                                                            </div>

                                                            <div class="list_content_box">
                                                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                                                <h6>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</h6>
                                                                @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                                                    <ul>
                                                                        @foreach($value->storage_aminites as $key1 => $value1)
                                                                            <li>{{ @$value1->aminites_detail->name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                                <?php

                                                                    $avg = 0;
                                                                    $avg = round($value->storage_rating_avg_rate,1);
                                                                ?>
                                                                
                                                                @if($avg > 0)
                                                                    <div class="list_rating_box">
                                                                        <a href="#"><span>{{ round($avg) }}.0
                                                                        </span></a>
                                                                        <?php
                                                                        $empty = 5 - round($avg);
                                                                        for ($i = 1; $i <= round($avg); $i++) {
                                                                             if(round($avg) < $i ) {
                                                                             }else {
                                                                                ?>
                                                                                <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/star.png') }}" alt="star"class="img-fluid"></a>
                                                                                <?
                                                                             }
                                                                        }
                                                                        for ($i = 1; $i <= $empty; $i++) {
                                                                             if($empty < $i ) {
                                                                             }else {
                                                                                ?>
                                                                                <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/empty-star.png') }}" alt="star"class="img-fluid"></a>
                                                                                <?
                                                                             }
                                                                        }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                @endif
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    </div>
                                                    <div class="grid_right_box">
                                                        <h6>${{$value->price}}/mo</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        <!--<div class="col-12 text-center mt-3">
                                            <a href="#" class="btn more_btn">257 More <i
                                                    class="fa fa-arrow-down pl-4"></i></a>
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
                                                        <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                                            <div class="grid_tab_img">
                                                                @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                                                <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one"
                                                                        class="img-fluid" style="height: 200px;width: 320px;">
                                                                    <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif
                                                                @else
                                                                    <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                                                    <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif

                                                                 @endif
                                                                    
                            
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="grid_tab_content">
                                                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                                                <p>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</p>
                                                                @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                                                        <ul>
                                                                            @foreach($value->storage_aminites as $key1 => $value1)
                                                                                <li>{{ @$value1->aminites_detail->name }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                @endif
                                                                <h4>${{$value->price}}/mo</h4>
                                                            </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <!--<div class="col-12 text-center mt-3">
                                            <a href="#" class="btn more_btn">257 More <i
                                                    class="fa fa-arrow-down pl-4"></i></a>
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
                                                                    <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                                                        <div class="grid_tab_img">
                                                                        @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                                                             <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="list-img-one"
                                                                             class="img-fluid" style="height: 200px;width: 320px;">
                                                                          
                                                                            <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif
                                                                        @else
                                                                            <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                                                            <?php
                                                                        $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                                                    ?>

                                                                    @if(isset($existRecord) && $existRecord != '')
                                                                             <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @else
                                                                        <a href="javascript:addToFavourite({{ $value->id }})" class="list_heart_box favorites_card_link new_a_cls_{{ $value->id }}">
                                                                             <i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}"  title="Remove From Favourite"></i>
                                                                            </a>
                                                                    @endif
                                                                 @endif
                                                                            
                                                                        </div>
                                                                    </a>
                                                                    <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
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
                                                        <a href="#" class="btn more_btn">257 More <i
                                                                class="fa fa-arrow-down pl-4"></i></a>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0 mt-xl-0">
                                            <div class="map_right_box" id="maps" style="height: 800px!important;">
                                            
                                               
                                            
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
@section('customjs')
    <script type="text/javascript">


        function addToFavourite(storage_id) {

            var app_url = "{!! env('APP_URL') !!}";

            $.ajax({
                type: 'GET',
                url:app_url+'/property-add-to-favorite/'+storage_id,
                dataType:'json',
                success: function(data) {

                    if (data.message == 'Success') {

                        $(".new_i_cls_"+storage_id).remove();

                        // Add new HTML
                        var html = '';
                        html += '<i class="fa fa-heart favorite_heart new_i_cls_'+storage_id+'" title="Remove From Favourite" style="color:red;margin-right: -17px !important; margin-top: -12px;">'
                        $(".new_a_cls_"+storage_id).append(html);
                       
                        alert("Add To Favourite Success.");
                    }
                    else if (data.message == 'Delete') {

                        $(".new_i_cls_"+storage_id).remove();

                        // Add new HTML
                        var html = '';
                        html += '<i class="fa fa-heart-o heart_icon new_i_cls_'+storage_id+'" title="Add From Favourite"></i>';
                        $(".new_a_cls_"+storage_id).append(html);
                       

                        alert("Remove From Favourite List.");
                    }
                }
            });
        }
        function displayRatingStyle(rating) {

            $('.rating_cls').removeClass('active');
            $('#ratingcls_'+rating).addClass('active');
        }

        function removeSizeSlider() {
            
            var size = $("#dropdownMenuButton2").val();

            if(size == '') {
                $("#size_slide").show();
            }
            else {
                $("#size_slide").hide();
            }
        }

        function addtextbox($value) {
            if($value=="1"){
                var x = document.getElementById("myDIV");
                if (x.style.visibility === "hidden") {
                    x.style.visibility = "visible";
                } 
            }
            else{
                document.getElementById("myDIV").style.visibility = "hidden";
            }
        }

        function Activestar2() {
               $('#2').addClass('active');
                $('#3').removeClass('active');
                $('#4').removeClass('active');
                $('#5').removeClass('active');
            }

            function Activestar3() {
               $('#3').addClass('active');
                $('#4').removeClass('active');
                $('#2').removeClass('active');
                $('#5').removeClass('active');
            }

            function Activestar4() {
                $('#4').addClass('active');
                $('#3').removeClass('active');
                $('#2').removeClass('active');
                $('#5').removeClass('active');
            }

            function Activestar5() {
               $('#5').addClass('active');
                $('#4').removeClass('active');
                $('#2').removeClass('active');
                $('#3').removeClass('active');

            }

    </script>
     <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 22.2734719, lng: 70.7512559 };
            const map = new google.maps.Map(document.getElementById("maps"), {
                zoom: 5,
                center: myLatLng,
            });
  
            var locations = {{ Js::from($locations) }};
  
            var infowindow = new google.maps.InfoWindow();
  
            var marker, i;
              
            for (i = 0; i < locations.length; i++) {  
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                  });
                    
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent(locations[i][0]);
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
  
            }
        }
  
        window.initMap = initMap;
    </script>
  
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
    @stop