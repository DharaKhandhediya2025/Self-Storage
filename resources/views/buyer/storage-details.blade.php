@extends('headerfooter')@section('title','Storage - Trouve ton entrepot')

@section('content')

   
    <!-- Thumbnail img section Start -->
    <div class="thumbnail_slder_box">
        <div class="container-fluid">
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
            <div class="detail_thumbnail_box">
                <div class="vehicle-detail-banner banner-content clearfix">
                    <div class="banner-slider">
                        <div class="slider slider-for">
                            @foreach($storage_images as $row)
                            <div class="slider-banner-image">
                                <img src="{{ asset('storage/app/public/'.$row->image) }}" alt="detail-home" style="height: 500px; width: 1200px;">
                            </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav thumb-image">
                            @foreach($storage_images as $row)
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="{{ asset('storage/app/public/'.$row->image) }}" alt="detail-nav-img" class="img-fluid">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="storage_details_left__main">
                        <div class="storage_name_box">
                            <div class="storage_name_box_left">
                                <h4>{{$storage->name}}</h4>
                                <p>{{$storage->title}} - {{$storage->storage_no}} , {{$storage->city}} </p>
                                <div class="store_contact_box">
                                    <a href="#"> <i class="fa fa-phone"></i> <span>{{$storage->phone1}}</span></a>
                                    <a href="#"> <i class="fa fa-phone"></i> <span>{{$storage->phone2}}</span></a>
                                </div>
                            </div>
                            <div class="storage_name_box_right">
                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-share" aria-hidden="true"></i></a>
                                <a href="#"><span>${{$storage->price}}/mo</span></a>
                            </div>
                        </div>
                        <div class="about_storage_box">
                            <h4>About this storage</h4>
                            <p>{!!$storage->description!!}</p>
                        </div>
                        <div class="store_detail_box">
                            <h4>Storage Details</h4>
                            <ul class="store_detail_ul">
                                <li class="store_detail_li">
                                    <span class="store_detail_span_left">Size</span>
                                    <span class="store_detail_span_right">{{$storage->size}} {{$storage->size_unit}}</span>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="store_amenities_box">
                            <h4>Amenities</h4>
                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/right_img.png') }}" alt="right_img" class="img-fluid"><span
                                    class="store_amenities_span">Climate Control</span></a>
                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/right_img.png') }}" alt="right_img" class="img-fluid"><span
                                    class="store_amenities_span">Premium Security</span></a>
                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/right_img.png') }}" alt="right_img" class="img-fluid"><span
                                    class="store_amenities_span">Portable Container Storage</span></a>
                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/right_img.png') }}" alt="right_img" class="img-fluid"><span
                                    class="store_amenities_span">Vehicle Storage</span></a>
                        </div>
                        <div class="store_map_box">
                            <h4>Map</h4>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.297472214083!2d72.66809901483957!3d23.049553284939424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e87960158f889%3A0x2bda7d524f9233f4!2sApp%20Ideas%20Infotech%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1677567040727!5m2!1sen!2sin"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="storage_review_box">
                            <div class="storage_review_box_header">
                                <div class="storage_review_box_header_lft">
                                    <div class="storage_header_lft_box">
                                        <h2>4.0</h2>
                                    </div>
                                    <div class="storage_header_lftrft_box">
                                        <div>
                                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star"
                                                    class="img-fluid"></a>
                                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star"
                                                    class="img-fluid"></a>
                                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star"
                                                    class="img-fluid"></a>
                                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star"
                                                    class="img-fluid"></a>
                                            <a href="#"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}" alt="star"
                                                    class="img-fluid"></a>
                                        </div>
                                        <h6>({{$count}} Reviews)</h6>
                                    </div>
                                </div>

                                <div class="storage_review_box_header_rht">
                                    <a href="#" class="btn add_review_btn" data-toggle="modal"
                                        data-target="#reviewmodel">Add review</a>

                                    <!-- Review Modal -->

                                    <div class="add_review_model_box">
                                        <div class="modal fade" id="reviewmodel" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="add_review_body_text text-center">
                                                            <form action="{{ url('/add-review') }}/{{$storage->slug}}" method="POST">
                                                                @csrf
                                                            @if(isset($buyer->profile_image))
                                                             <img src="{{ asset('storage/app/public/'.$buyer->profile_image) }}" alt="avatar"
                                                                class="img-fluid" style="height: 100px; width: 100px;">
                                                             @else
                                                            <img src="{{ asset('public/Buyer-HTML/assets/img/avatar.png') }}" alt="avatar"
                                                                class="img-fluid">
                                                            @endif
                                                               
                                                            <h2>{{$buyer->name}}</h2>
                                                            <div class="review_modal_star" id="img">
                                                                <span class="rating">
                                                                <a type="radio" name="rate" value="1" id="rate1"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}"
                                                                        alt="review-star" class="img"></a>
                                                                <a id="rate2" type="radio" name="rate" value="2"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}"
                                                                        alt="review-star" class="img"></a>
                                                                <a id="rate3" type="radio" name="rate" value="3"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}"
                                                                        alt="review-star" class="img"></a>
                                                                <aid="rate4" type="radio" name="rate" value="4"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}"
                                                                        alt="review-star" class="img"></a>
                                                                <a id="rate5"><img src="{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}"
                                                                        alt="review-star" class="img"></a>
                                                                </span>
                                                            </div>
                                                            <h6>How was your experience?</h6>
                                                            <p>Your feedback will help improve <br> your experience</p>
                                                            
                                                                <div class="form-group">
                                                                    <textarea class="form-control detail_inquiry_input"
                                                                        rows="4" name="review" placeholder="Comments..."></textarea>
                                                                </div>


                                                                <button type="submit"
                                                                    class="btn review_submit_btn">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Review Modal -->

                                </div>


                            </div>

                            @foreach($storage_rates as $row)
                            <div class="review_card mb-3">
                                <div class="review_card_img">
                                    <img src="{{ asset('storage/app/public/'.$row->buyer->profile_image) }}" alt="review-img" class="img-fluid" style="height: 50px; width: 50px;">
                                </div>
                                <div class="review_card_content">
                                    <h4>{{$row->buyer->name}}</h4>
                                    <h6>{{ $row->updated_at->diffForHumans() }}</h6>
                                    <ul class="d-flex">
                                        <li><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star" class="img-fluid"></li>
                                        <li><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star" class="img-fluid"></li>
                                        <li><img src="{{ asset('public/Buyer-HTML/assets/img/review-star.png') }}" alt="star" class="img-fluid"></li>
                                        <li><img src="{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}" alt="star" class="img-fluid"></li>
                                        <li><img src="{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}" alt="star" class="img-fluid">
                                        </li>
                                    </ul>
                                    <p>{!!$row->review!!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="detail_inquiry_form">
                        <h2>Inquiry</h2>
                        <h6>Please share your details to contact the seller.</h6>
                        <form action="{{ url('/add-inquiry') }}/{{$storage->slug}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="detail_inquiry_label">NAME</label>
                                <input type="text" name="name" class="form-control detail_inquiry_input"
                                    placeholder="Ex. John adam" required>
                            </div>

                            <div class="form-group">
                                <label class="detail_inquiry_label">E-Mail</label>
                                <input type="email" name="email" class="form-control detail_inquiry_input"
                                    placeholder="Ex. loremipsum@mail.com" required>
                            </div>

                            <div class="form-group">
                                <label class="detail_inquiry_label">Phone</label>
                                <input type="number" name="phone" class="form-control detail_inquiry_input"
                                    placeholder="Ex. +1 1234567489">
                            </div>

                            <div class="form-group">
                                <label class="detail_inquiry_label">Message</label>
                                <textarea class="form-control detail_inquiry_input" name="message" rows="3"
                                    placeholder="Type here..." required></textarea>
                            </div>


                            <button type="submit"
                                class="btn btn-primary w-100 mt-3 mb-2 inquiry_form_btn">Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thumbnail img section End -->

    <!-- Email box Section Start -->
  
    <!-- Footer End -->

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
                            <span class="chat_time">12:45 PM</sp3an>
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
  @section('customjs')
  <script>
$(document).ready(function() {
  var starRating

  $('.rating > img').on('click', function() {
    $(this).prevAll().attr('src', "{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}");
    $(this).attr('src', "{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}");
    
    // Set other images to original one.
    $(this).nextAll().attr("src", "{{ asset('public/Buyer-HTML/assets/img/review-star_empty.png') }}");
  });
});
    </script>
    @stop