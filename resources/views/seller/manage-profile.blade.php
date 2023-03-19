@extends('headerfooter')@section('title','Manage Profile')

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

    <!-- My Account Section Start -->
    <section class="my_account_section">
        <div class="container-fluid">
            <div class="">
                <h2 class="tabing_title">My Account</h2>
            </div>
            <div class="my_account_tabing">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="myprofile-tab" data-toggle="pill" href="#myprofile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">My Profile</a>

                    <a class="nav-link" id="favorites-tab" data-toggle="pill" href="#favorites" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Reports</a>

                    <a class="nav-link" id="storages-tab" data-toggle="pill" href="#storages" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">Subscription plan</a>

                        <a class="nav-link" id="storages-tab" href="{{ url('my-ads') }}">My Ads</a>
                    @if(isset($seller->google_id) || isset($buyer->google_id))
                        @elseif(isset($seller->facebook_id) || isset($buyer->facebook_id))
                        @else
                        <a class="nav-link" id="password-tab" href="{{ url('seller/change-password') }}">Change password</a>
                    @endif

                    <a href="{{ url('/seller-logout') }}" class="nav-link log_out_text" id="logout-tab" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active contact_tabing_box" id="myprofile" role="tabpanel"
                        aria-labelledby="myprofile-tab">
                         @if (session()->has('message')) 
                    <div class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('message') }} 
                    </div> 
                @endif

                @if (session()->has('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('error') }} 
                    </div> 
                @endif
                        <h2>My Profile</h2>
                        <form class="myaccount_form" method="post" action="{{ url('seller/update-profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                    <div class="profle_img">
                                        <div class="circle">
                                @if(isset($seller->profile_image) && $seller->profile_image != '')
                                 <img class="profile-pic" name="profile_image" src="{{ asset('storage/app/public/'.$seller->profile_image) }}" alt="profile_signup">
                                 @else
                                <img class="profile-pic" name="profile_image" src="{{ config('global.front_base_url').'images/user_default.png' }}" alt="profile_signup">
                                @endif
                                        </div>
                                        <div class="p-image">
                                            <i class="fa fa-camera upload-button"></i>
                                            <input class="file-upload" type="file" name="profile_image" accept="image/*"size="1" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">Name</label>
                                    <input type="text" class="form-control myaccount_input" name="name" value="{{$seller->name}}" placeholder="Type...">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">E-Mail</label>
                                    <input type="email" class="form-control myaccount_input"
                                        placeholder="johnwick@mail.com" name="email" value="{{$seller->email}}" readonly>
                                </div>
                               
                                @if(isset($seller->phone))
                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">Phone</label>
                                    <input type="number" class="form-control myaccount_input"
                                        placeholder="Type..." name="phone" value="{{$seller->phone}}">
                                </div>
                                @else
                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">Phone</label>
                                    <input type="number" class="form-control myaccount_input"
                                        placeholder="Type..." name="phone" value="{{$seller->phone}}" readonly>
                                </div>
                                @endif
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">Country</label>
                                    <select name="country_code" id="country_code" class="form-control login_country_select" required="" onchange="displayCity();">
                                        @foreach ($countrys as $key => $value)
                                            @if($value->id == $seller->country_code)
                                                <option value="{{ $value->id }}" selected>
                                                {{ $value->name }}</option>
                                            @else
                                                <option value="{{ $value->id }}">
                                                {{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">City</label>
                                    <select id= "city_code" class="form-control login_country_select" required="" name="city"></select>
                                    <input type="hidden" name="s_ct" id="s_ct" value="{{ $seller->city }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="myaccount_label">Zipcode</label>
                                    <input type="text" class="form-control myaccount_input" placeholder="Type..." name="zipcode" value="{{$seller->zipcode}}">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label class="myaccount_label">Address</label>
                                    <textarea class="form-control myaccount_input" id="address" class="address" rows="5"
                                        placeholder="Type..." name="address" value="{{$seller->address}}">{!!$seller->address!!}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary myaccount_btn">Save</button>
                        </form>
                    </div>

                    <div class="tab-pane fade contact_tabing_box" id="favorites" role="tabpanel"
                        aria-labelledby="favorites-tab">
                        <h2>Reports</h2>

                        <form class="myaccount_form">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control myaccount_input">
                                </div>
                                <div class="form-group col-md-1 text-center pt-2">
                                    <h2 class="m-0">TO</h2>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control myaccount_input">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary myaccount_btn py-2 px-4">Submit</button>
                                </div>
                            </div>
                        </form>

                        <div class="post_section row mt-2">
                            <div class="col-md-4 col-lg-3">
                                <div class="post_box ">
                                    <h4>2</h4>
                                    <h5>Posts</h5>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="post_box view_box">
                                    <h4>200</h4>
                                    <h5>view</h5>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="post_box contaced_box">
                                    <h4>16</h4>
                                    <h5>Contacted</h5>
                                </div>
                            </div>
                        </div>

                        <div class="report__storage row mt-3">
                            <div class="report__storage__card col-xl-5">
                                <div class="report__storage__imgbox">
                                    <img src="{{ asset('public/Seller-HTML/assets/img/report-storage-card-one.png') }}" alt="report-storage" class="img-fluid">
                                </div>
                                <div class="report__storage__contentbox">
                                    <h2>Storage name</h2>
                                    <p>7815 Chelico DriveSan Antonio, TX 78223</p>
                                    <h4>$13,157</h4>
                                    <a href="#" class="repoprt_storage_texts"><img src="{{ asset('public/Seller-HTML/assets/img/eye.png') }}" alt="eye" class="img-fluid"><span>114 Views</span></a>
                                    <a href="#" class="repoprt_storage_texts"><img src="{{ asset('public/Seller-HTML/assets/img/user.png') }}" alt="user" class="img-fluid"><span>12 Contacted</span></a>
                                </div>
                            </div>

                            <div class="report__storage__card col-xl-5">
                                <div class="report__storage__imgbox">
                                    <img src="{{ asset('public/Seller-HTML/assets/img/report-storage-card-one.png') }}" alt="report-storage" class="img-fluid">
                                </div>
                                <div class="report__storage__contentbox">
                                    <h2>Storage name</h2>
                                    <p>7815 Chelico DriveSan Antonio, TX 78223</p>
                                    <h4>$13,157</h4>
                                    <a href="#" class="repoprt_storage_texts"><img src="{{ asset('public/Seller-HTML/assets/img/eye.png') }}" alt="eye" class="img-fluid"><span>114 Views</span></a>
                                    <a href="#" class="repoprt_storage_texts"><img src="{{ asset('public/Seller-HTML/assets/img/user.png') }}" alt="user" class="img-fluid"><span>12 Contacted</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade contact_tabing_box" id="storages" role="tabpanel"
                        aria-labelledby="storages-tab">
                        <h2>Subscription plan</h2>
                        <div class="subscription_main row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="subscription_card_sub">
                                    <div class="subscription_card_top">
                                        Standard plan
                                    </div>

                                    <div class="subscription_card_body">
                                        <ul>
                                            <li>
                                                <span class="span_left">Status</span>
                                                <span class="span_right">Active</span>
                                            </li>
                                            <li>
                                                <span class="span_left">Country</span>
                                                <span class="span_right">USA</span>
                                            </li>
                                            <li>
                                                <span class="span_left">Purchase date</span>
                                                <span class="span_right">28 Dec 2022</span>
                                            </li>
                                            <li>
                                                <span class="span_left">Expiry date</span>
                                                <span class="span_right">27 Mar 2023</span>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary myaccount_btn py-33 px-5">Upgrade</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade contact_tabing_box" id="password" role="tabpanel"
                        aria-labelledby="password-tab">
                        <h2>Change password</h2>
                        <form class="myaccount_form mt-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="myaccount_label">Current Password</label>
                                    <input type="password" class="form-control myaccount_input" placeholder="*********">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="myaccount_label">New Password</label>
                                    <input type="password" class="form-control myaccount_input" placeholder="*********">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="myaccount_label">Confirm Password</label>
                                    <input type="password" class="form-control myaccount_input" placeholder="*********">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary myaccount_btn">Change</button>
                        </form>
                    </div>
                    <!-- <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">5</div> -->
                </div>
            </div>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
    </section>
    <!-- My Account Section End -->
@stop

@section('customjs')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ config('global.front_base_seller_url').'js/select2.min.js' }}"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var readURL = function (input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function () {
                readURL(this);
            });

            displayCity();

            /*$("#country_code").select2({"placeholder" : '---Select Country---'});
            $("#city_code").select2({"placeholder" : '---Select City---'});*/

            CKEDITOR.replace('address', { 

            });
        });


        function displayCity() {

            var country_code = $("#country_code").val();
            var token = $("input[name=_token]").val();
            var app_url = "{!! env('APP_URL'); !!}";
            var s_ct = $("#s_ct").val();

            $.ajax({
                url: app_url + '/seller/city/',
                type: "GET",
                data: { 'country_code': country_code, '_token': token },
                dataType: 'json',

                success: function (data) {

                    $('#city_code').empty();

                    $.each(data.cities, function (index, display_city) {

                        if (s_ct == display_city.id) {

                            $('#city_code').append('<option value="' + display_city.id + '" selected>' + display_city.name + '</option>');
                        }
                        else {
                            $('#city_code').append('<option value="' + display_city.id + '">' + display_city.name + '</option>');
                        }
                    });
                }
            });
        }
    </script>
@stop