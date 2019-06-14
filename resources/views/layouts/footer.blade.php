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
                    <h3>Portfolio</h3>
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
                      <a href="#" class="image fit">
                        <img src="{{ asset('assets/img/gallery/'.$gallery->image) }}" alt="" />
                      </a>
                    </div>
                    @endforeach
                  </div>
                </section>

            </div>
            <hr />
            <div class="row">
              <div class="col-12">

                <!-- Contact -->
                  <section class="contact">
                    <header>
                      <h3>Nisl turpis nascetur interdum?</h3>
                    </header>
                    <p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
                    <ul class="icons">
                      <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                      <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                      <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                      <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                      <li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
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