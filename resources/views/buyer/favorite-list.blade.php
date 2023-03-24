@extends('headerfooter')@section('title','Change Password')

@section('content')
    <!-- My Account Section Start -->
    <section class="my_account_section">
        <div class="container-fluid">
            <div class="">
                <h2 class="tabing_title">My Account</h2>
            </div>
            <div class="my_account_tabing">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="myprofile-tab"  href="{{ url('/manage-profile') }}">My Profile</a>

                    <a class="nav-link active" id="favorites-tab"  href="{{ url('/favorite-list') }}" >Favorites</a>

                    <!--<a class="nav-link" id="storages-tab" data-toggle="pill" href="#storages" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">Contacted storages</a>-->

                    <a class="nav-link" id="password-tab" href="{{ url('/change-password') }}" >Change password</a>

                    <a href="{{ url('/web-logout') }}" class="nav-link log_out_text" id="logout-tab" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
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
            </div>

                
                        <h2>Favorites</h2>
                
                        <div class="favorites_card_main">
                            <div class="favorites_card_sub">
                                
                    @if(isset($storages) && sizeof($storages) > 0)
                        @foreach($storages as $key => $value)
                                <?php
                                    $existRecord = App\Models\FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$value->id)->first();
                                ?>
                            <div class="favorites_card">
                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}">
                                    <div class="favorites_card">
                                        @if(isset($existRecord) && $existRecord != '')
                                            @if(isset($value->storage_image) && sizeof($value->storage_image) > 0)
                                             <img src="{{ config('global.image_base_url').'/'.$value->storage_image[1]->image }}" alt="nearby-one" class="img-fluid" style="height: 200px;">
                                            @endif
                                        @endif
                                            @if(isset($existRecord) && $existRecord != '')
                                            <a href="javascript:addToFavourite({{ $value->id }})" class="favorites_card_link new_a_cls_{{ $value->id }}"><i class="fa fa-heart favorite_heart new_i_cls_{{ $value->id }}" title="Remove From Favourite"></i></a>
                                            @endif
                                    </div>
                                </a>
                                <a href="{{ url('/storage-detail')}}/{{$value->slug}}"></a>
                                    <div class="nearby_slider_content">
                                        @if(isset($existRecord) && $existRecord != '')
                                        <p> {{$value->title}} - {{$value->storage_no}} , {{$value->city}} </p>
                                         @if(isset($value->storage_aminites) && sizeof($value->storage_aminites) > 0)
                                            <ul>
                                                @foreach($value->storage_aminites as $key1 => $value1)
                                                    <li>{{ @$value1->aminites_detail->name }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <h4>${{$value->price}}/mo</h4>
                                        @endif
                                    </div>
                                
                            </div> 
                        @endforeach
                    @endif 
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Section End -->
    
    <!-- chat Box Start -->
   
    <!-- chat Box End -->


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
