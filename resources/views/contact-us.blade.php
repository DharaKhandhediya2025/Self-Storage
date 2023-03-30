@extends('headerfooter')@section('title','Contact Us')

@section('css')
    <style>
        .error{
            color:#f56954 !important;
            border-color:#f56954 !important;
        }
    </style>
@endsection

@section('content')
     <!-- Banner Section Start -->
    <section class="contact_banner_section">
        <div class="container"><h2>Contact Us</h2></div>
    </section>
    <!-- Banner Section End -->
    <!-- Contact Section Start -->
    <section class="contact_section">
        <div class="container">
            <div class="contact_box">

                @if (session()->has('message')) 
                    <div class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        </button>{{ session('message') }} 
                    </div>
                @endif

                @if (session()->has('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{{ session('error') }} 
                    </div>
                @endif

                <form id="contact_form" autocomplete="off" action="{{ url('/contact-inquiry') }}" method="POST" onsubmit="disabledButton();" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name *" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" id="email" name="email" class="form-control contact_input" placeholder="Email Address *" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" class="form-control contact_input" placeholder="Subject *" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control contact_input" id="message" name="message" rows="5" placeholder="Message *" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn contact_submit_btn">Submit Message</button>
                        <!-- <a href="#" class="btn contact_submit_btn">Submit Messages</a> -->
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection