@extends('headerfooter')@section('title','Contact Us')

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
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" placeholder="Your Name *">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control contact_input" placeholder="Email Address *">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control contact_input" placeholder="Subject *">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control contact_input" rows="5" placeholder="Messages *"></textarea>
                    </div>
                    <div class="text-right">
                        <!-- <button type="submit" class="btn contact_submit_btn">Submit Messages</button> -->
                        <a href="#" class="btn contact_submit_btn">Submit Messages</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection