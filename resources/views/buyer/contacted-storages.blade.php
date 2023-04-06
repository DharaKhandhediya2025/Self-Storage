@extends('headerfooter')@section('title','Favorite List')

@section('content')
    
    <!-- My Account Section Start -->
    <section class="my_account_section">
        <div class="container-fluid">
            <div class=""><h2 class="tabing_title">My Account</h2></div>
            <div class="my_account_tabing">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="{{ url('/manage-profile') }}">My Profile</a>
                    <a class="nav-link" href="{{ url('/favorite-list') }}" >Favorites</a>
                    <a class="nav-link active" id="storages-tab" href="{{ url('/contacted-storages') }}">Contacted storages</a> 
                    <a class="nav-link" href="{{ url('/change-password') }}" >Change password</a>
                    <a href="{{ url('/web-logout') }}" class="nav-link log_out_text" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    
                        <h2>Contacted Storages</h2>
                        <div class="favorites_card_main">
                            @if(isset($storages) && sizeof($storages) > 0)
                                @foreach($storages as $key => $value)
                                    <div class="favorites_card_sub">
                                        <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                            <div class="favorites_card">
                                                <div class="favorites_card">
                                                    <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="nearby-one" class="img-fluid" style="height: 200px !important;">
                                                    <a href="javascript:addToFavourite({{ $value->id }})" class="favorites_card_link new_a_cls_{{ $value->id }}"><i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}" title="Remove From Favourite"></i></a>
                                                </div>
                               
                                                <div class="favorites_card_content" style="height: 200px !important;">
                                                    <p>{{$value->title}} - {{$value->storage_no}} , {{$value->city}}</p>
                                                    <ul>
                                                        @foreach($value->storage_aminites as $key1 => $value1)
                                                            <li>{{ @$value1->aminites_detail->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                    <h4>${{$value->price}}/mo</h4>
                                                </div>
                                               
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- My Account Section End -->
@stop
@section('customjs')
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
