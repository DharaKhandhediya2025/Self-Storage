@extends('headerfooter')@section('title','Home - Trouve ton entrepot')

@section('content')

    <!-- Banner Section Start -->
    <section class="hero_banner__Section">
        @if (session()->has('message')) 
            <script>alert("{{ session('message') }}"); </script> 
        @endif

        @if (session()->has('error')) 
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>{{ session('error') }} 
            </div> 
        @endif
        <div class="container">
            <div class="banner__box">
                <div class="banner_content_box text-center">
                    <h2>Find your <span>Storage Unit</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    @if(isset($categories) && sizeof($categories) > 0)
                        <div class="banner_tabing">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                               <?php $i=0 ?>
                                @foreach($categories as $row)
                                    @if($i == 0)
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home_{{$row->id}}" role="tab" aria-controls="home_{{$row->id}}" aria-selected="true">{{$row->name}}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home_{{$row->id}}" role="tab" aria-controls="home_{{$row->id}}" aria-selected="true">{{$row->name}}</a>
                                        </li>
                                    @endif
                                <?php $i++ ?>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <?php $j=0 ?>
                                @foreach($categories as $row)
                                @if($j == 0)
                                    <div class="tab-pane fade show active" id="home_{{$row->id}}" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="banner_search_main">
                                            <form action="{{ url('storages')}}/{{$row->slug}}" method="get">
                                                <div class="banner_text_location">
                                                    <input type="text" placeholder="Enter Country, City or Zipcode" name="search" class="search__accordin__input">
                                                </div>

                                                <div class="banner_text_price" data-toggle="modal" data-target="#pricemodel">
                                                    <input type="text" placeholder="Price">
                                                    <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                </div>

                                                <div class="banner_text_filter">
                                                    <input type="text" placeholder="Filter">
                                                    <span class="filter_text"><i class="fa fa-filter"
                                                                aria-hidden="true"></i></span>
                                                </div>

                                                
                                                <div class="banner__empty__box"></div>
                                                <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>

                                                <div class="search__accordin">
                                                        <div class="accordion-container">
                                                            <!-- <h2>jQuery Accordion</h2> -->
                                                            <div class="set">
                                                                <a href="#">
                                                                    Access
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Access</option>
                                                                            <option>Inside</option>
                                                                            <option>Outside</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Types
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Type</option>
                                                                            <option>Heated</option>
                                                                            <option>Non-Heated</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Size
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Size</option>
                                                                            <option value="5*10">5*10</option>
                                                                            <option value="10*10">10*10</option>
                                                                            <option value="10*15">10*15</option>
                                                                            <option value="10*20">10*20</option>
                                                                            <option value="10*30">10*30</option>
                                                                            <option value="10*40">10*40</option>
                                                                            <option value="1">Add Custom
                                                                            </option>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Features
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck">
                                                                                    <label class="form-check-label search__accordin__label" for="gridCheck">
                                                                                        Ourdoor/Drive Up
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck1">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck1">
                                                                                        24/7
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck2">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck2">
                                                                                        RV/Boat/Vehicle Storage
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" 
                                                                                        id="gridCheck3">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck3">
                                                                                        Self-Checkin
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Rating
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="rating_box_content">
                                                                        <div class="form-group">
                                                                            <div class="form-check active">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="5 Star">
                                                                                <label class="form-check-label" for="5 Star">5
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="4 Star">
                                                                                <label class="form-check-label" for="4 Star">4
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="3 Star">
                                                                                <label class="form-check-label" for="3 Star">3
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="2+ Star">
                                                                                <label class="form-check-label" for="2+ Star">2+
                                                                                    Star</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <div class="row py-2 px-2">
                                                                    <div class="col-12 col-sm-6 col-md-6">
                                                                        <a href="#" class="btn accordion_reset_btn">Reset</a>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6 col-md-6">
                                                                        <a href="#" class="btn accordion_reset_btn">Close</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="tab-pane fade show" id="home_{{$row->id}}" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="banner_search_main">
                                            <form action="{{ url('storages')}}/{{$row->slug}}" method="get">
                                                <div class="banner_text_location">
                                                    <input type="text" placeholder="Country, City or Zipcode" name="search" class="search__accordin__input">
                                                </div>
                                                <div class="banner_text_price" data-toggle="modal" data-target="#pricemodel">
                                                    <input type="text" placeholder="Price">
                                                    <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                </div>

                                                <div class="banner_text_filter">
                                                    <input type="text" placeholder="Filter">
                                                    <span class="filter_text"><i class="fa fa-filter"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                                <div class="banner__empty__box"></div>
                                                <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>

                                                <div class="search__accordin">
                                                        <div class="accordion-container">
                                                            <!-- <h2>jQuery Accordion</h2> -->
                                                            <div class="set">
                                                                <a href="#">
                                                                    Access
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Access</option>
                                                                            <option>Inside</option>
                                                                            <option>Outside</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Types
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Type</option>
                                                                            <option>Heated</option>
                                                                            <option>Non-Heated</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Size
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="form-group">
                                                                        <select class="form-control banner__Select__Dropdown"
                                                                            id="exampleFormControlSelect1">
                                                                            <option>Select Size</option>
                                                                            <option value="5*10">5*10</option>
                                                                            <option value="10*10">10*10</option>
                                                                            <option value="10*15">10*15</option>
                                                                            <option value="10*20">10*20</option>
                                                                            <option value="10*30">10*30</option>
                                                                            <option value="10*40">10*40</option>
                                                                            <option value="1">Add Custom
                                                                            </option>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Features
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck">
                                                                                    <label class="form-check-label search__accordin__label" for="gridCheck">
                                                                                        Ourdoor/Drive Up
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck1">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck1">
                                                                                        24/7
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="gridCheck2">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck2">
                                                                                        RV/Boat/Vehicle Storage
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" 
                                                                                        id="gridCheck3">
                                                                                    <label class="form-check-label search__accordin__label"
                                                                                        for="gridCheck3">
                                                                                        Self-Checkin
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <a href="#">
                                                                    Rating
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </a>
                                                                <div class="content">
                                                                    <div class="rating_box_content">
                                                                        <div class="form-group">
                                                                            <div class="form-check active">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="5 Star">
                                                                                <label class="form-check-label" for="5 Star">5
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="4 Star">
                                                                                <label class="form-check-label" for="4 Star">4
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="3 Star">
                                                                                <label class="form-check-label" for="3 Star">3
                                                                                    Star</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    id="2+ Star">
                                                                                <label class="form-check-label" for="2+ Star">2+
                                                                                    Star</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="set">
                                                                <div class="row py-2 px-2">
                                                                    <div class="col-12 col-sm-6 col-md-6">
                                                                        <a href="#" class="btn accordion_reset_btn">Reset</a>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6 col-md-6">
                                                                        <a href="#" class="btn accordion_reset_btn">Close</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <?php $j++ ?>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    
    <!-- How it Works Section Start -->
    <section class="how_it_work_section">
        <div class="container">
            <div class="title_box">
                <h2>How it works?</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="work_box">
                        <img src="{{ config('global.front_base_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
                        <h4>Title here</h4>
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="work_box">
                        <img src="{{ config('global.front_base_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
                        <h4>Title here</h4>
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="work_box">
                        <img src="{{ config('global.front_base_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
                        <h4>Title here</h4>
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 d-flex align-items-center">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="work_img">
                                <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="work-img" class="img-fluid" width="100%">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="work_img">
                                <img src="{{ config('global.front_base_url').'images/work-img-two.png' }}" alt="work-img" class="img-fluid" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="how_it_work_right">
                        <h4>Lorem Ipsum is simply dummy text of the printing.</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it Works Section End -->

    <!-- Nearby Storage Section Start -->
    <section class="nearby_section">
        <div class="container-fluid">
            <div class="nearby_slider">
                <div class="nearby_title">
                    <h4>Nearby Self storages</h4>
                </div>
                <div class="nearbyslider">
                    @if(isset($storages) && sizeof($storages) > 0)
                        @foreach($storages as $key => $value)
                            <div class="nearby_slider_card">
                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                    <div class="nearby_slider_img">
                                        @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                            <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                        @else
                                            <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                        @endif

                                        <?php
                                            $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                        ?>

                                        @if(isset($existRecord) && $existRecord != '')
                                            <a href="javascript:addToFavourite({{ $value->id }})" class="favorites_card_link new_a_cls_{{ $value->id }}"><i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}" title="Remove From Favourite"></i></a>
                                        @else
                                            <a href="javascript:addToFavourite({{ $value->id }})" class="slider_crad_heart new_a_cls_{{ $value->id }}"><i class="fa fa-heart-o heart_icon new_i_cls_{{ $value->id }}" title="Add From Favourite"></i></a>
                                        @endif
                                    </div>
                                </a>
                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                    <div class="nearby_slider_content">
                                        <p> {{$value->title}} - {{$value->storage_no}} , {{$value->city}} </p>
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
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Nearby Storage Section EWnd -->

    <!-- Client Review Section Start -->
    <section class="client_review_section">
        <div class="container">
            <div class="title_box">
                <h2>Client’s Review</h2>
            </div>
            <div class="container">
                <div class="testimonial">
                    <div class="container">
                        <div class="testimonial__inner">
                            <div class="testimonial-slider">
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearestwarehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearest warehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearest warehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearest warehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearest warehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-slide">
                                    <div class="testimonial_box">
                                        <div class="testimonial_box-inner">
                                            <div class="testimonial_box-top">
                                                <div class="testimonial_box-img">
                                                    <img src="{{ config('global.front_base_url').'images/profile-img.png' }}" alt="profile">
                                                    <h4>Katerina Petrova</h4>
                                                    <p>Odintsovo</p>
                                                </div>

                                                <div class="testimonial_box-text">
                                                    <p>Quickly collected things and delivered for free to the nearest warehouse.<br><br>

                                                    A convenient reminder system that the storage period is coming to an end.<br><br>

                                                    The items were intact, nothing was damaged.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Review Section End -->

    <!-- Price Modal -->
    <div class="Fiter_Model">
        <div class="modal fade" id="pricemodel" tabindex="-1" role="dialog"
            aria-labelledby="pricemodelCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Price</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       
                        <div class="col-md-6">
                            <div class="mutiple_circle_range">
                                <h2>Price</h2>
                            </div>
                        </div>
                        <div class="mutiple_circle_range">
                            <div class="filter_content">
                                <div class="form-groups">
                                    <input type="text" class="js-range-slider" name="price" value="" data-skin="round" data-type="double" data-min="0" data-max="20000000" data-grid="false" id="distance"/>

                                    <div class="row mt-4">
                                        <div class="col-lg-4 from_slide" style="width: 33.33%;">
                                            <input type="number" maxlength="4" class="from" id="from_distance" placeholder="$100" name="price_from" value="">
                                        </div>

                                        <div class="col-lg-4 center_slide" style="width: 33.33%;">
                                            <h6 class="center_slode_text">TO</h6>
                                        </div>

                                        <div class="col-lg-4 to_slide" style="width: 33.33%;">
                                            <input type="number" maxlength="4" class="to" id="to_distance"placeholder="$20,000,000+" name="price_to" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="button " class="btn cancel_btn"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary model_save_btn">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price Modal -->
@stop

@section('customjs')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.search__accordin__input').click(function () {
                $('.search__accordin').toggleClass('search__accordin__show');
            });
        });             
    </script>
    <script>
        $(document).ready(function () {
            $(".set > a").on("click", function () {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    $(this)
                        .siblings(".content")
                        .slideUp(200);
                    $(".set > a i")
                        .removeClass("fa-minus-circle")
                        .addClass("fa-plus-circle");
                } else {
                    $(".set > a i")
                        .removeClass("fa-minus-circle")
                        .addClass("fa-plus-circle");
                    $(this)
                        .find("i")
                        .removeClass("fa-plus")
                        .addClass("fa-minus-circle");
                    $(".set > a").removeClass("active");
                    $(this).addClass("active");
                    $(".content").slideUp(200);
                    $(this)
                        .siblings(".content")
                        .slideDown(200);
                }
            });
        });
    </script>
    <script type="text/javascript">

        getLocation();
              
        function getLocation() {
            navigator.geolocation.getCurrentPosition(onSuccess, onError);
        }

        function onError() {
            console.log("Please allow to location fetched");
        }

        function onSuccess(position) {

            const {
                latitude,
                longitude
            } = position.coords;

            sessionStorage.latitude = latitude;
            sessionStorage.longitude = longitude;

            createCookie('current_latitude',latitude);
            createCookie('current_longitude',longitude);
        }

        function createCookie(name,value) {

            var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/";
        }

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
                        html += '<i class="fa fa-heart favorite_heart new_i_cls_'+storage_id+'" title="Remove From Favourite" style="color:red;">'
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
    </script>
@stop