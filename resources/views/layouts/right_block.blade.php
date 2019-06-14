              <div class="col-4 col-12-mobile" id="sidebar">
                <hr class="first" />
                <section>
                  <header>
                    <h3>Reserve now</h3>
                  </header>
                  <p>
                    Reserve a {{$article -> title}} now
                  </p>

                  <div class="center" id="reserve">
                    <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">
                      Reserve
                    </button>
                  </div>
                </section>
                <hr />
@if(isset($portfolio_count))
                @if($portfolio_count>0)
                <section>
                  <header>
                    <h3><a href="#">Sed lorem etiam consequat</a></h3>
                  </header>
                  <p>
                    Tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
                  </p>
                  <div class="row gtr-50">
                    @foreach($portfolios as $portfolio)
                    <div class="col-4">
                      <a href="#" class="image fit">
                        <img src="{{ asset('assets/img/portfolio/'.$portfolio->image) }}" alt="" />
                      </a>
                    </div>
                    <div class="col-8">
                      <h4>{{$portfolio -> title}}</h4>
                      <p>
                        Amet nullam fringilla nibh nulla convallis tique ante proin.
                      </p>
                    </div>
                    @endforeach
                  </div>
                </section>
                @endif
                @endif
              </div>