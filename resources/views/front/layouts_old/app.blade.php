<!DOCTYPE html>
<html lang="en" style="padding: 0px 15px 0px 15px !important; background-color:rgba(71, 71, 71, 0.171); shadow:5px;">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classimax</title>
  
  <!-- FAVICON -->
  <link href="{{asset('front/img/favicon.png')}}" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('front/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('front/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('front/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('front/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('front/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{asset('front/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('front/css/style.css')}}" rel="stylesheet">


</head>

<body class="body-wrapper">

<!--===============================-->
            {{-- Header Area  --}} 
            @include('front.layouts.header')
            {{--end Header Area  --}} 
			@yield('content')


@include('front.layouts.footer')
@yield('custom-js')

<!-- JAVASCRIPTS -->
<script src="{{asset('front/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('front/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('front/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
  <!-- tether js -->
<script src="{{asset('front/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('front/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('front/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('front/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('front/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('front/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{asset('front/plugins/google-map/gmap.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>

</body>

</html>

