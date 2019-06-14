<!DOCTYPE HTML>
<html>
  <head>
    <title>Helios by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <!-- for send message -->

    <!-- For thure -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    <!-- ./ -->
    
  </head>
<!--Header_section-->
<!-- <header id="header_wrapper"> -->
  @if(isset($index))
  <body class="homepage is-preload">
  @else
  <body class="right-sidebar is-preload">
  @yield ('header')
  @endif
<!-- </header> -->
<!--Header_section--> 

<!--Hero_Section-->
  @yield ('content')


    <!-- Scripts -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
      <script src="{{ asset('assets/js/browser.min.js') }}"></script>
      <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
      <script src="{{ asset('assets/js/util.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      <script src="{{ asset('assets/js/gallery.js') }}"></script>

  </body>
</html>