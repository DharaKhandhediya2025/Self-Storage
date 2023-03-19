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

                    <!--<a class="nav-link" id="favorites-tab" data-toggle="pill" href="#favorites" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Favorites</a>

                    <a class="nav-link" id="storages-tab" data-toggle="pill" href="#storages" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">Contacted storages</a>-->

                    <a class="nav-link active" id="password-tab" href="{{ url('/change-password') }}" >Change password</a>

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

                
                       
                    <h2>Change password</h2>
                    <form class="myaccount_form mt-4" action="{{ url('/change-password') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="myaccount_label">Current Password</label>
                                <input type="password" name="old_password" class="form-control myaccount_input" placeholder="Type . . ." required>
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            </div>
                            @error('old_password')
                                <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="myaccount_label">New Password</label>
                                <input type="password" name="new_password" class="form-control myaccount_input" placeholder="Type . . ." required>
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            </div>
                            @error('new_password')
                                <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="myaccount_label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control myaccount_input" placeholder="Type . . ." required>
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            </div>
                             @error('confirm_password')
                                <span class="invalid-feedback" role='alert' style="color: red"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary myaccount_btn">Change</button>
                    </form>
                </div>
                <div class="tab-pane fade contact_tabing_box" id="favorites" role="tabpanel"
                        aria-labelledby="favorites-tab">
                        <h2>Favorites</h2>
                        <div class="favorites_card_main">
                            <div class="favorites_card_sub">
                                <a href="#">
                                    <div class="favorites_card">
                                        <div class="favorites_card">
                                            <img src="assets/img/favorites-img-one.png" alt="favorites-img-one"
                                                class="img-fluid">
                                            <a href="#" class="favorites_card_link">
                                                <i class="fa fa-heart favorite_heart"></i>
                                            </a>
                                        </div>
                                </a>
                                <a href="#">
                                    <div class="favorites_card_content">
                                        <p>7815 Chelico DriveSan Antonio, TX 78223</p>
                                        <ul>
                                            <li>Climate Controlled</li>
                                            <li>Vehicle Storage</li>
                                        </ul>
                                        <h4>$30/mo</h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="favorites_card_sub">
                            <div class="favorites_card">
                                <a href="#">
                                    <div class="favorites_card">
                                        <img src="assets/img/favorites-img-two.png" alt="favorites-img-one"
                                            class="img-fluid">
                                        <a href="#" class="favorites_card_link">
                                            <i class="fa fa-heart favorite_heart"></i>
                                        </a>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="favorites_card_content">
                                        <p>2505 S HackberrySan Antonio, TX 78210</p>
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

                <div class="tab-pane fade contact_tabing_box" id="storages" role="tabpanel"
                    aria-labelledby="storages-tab">
                    <h2>Contacted storages</h2>
                    <div class="favorites_card_main">

                        <div class="favorites_card_sub">
                            <div class="favorites_card">
                                <a href="#">
                                    <div class="favorites_card">
                                        <img src="assets/img/favorites-img-two.png" alt="favorites-img-one"
                                            class="img-fluid">
                                        <a href="#" class="favorites_card_link">
                                            <i class="fa fa-heart favorite_heart"></i>
                                        </a>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="favorites_card_content">
                                        <p>2505 S HackberrySan Antonio, TX 78210</p>
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
                 </div>
        </div>
        </div>
    </section>
    <!-- My Account Section End -->
    
    <!-- chat Box Start -->
    <div class="chat_box_main_wrapper">
        <!-- <div class="chat_box_bg"></div> -->
        <div class="chat_boxsub_wrapper">
            <div class="chat_box_header">
                <h6 class="chat_heaader_title">Message</h6>
                <a href="#" class="chat_close"><i class="fa fa-times"></i></a>
            </div>
            <div class="chat_box_body">
                <div class="chat_list">
                    <a href="#" class="chat_sub_list">
                        <div class="chat_box_img">
                            <img src="assets/img/chat-img-one.png" alt="chat-img-one" class="img-fluid">
                        </div>

                        <div class="chat_box_content">
                            <h4>Samantha William</h4>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>

                        <div class="chat_box_content_right">
                            <span class="chat_time">12:45 PM</span>
                            <span class="chat_badge">2</span>
                        </div>
                    </a>

                    <a href="#" class="chat_sub_list mt-3">
                        <div class="chat_box_img">
                            <img src="assets/img/chat-img-two.png" alt="chat-img-one" class="img-fluid">
                        </div>

                        <div class="chat_box_content">
                            <h4>Tony Soap</h4>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>

                        <div class="chat_box_content_right">
                            <span class="chat_time">12:45 PM</span>
                            <span class="chat_badge">2</span>
                        </div>
                    </a>

                    <a href="#" class="chat_sub_list mt-3">
                        <div class="chat_box_img">
                            <img src="assets/img/chat-img-three.png" alt="chat-img-three" class="img-fluid">
                        </div>

                        <div class="chat_box_content">
                            <h4>Karen Hope</h4>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>

                        <div class="chat_box_content_right">
                            <span class="chat_time">12:45 PM</span>
                            <!-- <span class="chat_badge">2</span> -->
                        </div>
                    </a>

                    <a href="#" class="chat_sub_list mt-3">
                        <div class="chat_box_img">
                            <img src="assets/img/chat-img-four.png" alt="chat-img-four" class="img-fluid">
                        </div>

                        <div class="chat_box_content">
                            <h4>Jordan Nico</h4>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>

                        <div class="chat_box_content_right">
                            <span class="chat_time">12:45 PM</span>
                            <!-- <span class="chat_badge">2</span> -->
                        </div>
                    </a>

                    <a href="#" class="chat_sub_list mt-3">
                        <div class="chat_box_img">
                            <img src="assets/img/chat-img-five.png" alt="chat-img-five" class="img-fluid">
                        </div>

                        <div class="chat_box_content">
                            <h4>Nadila Adja</h4>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>

                        <div class="chat_box_content_right">
                            <span class="chat_time">12:45 PM</span>
                            <!-- <span class="chat_badge">2</span> -->
                        </div>
                    </a>


                </div>
            </div>
        </div>

        <!-- chatbox -->
        <div class="chating_box">
            <div class="chatbox">
                <div class="modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="msg-head">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <a href="#" class="chat_back">
                                        <img src="assets/img/chat-back.png" alt="chat-back">
                                    </a>
                                </div>
                                <div class="">
                                    <h3>Samantha William</h3>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="msg-body">
                                <ul>
                                    <div class="d-flex">
                                        <div class="sender_img_box">
                                            <img src="assets/img/avatar.png" alt="" srcset="">
                                        </div>
                                        <li class="sender">
                                            <p> <span>Hi, how are you Adam?</span>
                                                <span class="time">8:55 AM, Today</span>
                                            </p>

                                        </li>
                                    </div>



                                    <div class="d-flex">
                                        <li class="repaly">
                                            <p>
                                                <span>Hi Samantha i am good tnx how about you?</span>
                                                <span class="time_sender">10:35 am</span>
                                            </p>

                                        </li>
                                        <div class="sender_img_box">
                                            <img src="assets/img/avatar.png" alt="" srcset="">
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="sender_img_box">
                                            <img src="assets/img/avatar.png" alt="" srcset="">
                                        </div>
                                        <li class="sender">
                                            <p> <span>I am good too, thank you for your chat template</span>
                                                <span class="time">8:55 AM, Today</span>
                                            </p>

                                        </li>
                                    </div>



                                </ul>
                            </div>
                        </div>

                        <div class="send-box">
                            <form action="">
                                <input type="text" class="form-control" aria-label="message…"
                                    placeholder="Write message…">
                                <div class="send_btn_box">
                                    <button type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chatbox -->
    </div>
    <!-- chat Box End -->


  @stop

