@extends('headerfooter')@section('title','Post - Trouve ton entrepot')

@section('content')
    <section class="create_post_banner">
        <h2>Create post</h2>
    </section>
    <!-- Create Post Banner Section End -->
    <!-- Creat Post Section Start -->
    <section class="post_card_section">
        <div class="container">
            <div class="post_card">

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
                                        <div class="progress_text pr-2" x-text="parseInt(step / 1 * 100) +'%'"></div>
                                        <div class="completed_text"><span>completed</span></div>
                                    </div>
                                    <div class="w-full rounded-full mr-2 progress_bar">
                                        <div class="rounded-full bg-green-500 h-2 text-center text-white progress_first"
                                            :style="'width: '+ parseInt(step / 1 * 100) +'%'"></div>
                                    </div>

                                </div>
                            </div>
                            <!-- /Top Navigation -->

                            <!-- Step Content -->
                            <div class="crea_post_main_wrapper  ">
                            

                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            <div class="create_post_form">
                                                <form method="post" action="{{ url('/upload-post')}}" enctype="multipart/form-data">
                                                @csrf
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
                                                <div class="form-group">
                                                    <button type="submit" style="float: right;margin-top: -10px;" class="btn creat_post_next">Post</button>
                                                </div>
                                            </form>
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
                                   
                                </div>

                                <div class="w-1/2 text-right">
                                  

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
                </div>
            </div>
        </div>
    </section>
    <!-- Myads Section End -->

  @stop
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
    @stop