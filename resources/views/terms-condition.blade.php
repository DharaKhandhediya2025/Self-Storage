@extends('headerfooter')@section('title','Terms & Conditions')

@section('content')
    <!-- Banner Section Start -->
    <section class="contact_banner_section term_banner_section">
        <div class="container"><h2>Terms and conditions</h2>
        </div>
    </section>
    <!-- Banner Section End -->
    
    <!-- Term & Condition Section Start -->
    <section class="term_section">
        <div class="container-fluid">
            @if(isset($terms_condition) && $terms_condition != '')
                {!! $terms_condition->description !!}
            @endif
        </div>
    </section>
    <!-- Term & Condition Section End -->
@endsection