    @if(isset($service))
        <div class="wrapper style1">

          <div class="container">
            <div class="row gtr-200">
              <div class="col-8 col-12-mobile" id="content">
                <article id="main">
                  <header>
                    <!-- <h2><a href="#">{{$article -> title}}</a></h2> -->
                    <h2>{{$article -> title}}</h2>
                  </header>
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
                    <img src="{{ asset('assets/img/service/'.$article->image) }}" alt="" />
                    @endif
                  </div>
                  <section>
                    {!!$article -> text!!}
                  </section>
                </article>
                <hr>
                <div class="center" id="reserve">
                  <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary">
                    Reserve now
                  </button>
                </div>

              </div>

              @include('layouts.right_block')

            </div>
            <hr />

            @include('layouts.footer_articles')

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
                        background-image: url( "{{ asset('assets/img/blog/'.$article->image) }}");
                      }
                    </style>
                <!-- <img src="{{ asset('assets/img/blog/'.$article->image) }}" alt="" /> -->
              </a>
              {!!$article->text!!}
            </article>
            <hr />

            @include('layouts.footer_articles')

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
                        background-image: url( "{{ asset('assets/img/tour/'.$article->image) }}");
                      }
                    </style>
                <img src="{{ asset('assets/img/blog/'.$article->image) }}" alt="" />
              </a>
              {!!$article->text!!}
            </article>
            <hr />

            @include('layouts.footer_articles')

          </div>

        </div>

      @include('layouts.footer')

      @endif

    @if(isset($service))
      @include('layouts.message_form')
    @endif

