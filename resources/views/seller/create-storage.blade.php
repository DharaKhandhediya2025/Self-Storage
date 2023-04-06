@extends('headerfooter')@section('title','Storage - Trouve ton entrepot')

@section('content')
<style>
    .image__upload_wrapper .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
    background: url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    display: inline-block;
    border: 2px dashed #CCCCCC;
    border-radius: 12px;
}

.image__upload_wrapper .upload-img {
    display: block;
    position: absolute;
    top: 50%;
    background: transparent;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 2px solid #CCCCCC;
    width: 40px;
    height: 40px;
    line-height: 37px;
    border-radius: 50%;
    font-size: 20px;
    padding: 2px 10px;
    color: #cccccc;
    font-weight: normal;
}

.image__upload_wrapper .imgUp {
    margin-bottom: 15px;
    position: relative;
    height: 100%;
}

.image__upload_wrapper .del {
    position: absolute;
    top: 2px;
    right: 17px;
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    background-color: #ffffffb5;
    cursor: pointer;
    border-top-right-radius: 12px;
}

.image__upload_wrapper .imgAdd {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #193b73;
    color: #fff;
    box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
    text-align: center;
    line-height: 32px;
    margin-top: 0px;
    cursor: pointer;
    font-size: 15px;
    margin-left: 12px;
}
.ass_star_color{
    background-color: red;
}
</style>
    <section class="create_post_banner">
        <h2>Create post</h2>
    </section>
    <!-- Create Post Banner Section End -->
    <!-- Creat Post Section Start -->
    <section class="post_card_section">
        <div class="container">
            <div class="post_card">
                <form action="{{ url('create-storage')}}" enctype="multipart/form-data">
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
                                            <form class="create_post_form">
                                                <div class="form-group">
                                                    <label class="create_post_label">Title</label>
                                                    <input type="text" class="form-control create_post_input"
                                                        placeholder="Type here..." id="email_address">
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Storage type</label>
                                                    <select class="form-control create_post_input">
                                                        <option>Select</option>
                                                        <option>Storage 1</option>
                                                        <option>Storage 2</option>
                                                        <option>Storage 3</option>
                                                        <option>Storage 4</option>
                                                        <option>Storage 5</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Discription</label>
                                                    <textarea class="form-control create_post_input" rows="3"
                                                        placeholder="Type here..."></textarea>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>

                                <div x-show.transition.in="step === 2">
                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            <form class="create_post_form">
                                                <h2>Where is it located and contact?</h2>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Country</label>
                                                        <select class="form-control create_post_input">
                                                            <option>Select</option>
                                                            <option>India</option>
                                                            <option>Dubai</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">City</label>
                                                        <select class="form-control create_post_input">
                                                            <option>Select</option>
                                                            <option>Jaipur</option>
                                                            <option>Dubai</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="create_post_label">Address</label>
                                                    <textarea class="form-control create_post_input" rows="2"
                                                        placeholder="Type here..."></textarea>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Storage no </label>
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="ex. 124">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Zipcode</label>
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="ex. 124578">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Phone 1 </label>
                                                        <input type="tel" class="form-control create_post_input"
                                                            placeholder="ex. +1 456789456">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="create_post_label">Phone 2 </label>
                                                        <input type="tel" class="form-control create_post_input"
                                                            placeholder="ex. +1 456789456">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 3">

                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            <form class="create_post_form">
                                                <h2>About storage</h2>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Number of floors</label>
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="0">
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Size</label>
                                                        <div class="create_size_box">
                                                            <span>Sq. ft</span>
                                                            <select class="form-control create_post_input">
                                                                <option>800</option>
                                                                <option>1000</option>
                                                                <option>1200</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Storage </label>
                                                        <div class="create_storage_box">
                                                            <input type="text" class="form-control create_post_input"
                                                                placeholder="Dimension">
                                                            <input type="text" class="form-control create_post_input"
                                                                placeholder="Inventory">
                                                            <input type="text" class="form-control create_post_input"
                                                                placeholder="Price">
                                                            <input type="text" class="form-control create_post_input"
                                                                placeholder="Surface (pi2)">
                                                            <button class="btn btn-primary create_add_btn" style="max-width: 90px;padding: 8px 30px;background: #000000;border-radius: 38px;width: 210px;border: none;font-weight: 600;border: none;">Add</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="table-responsive-sm">

                                                    <table class="table">
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
                                                                <td scope="row">5x10</td>
                                                                <td>1</td>
                                                                <td>50</td>
                                                                <td>50</td>
                                                                <td><a href="#" class="delete_text">Delete</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row">5x10</td>
                                                                <td>1</td>
                                                                <td>50</td>
                                                                <td>50</td>
                                                                <td><a href="#" class="delete_text">Delete</a></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="create_post_label">Amenities </label>
                                                        <div class="create_amenities_box">

                                                            <div class="form-group">
                                                                <div class="form-check form_check_active">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Climate
                                                                        Control</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Premium
                                                                        Security</label>
                                                                </div>
                                                                <div class="form-check form_check_active">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Vehicle
                                                                        storage</label>
                                                                </div>
                                                                <div class="form-check form_check_active">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Heated
                                                                        storage</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">Cooled
                                                                        storage</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">24x7</label>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>



                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div x-show.transition.in="step === 4   ">

                                    <div class="create_post_main">
                                        <div class="create_post_body">
                                            <div class="create_post_form">
                                                <h2 class="upload_title">Upload photos and videos</h2>
                                                <!-- <div class="upload_img_row">
                                                    <div class="image_upload_main_wrapper">
                                                        <div class="image_upload_wrapper">
                                                            <div class="box">
                                                                <div class="js--image-preview"></div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload"
                                                                            accept="image/*" />
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
                                                                            accept="image/*" />
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
                                                                            accept="image/*" />
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
                                                                            accept="image/*" />
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
                                                                            accept="image/*" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- Upload img  -->
                                                <div class="row image__upload_wrapper">
                                                    <div class="col-sm-6 imgUp">
                                                        <div class="imagePreview"></div>
                                                        <label class="btn upload-img">
                                                            <i class="fa fa-plus add_img_btn"></i> <input type="file"
                                                                class="uploadFile img" value="Upload Photo"
                                                                style="width: 0px;height: 0px;overflow: hidden;">
                                                        </label>
                                                    </div>
                                                    <i class="fa fa-plus imgAdd"></i>
                                                </div>
                                                <!-- upload Img -->
                                                <div class="upload_video_url_box my-3">
                                                    <h2 class="upload_title">Video url</h2>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control create_post_input"
                                                            placeholder="URL">
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
                                        class="btn create_previous_btn" style="background: rgb(255, 255, 255);border: 1px solid rgb(0, 0, 0);border-radius: 25px;font-family: Poppins;font-weight: 400;font-size: 16px;color: #000;padding: 10px 70px;">Previous</button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button x-show="step < 4" @click="step++" type="button"
                                        class="btn creat_post_next" style="    background: #000000;border-radius: 25px;font-family: 'Poppins';font-weight: 400;font-size: 16px;line-height: 24px;color: #FFFFFF;padding: 10px 80px;">Next</button>

                                    <button type="submit" @click="step = 'complete'" x-show="step === 4"
                                        class="btn creat_post_next" style="background: #000000;border-radius: 25px;font-family: 'Poppins';font-weight: 400;font-size: 16px;line-height: 24px;color: #FFFFFF;padding: 10px 80px;">Post</button>
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
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>

        function app() {
            return {
                step: 1,
                passwordStrengthText: '',
                togglePassword: false,

                 image: 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80',
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
    <!-- Upload img js
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
    </script> -->
    <script>
        $(".imgAdd").click(function () {
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-6 imgUp"><div class="imagePreview"></div><label class="btn upload-img"><i class="fa fa-plus"></i><input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
        $(document).on("click", "i.del", function () {
            //  to remove card
            $(this).parent().remove();
            // to clear image
            // $(this).parent().find('.imagePreview').css("background-image","url('')");
        });
        $(function () {
            $(document).on("change", ".uploadFile", function () {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                    }
                }

            });
        });
    </script>
    @stop
