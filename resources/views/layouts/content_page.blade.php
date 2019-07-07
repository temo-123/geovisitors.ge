    @if(isset($service))
        <div class="wrapper style1">

          <div class="container">
            <div class="row gtr-200">
              <div class="col-8 col-12-mobile" id="content">
                <article id="main">
                  <!--<header>-->
                    <!-- <h2><a href="#">{{$article -> title}}</a></h2> -->
                    <!--<h2>{{$article -> title}}</h2>-->
                  <!--</header>-->
                  <div class="image featured">
                    @if(isset($service))
                    <style type="text/css">
                      #header {
                        /*background-image: url( "{{ asset('assets/img/service/'.$article->image) }}");*/
                        background-image: linear-gradient(
                                  rgba(0,0,0,0.65),
                                  rgba(0,0,0,0.65)
                          ),
                          url('{{ asset('assets/img/service/'.$article->image) }}');
                      }
                    </style>
                    <!-- <img src="{{ asset('assets/img/service/'.$article->image) }}" alt="" /> -->
                    @endif
                  </div>
                  <section>
                    {!!$article -> text!!}
                  </section>
                </article>
                <hr>
                <div class="center" id="reserve">
                  <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger btn-block btn-sm">
                    Reserve now
                  </button>
                </div>
              </div>

              @include('layouts.right_block')

            </div>
              @include('layouts.article_gallery')
            <hr />

            <!-- @include('layouts.footer_articles') -->

                <a class="btn btn-primary dropdown-toggle" style="margin: 5%;" href="{{route('index')}}">Back to index page</a>
            </div>

          </div>
          @include('layouts.footer')
          </div>
        </div>
      @elseif(isset($blog))
        <div class="wrapper style1">
          <div class="container">
            <article id="main" class="special">
              <a href="#" class="image featured">
                    <style type="text/css">
                      #header {
                        /*background-image: url( "{{ asset('assets/img/blog/'.$article->image) }}");*/
                        background-image: linear-gradient(
                                  rgba(0,0,0,0.65),
                                  rgba(0,0,0,0.65)
                          ),
                          url('{{ asset('assets/img/blog/'.$article->image) }}');
                      }
                      }
                    </style>
                <!-- <img src="{{ asset('assets/img/blog/'.$article->image) }}" alt="" /> -->
              </a>
              {!!$article->text!!}
            </article>
            <hr />

            @include('layouts.footer_articles')
            
            <a class="btn btn-primary dropdown-toggle" href="{{route('index')}}">Back to index page</a>

          </div>
        </div>
      @include('layouts.footer')


      @elseif(isset($tour))
        <div class="wrapper style1">

          <div class="container">
            <article id="main" class="special">
              <a href="#" class="image featured">
                    <style type="text/css">
                      #header {
                        /*background-image: url( "{{ asset('assets/img/tour/'.$article->image) }}");*/
                        background-image: linear-gradient(
                                  rgba(0,0,0,0.65),
                                  rgba(0,0,0,0.65)
                          ),
                          url('{{ asset('assets/img/tour/'.$article->image) }}');
                      }
                      }
                    </style>
                <img src="{{ asset('assets/img/blog/'.$article->image) }}" alt="" />
              </a>
              {!!$article->text!!}
            </article>
            <hr />

                <div class="center" id="reserve">
                  <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger btn-block btn-sm">
                    Reserve now
                  </button>
                </div>

              @include('layouts.article_gallery')

                <a class="btn btn-primary dropdown-toggle" href="{{route('index')}}">Back to index page</a>
          </div>
        </div>
      @include('layouts.footer')

      @endif

    @if(isset($service)||isset($tour))
      @include('layouts.message_form')
    @endif

