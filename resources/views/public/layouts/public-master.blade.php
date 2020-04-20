
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  {{-- <title>Flattern - Flat and trendy bootstrap site template</title> --}}
  <title>@yield('front_title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/bootstrap-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
  <link href="{{asset('public/css/jcarousel.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/flexslider.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/slitslider.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/style.css')}}" rel="stylesheet" />
  <!-- Theme skin -->
  <link id="t-colors" href="{{asset('public/skins/default.css')}}" rel="stylesheet" />
  <!-- boxed bg -->
  <link id="bodybg" href="{{asset('public/bodybg/bg1.css')}}" rel="stylesheet" type="text/css" />
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/ico/apple-touch-icon-144-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/ico/apple-touch-icon-114-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/ico/apple-touch-icon-72-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" href="{{asset('public/ico/apple-touch-icon-57-precomposed.png')}}" />
  <link rel="shortcut icon" href="{{asset('public/ico/favicon.png')}}" />

  <style>
    .pagination {
      text-align:center; 
      list-style: none; 
      padding-left: 0;
    }
  </style>
  <!-- =======================================================
    Theme Name: Flattern
    Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <div id="wrapper">

    {{-- Header--}}
    @include('public.includes.header')

    
    <!--====================== Your Page Content Here START ===================-->
                    @yield('public-content')
    <!--====================== Your Page Content Here END   ===================-->
    
    <section id="bottom">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Footer --}}
    @include('public.includes.footer')

  </div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{asset('public/js/jquery.js')}}"></script>
  <script src="{{asset('public/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('public/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/js/jcarousel/jquery.jcarousel.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('public/js/jquery.fancybox-media.js')}}"></script>
  <script src="{{asset('public/js/google-code-prettify/prettify.js')}}"></script>
  <script src="{{asset('public/js/portfolio/jquery.quicksand.js')}}"></script>
  <script src="{{asset('public/js/portfolio/setting.js')}}"></script>
  <script src="{{asset('public/js/jquery.flexslider.js')}}"></script>
  <script src="{{asset('public/js/jquery.nivo.slider.js')}}"></script>
  <script src="{{asset('public/js/modernizr.custom.js')}}"></script>
  <script src="{{asset('public/js/jquery.ba-cond.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.slitslider.js')}}"></script>
  <script src="{{asset('public/js/animate.js')}}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{asset('public/js/custom.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{asset('public/contactform/contactform.js')}}"></script>
  
</body>

</html>
