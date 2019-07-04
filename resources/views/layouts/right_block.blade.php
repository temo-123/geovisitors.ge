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
                    <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-danger btn-block btn-sm">
                      Send message
                    </button>
                  </div>
                </section>
                <hr />
                <section>
                  <header>
                    <h3>Tours</h3>
                  </header>
                  @foreach($about_all_page as $about)
                    <p>{{$about -> about_tour}}</p>
                  @endforeach
                  <div class="row gtr-50">                   
                    @foreach($tours as $tour)
                    @if($tour->category_id == $article -> id)
                    <div class="col-4">
                      <a href="{{route('tour', [$tour->id])}}" class="image fit">
                        <img src="{{ asset('assets/img/tour/'.$tour->image) }}" alt="" />
                      </a>
                    </div>
                    <div class="col-8">
                      <a href="{{route('tour', [$tour->title])}}">
                      <h4>{{$tour -> title}}</h4>
                      </a>
                      <p>
                        Amet nullam fringilla nibh nulla convallis tique ante proin.
                      </p>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </section>
              </div>










