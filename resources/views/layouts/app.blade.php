<!DOCTYPE HTML>
<html>
  <head> 
    @if(isset($article))
    <title>{{$article -> title}}</title>

    <meta property="og:title"           content="{{$article -> title}}"/>
    <meta property="og:description"     content="{!!$article -> description!!}"/>
    <meta name="keywords"               content="">

    @if(isset($service))
    <meta property="og:image"           content="{{asset('assets/img/service/'.$article -> image)}}">
    @elseif(isset($tour))
    <meta property="og:image"           content="{{asset('assets/img/tour/'.$article -> image)}}">
    @elseif(isset($blog))
    <meta property="og:image"           content="{{asset('assets/img/blog/'.$article -> image)}}">
    @endif

    <meta property="og:type"            content="website"/>
    <meta property="og:url"             content="{{$article -> site_name}}" />
    @else
    @foreach($about_all_page as $about)  
    <title>{{$about -> title}}</title>

    <meta property="og:title"           content="{{$about -> title}}"/>
    <meta property="og:description"     content="{!!$about -> description!!}"/>
    <meta name="keywords"               content="">
    <meta property="og:image"           content="{{asset('assets/img/about/'.$about -> image)}}">
    <meta property="og:type"            content="website"/>
    @endforeach
    @endif

    @foreach($about_all_page as $about)
    <meta property="og:url"             content="{{$about -> site_url}}" />
    @endforeach

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <!-- for send message -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- For thure-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    <!-- ./ -->

    <!-- For article gallery -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}" />
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
      <!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
      <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
      <script src="{{ asset('assets/js/browser.min.js') }}"></script>
      <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
      <script src="{{ asset('assets/js/util.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      
      <script src="{{ asset('assets/js/gallery.js') }}"></script>
      <!-- <script src="{{ asset('assets/js/article_gallery.js') }}"></script> -->

  </body>
</html>