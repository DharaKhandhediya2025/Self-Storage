@extends('headerfooter')@section('title','Contact Us')

@section('content')
    <!-- Create Post Banner Section Start -->
    <section class="create_post_banner">
        <h2>Create post</h2>
    </section>
    <!-- Create Post Banner Section End -->
    <!-- Creat Post Section Start -->
    <section class="post_card_section">
        <div class="container">
            <div class="post_card">
                <form action="{{ url('/create-post')}}" enctype="multipart/form-data" method="post" class="create_post_form">
                @csrf
                <div x-data="app()" x-cloak>
                    <div class="post_card_top">
                        <div x-show.transition="step === 'complete'">
                            <div class="creat_congra_box">
                                <img src="assets/img/password-reset-img.png" alt="password-reset-img" class="img-fluid">

                                <h2 class="Congratulation_text">Congratulations!</h2>

                                <button @click="step = 1" class="Backto_home_btn">Back to home</button>
                            </div>
                        </div>

                        <div x-show.transition="step != 'complete'">
                            <!-- Top Navigation -->
                            <div class="progress_content_box">
                                <div class="create_post_header">
                                    <h2>Add Storage Details</h2>
                                </div>
                                <div class="progess_box_text_box">
                                    <div class="progress_top_text">
                                        <div class="progress_text pr-2" x-text="parseInt(step / 4 * 100) +'%'"></div>
                                        <div class="completed_text"><span>completed</span></div>
                                    </div>
                                    <div class="w-full rounded-full mr-2 progress_bar">
                                        <div class="rounded-full bg-green-500 h-2 text-center text-white progress_first"
                                            :style="'width: '+ parseInt(step / 4 * 100) +'%'"></div>
                                    </div>

                                </div>
                            </div>
                            <!-- /Top Navigation -->

                            <!-- Step Content -->
                            
                            <div class="crea_post_main_wrapper  ">
                                <div x-show.transition.in="step === 1">
                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            
                                                <div class="form-group">
                                                    <label class="create_post_label">Title</label>
                                                    @if(isset($storage))
                                                    <input type="text" name="title" class="form-control create_post_input"
                                                        placeholder="Type here..." required value="{{$storage->title}}">
                                                    @else
                                                    <input type="text" name="title" class="form-control create_post_input"
                                                        placeholder="Type here..." required>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Storage type</label>
                                                    <select class="form-control create_post_input" name="category" required>
                                                    <option value="">Select Category</option>

                                                    @foreach ($category as $key => $value)
                                                    @if(isset($storage))
                                                        @if($value->id == $storage->cat_id)
                                                            <option value="{{ $value->id }}" selected>
                                                            {{ $value->name }}</option>
                                                        @else
                                                            <option value="{{ $value->id }}">
                                                            {{ $value->name }}</option>
                                                        @endif
                                                    @endif
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Discription</label>
                                                    @if(isset($storage))
                                                    <textarea class="form-control create_post_input" rows="3"
                                                        placeholder="Type here..." name="description" value="{{$storage->description}}" required>
                                                        {{$storage->description}}
                                                    </textarea>
                                                    @else
                                                    <textarea class="form-control create_post_input" rows="3"
                                                        placeholder="Type here..." name="description" required></textarea>
                                                        @endif
                                                </div>
                                            <div class="w-1/2 text-right">
                                    <!-- <button type="submit" 
                                        class="btn creat_post_next">Next</button> -->
                                    </div>

                                        </div>
                                    </div>

                                </div>

                                <div x-show.transition.in="step === 2">
                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            
                                                <h2>Where is it located and contact?</h2>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Country</label>
                                                        <select class="form-control create_post_input" name="country" id="country_code" required="" onchange="displayCity();">
                                                        @foreach ($countrys as $key => $value)
                                                            @if(isset($storage))
                                                                @if($value->id == $storage->country)
                                                                    <option value="{{ $value->id }}" selected>
                                                                    {{ $value->name }}</option>
                                                                @else
                                                                    <option value="{{ $value->id }}">
                                                                    {{ $value->name }}</option>
                                                                @endif
                                                            @endif
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">City</label>
                                                        <select class="form-control create_post_input" name="city" id="city_code">
                                                            <input type="hidden" name="s_ct" id="s_ct" value="{{ $seller->city }}">
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Address</label>
                                                    <textarea class="form-control create_post_input" name="address" rows="2"
                                                        placeholder="Type here..." required></textarea>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Storage no </label>
                                                        <input type="number" class="form-control create_post_input"
                                                            placeholder="ex. 124" name="storage_no">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Zipcode</label>
                                                        <input type="number" class="form-control create_post_input"
                                                            placeholder="ex. 124578" name="zipcode" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Phone 1 </label>
                                                        <input type="number" class="form-control create_post_input"
                                                            placeholder="ex. +1 456789456" name="phone1" id="phone_one" required>
                                                            <span class="alert" style="color:red;"></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Phone 2 </label>
                                                        <input type="number" class="form-control create_post_input"
                                                            placeholder="ex. +1 456789456" name="phone2" id="phone2">
                                                            <span class="phonealert" style="color:red;"></span>
                                                    </div>
                                                </div>
                                                
                                           
                                        </div>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 3">

                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            
                                                <h2>About storage</h2>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Number of floors</label>
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="0" name="no_of_floors" required>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Size</label>
                                                        <div class="create_size_box">
                                                            <span>Sq. ft</span>
                                                            <input type="text" name="size" class="form-control create_post_input" placeholder="0" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Storage </label>
                                                        <div class="create_storage_box">
                                                            
                                                            <a class="btn btn-primary create_add_btn" onclick="AddFunction()" style="color: white;">Add</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="table-responsive-sm">

                                                    <table class="table" id="dynamicAddRemove">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Dimension</th>
                                                                <th scope="col">Inventory</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Surface (pi2)</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td scope="row"><input type="text" class="form-control create_post_input"
                                                                placeholder="Dimension" name="diamention[]" required></td>
                                                                <td><input type="text" class="form-control create_post_input" name="inventory[]" placeholder="Inventory" required></td>
                                                                <td><input type="text" class="form-control create_post_input" name="price[]" placeholder="Price" required></td>
                                                                <td><input type="text" class="form-control create_post_input" name="surface[]" placeholder="Surface (pi2)" required></td>
                                                                
                                                            </tr>
                                                            

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Aminites</label>
                                                        <div class="create_amenities_box">

                                                            <div class="form-group">
                                                                @foreach($aminites as $aminity)
                                                                <div class="form-check form_check_active">
                                                                    <input type="checkbox" class="form-check-input" name="aminites[]" value="{{$aminity->id}}">
                                                                    <label class="form-check-label">{{$aminity->name}}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>

                                </div>
                                <div x-show.transition.in="step === 4   ">

                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            <div class="create_post_form">
                                                <h2 class="upload_title">Upload photos and videos</h2>
                                                <div class="upload_img_row">
                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" name="img1" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" name="img2" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" name="img3"/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" name="img4" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" name="img5" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="upload_video_url_box my-3">
                                                    <h2 class="upload_title">Video url</h2>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="URL" name="url">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                       
                            <!-- / Step Content -->
                        </div>
                    </div>

                    <!-- Bottom Navigation -->
                    <div class="left-0 right-0 pb-4" x-show="step != 'complete'">
                        <div class="max-w-3xl mx-auto px-4">
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button x-show="step > 1" @click="step--"
                                        class="create_previous_btn">Previous</button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button type="button" x-show="step < 4 " @click="step++"
                                        class="btn creat_post_next">Next</button>

                                     <button @click="step = 'complete'" x-show="step === 4"
                                        class="btn creat_post_next">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
                </div>
            </form>
            </div>
        </div>
    </section>
    <!-- Myads Section End -->

   @endsection
  @section('customjs')
  <script>
        function app() {
            return {
                step: 1,
                passwordStrengthText: '',
                togglePassword: false,

                // image: 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80',
                password: '',
                gender: 'Male',

                checkPasswordStrength() {
                    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

                    let value = this.password;

                    if (strongRegex.test(value)) {
                        this.passwordStrengthText = "Strong password";
                    } else if (mediumRegex.test(value)) {
                        this.passwordStrengthText = "Could be stronger";
                    } else {
                        this.passwordStrengthText = "Too weak";
                    }
                }
            }
        }
    </script>
    <script>
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e) {
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file) {
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                reader.onload = function () {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file) {
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file) {
                    throw 'Kein Bild gewählt';
                } else {
                    previewImage(file);
                }
            }

        }

        // initialize box-scope
        var boxes = document.querySelectorAll('.box');

        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }



        /// drop-effect
        function initDropEffect(box) {
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e) {
                area = e.currentTarget
                // create drop
                if (!drop) {
                    drop = document.createElement('span');
                    drop.className = 'drop';
                    this.appendChild(drop);
                }
                // reset animate class
                drop.className = 'drop';

                // calculate dimensions of area (longest side)
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                // set drop dimensions to fill area
                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                // calculate dimensions of drop
                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                // calculate relative coordinates of click
                // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }

    </script>


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

        $('#phone_one').keypress(function (e) {

                var length = jQuery(this).val().length;

                if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
                else if((length == 0) && (e.which == 48)) {
                    return false;
                }
                else if(length < 3 || length > 15) {
                    $("span.alert").html("Your number must be between 7 to 15 digits.");
                }
                else if(length > 7) {
                    $("span.alert").html('');
                }
            });
        $('#phone2').keypress(function (e) {

                var length = jQuery(this).val().length;

                if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
                else if((length == 0) && (e.which == 48)) {
                    return false;
                }
                else if(length < 3 || length > 15) {
                    $("span.phonealert").html("Your number must be between 7 to 15 digits.");
                }
                else if(length > 7) {
                    $("span.phonealert").html('');
                }
            });
    </script>
@stop
  