<!-- Footer -->
        <div id="footer">
          <div class="container">
            <div class="row">

              <!-- Tweets -->
                <section class="col-4 col-12-mobile">
                  <header>
                    <h2 class="icon fas fa-paw circled"></h2>
                    <h3>Service</h3>
                  </header>
                  <ul class="divided">
                    @foreach($service_all_page as $service)
                    <li>
                      <article class="post stub">
                        <header>
                          <h4><a href="#">{{$service -> title}}</a></h4>
                        </header>
                        <span class="timestamp">{{$service->created_at->diffForHumans()}}</span>
                      </article>
                    </li>
                    @endforeach
                  </ul>
                </section>

              <!-- Posts -->
                <section class="col-4 col-12-mobile">
                  <header>
                    <h2 class="icon fa-file circled"></h2>
                    <h3>Blog</h3>
                  </header>
                  <ul class="divided">
                    @foreach($blog_all_page as $portfolio)
                    <li>
                      <article class="post stub">
                        <header>
                          <h4><a href="#">{{$portfolio -> title}}</a></h4>
                        </header>
                        <span class="timestamp">{{$portfolio->created_at->diffForHumans()}}</span>
                      </article>
                    </li>
                    @endforeach
                  </ul>
                </section>

              <!-- Photos -->
                <section class="col-4 col-12-mobile">
                  <header>
                    <h2 class="icon fa-camera circled"></h2>
                    <h3>Gallery</h3>
                  </header>
                  <div class="row gtr-25">
                    @foreach($gallery_all_page as $gallery)
                    <div class="col-6">
                        <a href="{{ asset('assets/img/gallery/'.$gallery->image) }}" class="fancybox image fit" rel="ligthbox">
                            <img  src="{{ asset('assets/img/gallery/'.$gallery->image) }}" class="footer_zoom" alt="">
                        </a>
                    </div>
                    @endforeach
                  </div>
                </section>

            </div>
            <!-- <hr /> -->
            <div class="row">
              <div class="col-12">

                <!-- Contact -->
                  <section class="contact">
                    <ul class="icons">
                    @foreach($about_all_page as $about)
                      @if($about->fb != NULL)
                      <li><a href="{{$about->fb}}" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                      @endif
                      @if($about->inst != NULL)
                      <li><a href="{{$about->inst}}" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                      @endif
                      @if($about->twit != NULL)
                      <li><a href="{{$about->twit}}" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      @endif
                    @endforeach
                    </ul>
                  </section>

                <!-- Copyright -->
                  <div class="copyright">
                    <ul class="menu">
                      <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                  </div>

              </div>

            </div>
          </div>
        </div>