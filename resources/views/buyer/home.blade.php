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
                    <h2>Find your <span>Storage Unite</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
                                        <form action="{{ url('storage')}}/{{$row->slug}}" method="post">@csrf
                                            <div class="banner_text_location">
                                                <input type="text" placeholder="Enter Country, City or Zipcode" name="search">
                                            </div>
                                            <div class="banner_text_price">
                                                <input type="number" placeholder="Price" name="price" minlength="0" maxlength="10">
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
                            @else
                                <div class="tab-pane fade show" id="home_{{$row->id}}" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="banner_search_main">
                                        <form action="{{ url('storage')}}/{{$row->slug}}" method="post">@csrf
                                            <div class="banner_text_location">
                                                <input type="text" placeholder="Country, City or Zipcode" name="city">
                                            </div>
                                            <div class="banner_text_price">
                                                <input type="text" placeholder="Price" name="price">
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
                            @endif
                            <?php $j++ ?>
                            @endforeach
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
                    @foreach($storages as $storage)
                    <div class="nearby_slider_card">
                        <a href="{{ url('/storage-detail')}}/{{$storage->slug}}">
                            <div class="nearby_slider_img">
                                 @if(isset($storage->storage_image) && sizeof($storage->storage_image) > 0)
                                    <img src="{{ config('global.image_base_url').'/'.$storage->storage_image[1]->image }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                    @else
                                    <img src="{{ config('global.front_base_url').'images/work-img-one.png' }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                    @endif

                                <a href="{{ url('/add-favorite')}}/{{$storage->slug}}" class="slider_crad_heart"><i class="fa fa-heart" style="color: white;"></i></a>

                                <?php
                                    $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$storage->id)->first();
                                ?>
                                @if(isset($existRecord) && $existRecord != '')
                                    <a href="{{ url('/remove-favorite')}}/{{$storage->slug}}" class="slider_crad_heart"><i class="fa fa-heart" style="color: red;"></i></a>
                                @else
                                    <a href="{{ url('/add-favorite')}}/{{$storage->slug}}" class="slider_crad_heart"><i class="fa fa-heart" style="color: white;"></i></a>
                               @endif
                            </div>
                        </a>
                        <a href="{{ url('/storage-detail')}}/{{$storage->slug}}">
                            <div class="nearby_slider_content">
                                <p> {{$storage->title}} - {{$storage->storage_no}} , {{$storage->city}} </p>
                                 @if(isset($storage->storage_aminites) && sizeof($storage->storage_aminites) > 0)
                                        <ul>
                                            @foreach($storage->storage_aminites as $key => $value)
                                                <li>{{ @$value->aminites_detail->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                <h4>${{$storage->price}}/mo</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                    
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
@stop
@section('customcss')
    <script>

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

        function addToFavourite(property_id,type) {

            var app_url = "{!! env('APP_URL') !!}";

            $.ajax({
                type: 'GET',
                url:app_url+'/property-add-to-favorite/'+property_id,
                dataType:'json',
                success: function(data) {

                    if (data.message == 'Success') {

                        alert("Add To Favourite Success.");
                    }
                    else (data.message == 'Delete') {

                        alert("Remove From Favourite List.");
                    }
                }
            });
        }
    </script>
@stop