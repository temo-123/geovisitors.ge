    <div id="page-wrapper">

      <!-- Header -->
        <div id="header">
          @if(isset ($abouts) && is_object($abouts))
          <!-- Inner -->
          <div class="inner">
            @foreach($abouts as $k=>$about)
            <style type="text/css"> #header {background-image: url("{{ asset('assets/img/about/'.$about->head_image) }}");}</style>
            <header>
              <h1 class="header_title_border">
                <a href="index.html" id="logo">GeoVisitors</a></h1>
              <hr />
              <!-- <p>Thure Company</p> -->
            </header>
            @endforeach
            <footer>
              <a href="#banner" class="button circled scrolly">Start</a>
            </footer>
          </div>
          @endif

          <!-- Nav -->
          <nav id="nav">
            <ul>
              <li><a href="#banner" class="text_border top_menu_text_size circled scrolly">Services</a></li>
              <li><a href="#about" class="text_border top_menu_text_size circled scrolly">About us</a></li>
              <li><a href="#portfolio" class="text_border top_menu_text_size circled scrolly">Portfolio</a></li>
              <li><a href="#gallery" class="text_border top_menu_text_size circled scrolly">Gallery</a></li>

              @if (Auth::guest())
              @else
                  <li class="text_border"><a href="{{route('home')}}" class="circled scrolly">Admin page</a></li>
              @endif
            </ul>
          </nav>

        </div>

      <!-- Banner -->
        <section id="banner">
          <header>
            <h2>Services</h2>
            @foreach($abouts as $k=>$about)
              {!!$about->about_service!!}
            @endforeach
          </header>
        </section>

      @if(isset ($services) && is_object($services))
      <!-- Carousel -->
        <section class="carousel">
          <div class="reel">

            @foreach($services as $k=>$service)
            <article>
              <a href="{{ route('service', array('title'=>$service->title)) }}" class="image featured">
                <img src="{{ asset('assets/img/service/'.$service->image) }}" alt="" />
              </a>
              <header>
                <h3><a href="{{ route('service', array('title'=>$service->title)) }}">{{$service->title}}</a></h3>
              </header>
              <p>{{$service->description}}</p>
            </article>
            @endforeach

          </div>
        </section>
      @endif
      @if(isset ($abouts) && is_object($abouts))
      <!-- Main -->
        <div class="wrapper style2" id="about">

          @foreach($abouts as $k=>$about)
          <article id="main" class="container special">
            <a href="" class="image featured">
              <img src="{{ asset('assets/img/about/'.$about->image) }}" alt="" />
            </a>
            <header>
              <h2>About us</h2>
            </header>
            {!!$about->text!!}
          </article>
          @endforeach

        </div>
      @endif










        <section id="banner">
          <header>
            <h2>Thure</h2>
            @foreach($abouts as $k=>$about)
              {!!$about->about_thure!!}
            @endforeach
          </header>
        </section>

<div class="container">
      @foreach($tours as $tour)
        
          @if(($thurs_num) == 1)
            | (hear start)
          @elseif(($thurs_num % 3) == 0 ) 
            (hear finish) |
          @elseif(($thurs_num % 4) == 0 ) 
            | (hear start) 
          @endif

            {block}

          @if(($loop->count) == $thurs_num)
            (hear finish) |
          @endif

          <p style="display: none;">{{$thurs_num++}}</p>
      @endforeach



<!-- <div class="container">
    <div class="row text-center mb-3">
        <div class="col-md-12">
            <h2>Thure</h2>
            <p>Information about your thure.</p>
            <hr>
        </div>
    </div>-->
    <!--<div class="row text-center mb-3">
        <div class="col-md-12">
            <h2>Top Lists of Safest Car</h2>
            <p>Lorem Ipsum pagination consumpim in definiction.</p>
            <hr>
        </div>
    </div> -->
  <div class="row">
    <!-- Swiper -->
  <div class="swiper-container">
<div class="swiper-wrapper">





     <!--  <div class="swiper-slide">
          <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
      </div>
      <div class="swiper-slide">
          <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
      </div>
      <div class="swiper-slide">
          <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
      </div>
    </div> -->
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
  </div>

  </div>
</div></div>



















      @if(isset ($galleries) && is_object($galleries))
      <!-- Gallery -->
        <div class="wrapper style1" id="gallery">

          <section id="features" class="container special">

            <header>
              <h2>Gallery</h2>
              @foreach($abouts as $k=>$about)
                {!!$about->about_gallery!!}
              @endforeach
            </header>

            <div class="gallery">
              @foreach($galleries as $k=>$gallery)
              <figure>
                <img src="{{ asset('assets/img/gallery/'.$gallery->image) }}" alt="" />
                <figcaption>{{$gallery->title}}</figcaption>
              </figure>
              @endforeach
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
              <symbol id="close" viewBox="0 0 18 18">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
                  S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
                  l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
                  c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
                  s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
              </symbol>
            </svg>

          </section>

        </div>
      @endif

      @if(isset ($blogs) && is_object($blogs))
      <!-- Features -->
        <div class="wrapper style1" id="portfolio">

          <section id="features" class="container special">
            <header>
              <h2>Blog</h2>
              @foreach($abouts as $k=>$about)
                {!!$about->about_portfolio!!}
              @endforeach
            </header>
            <div class="row">
              @foreach($blogs as $k=>$blog)
              <article class="col-3 col-12-mobile special">
                <a href="{{ route('blog', array('title'=>$blog->title)) }}" class="image featured">
                  <img src="{{ asset('assets/img/blog/'.$blog->image) }}" alt="" />
                </a>
                <header>
                  <h3><a href="#">{{$blog->title}}</a></h3>
                </header>
                {{$blog->description}}
              </article>
              @endforeach
            </div>
          </section>

        </div>
      @endif





      @include('layouts.footer')

    </div>
