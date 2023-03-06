@extends('headerfooter')@section('title','Home - Trouve ton entrepot')

@section('content')

    <!-- Banner Section Start -->
    <section class="hero_banner__Section">
        <div class="container">
            <div class="banner__box">
                <div class="banner_content_box text-center">
                    <h2>Find your <span>Storage Unite</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="banner_tabing">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Residential</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Residential</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="banner_search_main">
                                    <form action="">
                                        <div class="banner_text_location">
                                            <input type="text" placeholder="Enter City, State or Zipcode">
                                        </div>
                                        <div class="banner_text_price">
                                            <input type="text" placeholder="Price">
                                            <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="banner_text_filter">
                                            <input type="text" placeholder="Filter">
                                            <span class="filter_text"><i class="fa fa-filter"aria-hidden="true"></i></span>
                                        </div>
                                        <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="banner_search_main">
                                    <form action="">
                                        <div class="banner_text_location">
                                            <input type="text" placeholder="Enter City, State or Zipcode">
                                        </div>
                                        <div class="banner_text_price">
                                            <input type="text" placeholder="Price">
                                            <span class="price_text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="banner_text_filter">
                                            <input type="text" placeholder="Filter">
                                            <span class="filter_text"><i class="fa fa-filter" aria-hidden="true"></i></span>
                                        </div>
                                        <button class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <img src="{{ config('global.front_base_seller_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
                        <h4>Title here</h4>
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="work_box">
                        <img src="{{ config('global.front_base_seller_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
                        <h4>Title here</h4>
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="work_box">
                        <img src="{{ config('global.front_base_seller_url').'images/clock.png' }}" alt="Clock" class="img-fluid">
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
                                <img src="{{ config('global.front_base_seller_url').'images/work-img-one.png' }}" alt="work-img" class="img-fluid" width="100%">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="work_img">
                                <img src="{{ config('global.front_base_seller_url').'images/work-img-two.png' }}" alt="work-img" class="img-fluid" width="100%">
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
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-one.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>7815 Chelico DriveSan Antonio, TX 78223 </p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$30/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-two.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>2505 S HackberrySan Antonio, TX 78210</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$61/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-three.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>909 Runnels AveSan Antonio, TX 78208</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$42/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-four.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>1426 N Panam ExpySan Antonio, TX 78208</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$43/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-five.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>4910 S Zarzamora StreetSan Antonio, TX 78211</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$61/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-one.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>7815 Chelico DriveSan Antonio, TX 78223</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$30/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-two.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>2505 S HackberrySan Antonio, TX 78210</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$61/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-three.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>909 Runnels AveSan Antonio, TX 78208</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$42/mo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-four.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>1426 N Panam ExpySan Antonio, TX 78208</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$43/mo</h4>
                            </div>
                        </a>
                    </div>

                    <div class="nearby_slider_card">
                        <a href="#">
                            <div class="nearby_slider_img">
                                <img src="{{ config('global.front_base_seller_url').'images/nearby-five.png' }}" alt="nearby-one" class="img-fluid">
                                <a href="#" class="slider_crad_heart"><i class="fa fa-heart-o heart_icon"></i></a>
                            </div>
                        </a>
                        <a href="#">
                            <div class="nearby_slider_content">
                                <p>4910 S Zarzamora StreetSan Antonio, TX 78211</p>
                                <ul>
                                    <li>Climate Controlled</li>
                                    <li>Vehicle Storage</li>
                                </ul>
                                <h4>$61/mo</h4>
                            </div>
                        </a>
                    </div>
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
                                                    <img src="{{ config('global.front_base_seller_url').'images/profile-img.png' }}" alt="profile">
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
@stop