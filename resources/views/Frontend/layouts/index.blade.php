<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>{{$meta_title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--seo-->
    <meta name="description" content="{{$meta_desc}}" />
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="canonical" href="{{$url_canonical}}"/>
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    <!--seo-->
    
    <meta property="og:site_name" content="https://1998coffee.xyz" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />

    
    <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Josefin+Sans:400,700')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Great+Vibes')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/magnific-popup2.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('public/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style2.css')}}">

    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">

    <link rel="stylesheet" href="{{asset('public/css/fontawesome/css/all.css')}}">

    <!-- /css files -->
     
    
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.1/jquery.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- online fonts -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Sirin+Stencil')}}" rel="stylesheet">
    <!-- online fonts -->

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
  	@include('Frontend.layouts.header')

	    @yield('content')
	    @yield('script')
	    
    @include('Frontend.layouts.footer')
    @include('sweet::alert')



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/js/aos.js')}}"></script>
    <script src="{{asset('public/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('public/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('public/js/scrollax.min.js')}}"></script>
    <script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
    <script src="{{asset('public/js/google-map.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=703512923548326&autoLogAppEvents=1" nonce="LDSjA7yC"></script>
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="100328688293467"
  theme_color="#6699cc"
  logged_in_greeting="Hi! How can we help you?"
  logged_out_greeting="Hi! How can we help you?">
      </div>

  </body>
</html>