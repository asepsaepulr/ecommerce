<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/mimosa/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Nov 2018 02:29:39 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Aldohc Domination</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('/frontend/img/team/ahc1.png') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/meanmenu.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/nivo-slider.css') }}">
  <link href="{{asset('/frontend/css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset ('style.css') }}">  
  <link rel="stylesheet" href="{{ asset('/easyzoom/css/easyzoom.css') }}">
  <link rel="stylesheet" href="{{ asset('/frontend/css/responsive.css') }}">
  <script src="{{ asset('/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body class="home-4">
  <div class="loader"></div>

  <!-- Add your site or application content here -->
  <!-- page-wraper-start -->
  <div id="page-wraper-2">
   <!-- header-area-start -->
   @include('frontEnd.layouts.header')
   @show
   @yield('content')
   @include('frontEnd.layouts.footer')
   <!-- footer-area-end -->
 </div>



 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 <script src="{{ asset('/frontend/js/vendor/jquery-1.12.0.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery.meanmenu.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/wow.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery.nivo.slider.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery.parallax-1.1.3.js') }}"></script>
 <script src="{{ asset('/frontend/js/jquery.counterup.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/waypoints.min.js') }}"></script>
 <script src="{{ asset('/frontend/js/plugins.js') }}"></script>
 <script src="{{ asset('/frontend/js/main.js') }}"></script>
 <script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
 <script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
          var $this = $(this);

          e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
          });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
          var $this = $(this);

          if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
          } else {
            $this.text("Switch off").data("active", true);
            api2._init();
          }
        });
      </script>

      <script type="text/javascript">
        $(window).load(function() {
          $(".loader").fadeOut("slow");
        });
      </script>
    </body>

    <!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/mimosa/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Nov 2018 02:28:34 GMT -->
    </html>
