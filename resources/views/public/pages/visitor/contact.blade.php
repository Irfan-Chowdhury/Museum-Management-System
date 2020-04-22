@extends('public.layouts.public-master')

@section('front_title','Contact')

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Get in touch</strong></h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li>Contact<i class="active d-inlineicon-angle-right"></i></li>
            </ul>
        </div>
        </div>
    </div>
</section>


<section id="content">    
    <div class="container">
    
    <!-- Session Message Check --> 
    @if (session()->has('success'))    
      <div  style="margin-bottom:50px; margin-left:30%"> 
          <h6><strong style="color:green">{{ session('message') }}</strong></h6>
      </div>
    @endif

    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.860268773474!2d91.80785981443019!3d22.358904346416335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8ed7949c335%3A0x77d2c2464c1bd6d9!2sPort%20City%20International%20University!5e0!3m2!1sen!2sbd!4v1587314610291!5m2!1sen!2sbd" width="1165" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
    <iframe src="{{$museum->map}}" width="1165" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      
    <div class="row" style="margin-top:50px">
        <div class="span12">
            <div class="row">
                <div class="span8">
                    <h4>Get in touch with us by filling <strong>contact form below</strong></h4>
                </div>
            </div>

          <form action="{{route('message-visitor-save')}}" method="POST" role="form" class="contactForm">
            @csrf
            
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>

            <div class="row">
              
              <!--Loggin Check Start-->  
              @if (Auth::check()==false) 
                <div class="span4 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                  @error('name')
                      <span style="color:red">{{ $message }}</span><br>
                  @enderror
                </div>
                <div class="span4 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                  @error('email')
                      <span style="color:red">{{ $message }}</span><br>
                  @enderror
                </div>
              @endif
              <!--Loggin Check End --> 

              <div class="span4 form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                @error('subject')
                    <span style="color:red">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="span12 margintop10 form-group">
                <textarea class="form-control" name="message" rows="12" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                @error('message')
                    <span style="color:red">{{ $message }}</span><br>
                @enderror
                <p class="text-center">
                  <button class="btn btn-large btn-theme margintop10" type="submit">Submit message</button>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection