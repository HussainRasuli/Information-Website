


@extends('website.layout.website_master_page')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
    .error_message{
        color:red;
    }
</style>

    <div class="banner-area contact"@foreach($cover_image as $image) style="background: url('{{ url('/storage/app/CoverImage/'.$image->path) }}');position: relative;background-size: cover;background-repeat: no-repeat;z-index: 1;" @endforeach>
    <div class="d-table">
    <div class="d-table-cell">
    <div class="container">
    <div class="page-title-content">
    <h2>Contact Us</h2>
    <ul>
    <li>
    <a href="{{ route('/') }}"> Home </a>
    <i class="flaticon-fast-forward"></i>
    <p class="active"> Contact Us </p>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>

<section class="home-contact-area pb-100">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-lg-4 ps-0">
</div>
<div class="col-lg-6" style="margin-top: 3rem;">
<div class="home-contact-content">
<h2 class="text-center">Contact Form</h2>
@if(Session::has('message_sent'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message_sent')}}
        </div>
    @endif
<form method="post" action="{{ route('sendEmail') }}">
    @csrf
    @foreach($contact_form as $text)
       <p><span style="color:red;">*</span> {{$text->contact_form_text}}</p>
    @endforeach
    <div class="row">
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<input type="text" name="name" id="name" class="form-control name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name" />
       <h6 class="contact-name-error error_message">Write your name.</h6>
</div>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<input type="email" name="email" id="email" class="form-control email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" />
        <h6 class="contact-email-error error_message">Write your email.</h6>
<div class="help-block with-errors"></div>
</div>
</div>
 <div class="col-lg-6 col-sm-6">
<div class="form-group">
<input type="number" name="phone_number" id="phone_number" class="form-control phone" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus placeholder="Phone Number" />
         <h6 class="contact-phone-error error_message">Write your phone number.</h6>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<input type="text" name="subject" id="msg_subject" class="form-control subject" value="{{ old('subject') }}" autocomplete="subject" autofocus placeholder="Subject" />
          <h6 class="contact-subject-error error_message">Write your subject.</h6>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<textarea name="message" class="form-control message" id="message" cols="30" rows="5" placeholder="Your Message">{{ old('message') }}</textarea>
           <h6 class="contact-message-error error_message">Write your message.</h6>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-12 col-sm-6">
 <div class="form-group">
     <div class="col-md-6 offset-md-0">
         <div class="g-recaptcha" data-sitekey="6LfM82QfAAAAAO4DHOw7s5T97vV_9HIo_42PuFmz"></div>
        
     </div>
 </div>
    @error('g-recaptcha-response')
        <h6 class="error_message">{{ $message }}</h6>
    @enderror
</div>

<div class="col-lg-12 col-md-12">

<button type="submit" class="box-btn submit_btn">Send Message</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
@section('website_script')
<script src="{{asset('public/website/assets/js/validation/contact_form_validation.js')}}"></script>
@endsection

@endsection