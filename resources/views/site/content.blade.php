    <div id="page-wrapper">

      <!-- Header -->
        <div id="header">
          @if(isset ($abouts) && is_object($abouts))
          <!-- Inner -->
            @foreach($abouts as $k=>$about)
            <style type="text/css"> 
            #header {
              /*background-image: url("{{ asset('assets/img/about/header_image/'.$about->header_image) }}");*/
              /*filter: brightness(50%);*/
              background-image: linear-gradient(
                                  rgba(0,0,0,0.65),
                                  rgba(0,0,0,0.65)
                          ),
                          url('{{ asset('assets/img/about/header_image/'.$about->header_image) }}');
            }
            </style>
          <div class="inner">
            <header>
              <h1>
                <a href="#banner" id="logo" class="scrolly">GeoVisitors</a></h1>
              <hr />
              {!!$about->description!!}
            </header>
            <footer>
              <a href="#banner" class="button circled scrolly">Start</a>
            </footer>
          </div>
            @endforeach
          @endif

          <!-- Nav -->
          <nav id="nav">
            <ul>
              <li><a href="#banner" class="top_menu_text_size circled scrolly">Services</a></li>
              <li><a href="#about" class="top_menu_text_size circled scrolly">About us</a></li>
              <li><a href="#portfolio" class="top_menu_text_size circled scrolly">Portfolio</a></li>
              <li><a href="#gallery" class="top_menu_text_size circled scrolly">Gallery</a></li>

              @if (Auth::guest())
              @else
                  <li><a href="{{route('home')}}" class="top_menu_text_size circled scrolly">Admin page</a></li>
              @endif
            </ul>
          </nav>

        </div>

      @if($services != NULL)
      <!-- Banner -->
        <section id="banner">
          <header>
            <h2>Services</h2>
            @foreach($abouts as $k=>$about)
              <p>{!!$about->about_service!!}</p>
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
              <p>{!!$service->description!!}</p>
            </article>
            @endforeach

          </div>
        </section>
      @endif
      @endif

      @if(isset ($abouts) && is_object($abouts))
      <!-- Main -->
        <div class="wrapper style2" id="about">

          @foreach($abouts as $k=>$about)
          <article id="main" class="container special">
            <header>
              <h2>About us</h2>
            </header>
            <!-- <a href="" class="image featured"> -->
              <img style="margin-bottom: 1%;" src="{{ asset('assets/img/about/'.$about->image) }}" alt="" />
            <!-- </a> -->
            {!!$about->text!!}
            <hr>
            <div class="row">
              <div class="col-md-6"><h4>{!!$about->email!!}</h4></div>
              <div class="col-md-6"><h4>{!!$about->num!!}</h4></div>
            </div>
            <hr>
            <div class="center" id="reserve">
              <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger btn-block btn-sm">
                Send message
              </button>
            </div>
          </article>
          @endforeach

        </div>
      @endif


      <!-- Touts -->
        <section id="banner">
          <header>
            <h2>Thure</h2>
            @foreach($abouts as $k=>$about)
              <p>{!!$about->about_tour!!}</p>
            @endforeach
          </header>
        </section>

        <div class="container">     
          <div class="row">
          <!-- Swiper -->
            <div class="swiper-container">
              <div class="swiper-wrapper">

              @foreach($tours as $tour)

              <p style="display: none;">{{$thurs_num++}}</p>

              @if(($thurs_num) == 1)

              <div class="swiper-slide">
                <div class="row">
              @endif
                  <div class="col-md-3 col-xs-6">
                    <div class="card">
                      <div class="card-img">
                        <img src="{{ asset('assets/img/tour/'.$tour->image) }}">
                      </div>
                      <div class="card-body">
                        <h2>{{$tour -> title}}</h2>
                        <div class="central_text">
                        {!!$tour -> description!!}
                        </div>
                        <a type= "button" class="btn btn-danger btn-block btn-sm" href="{{route('tour', [$tour -> title])}}">Read more</a>
                      </div>
                    </div>
                  </div>
              @if(($thurs_num % 4) == 0 ) 
                </div>
              </div>

              <div class="swiper-slide">
                <div class="row">
              @endif
              @if(($loop->count) == $thurs_num)
                </div>
              </div>
              @endif
              @endforeach
            </div>
              <!-- Add Pagination -->

              <div class="swiper-pagination"></div>
              <!-- Add Arrows -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>

              </div>
            </div>
          </div>
        </div>


      @if(isset ($galleries) && is_object($galleries))
      <!-- Gallery -->
        <div class="wrapper style1" id="gallery">

          <section id="features" class="container special">

            <header>
              <h2>Gallery</h2>
              @foreach($abouts as $k=>$about)
                <p>{!!$about->about_gallery!!}</p>
              @endforeach
            </header>

            <div class="container page-top">
              <div class="row">
                  @foreach($galleries as $gallery)
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                      <a href="{{ asset('assets/img/gallery/'.$gallery->image) }}" class="fancybox" rel="ligthbox">
                          <img  src="{{ asset('assets/img/gallery/'.$gallery->image) }}" class="zoom img-fluid "  alt="">
                      </a>
                  </div>
                  @endforeach
              </div>
          </div>

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
                <p>{!!$about->about_blog!!}</p>
              @endforeach
            </header>
            <div class="row">
              @foreach($blogs as $k=>$blog)
              <article class="col-md-3 col-xs-6">
                <a href="{{ route('blog', array('title'=>$blog->title)) }}" class="image featured">
                  <img src="{{ asset('assets/img/blog/'.$blog->image) }}" alt="" />
                </a>
                <header class="central_text">
                  <h3><a href="#">{{$blog->title}}</a></h3>
                </header>
                <div class="central_text">
                  {!!$blog->description!!}
                </div>
              </article>
              @endforeach
            </div>
          </section>

        </div>
      @endif

      @include('layouts.footer')

      @include('layouts.message_form')

    </div>
