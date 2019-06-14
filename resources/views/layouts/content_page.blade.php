<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- Main -->
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
                        background-image: url( "{{ asset('assets/img/service/'.$article->image) }}");
                      }
                    </style>
                    <img src="{{ asset('assets/img/service/'.$article->image) }}" alt="" />
                    @endif
                  </div>
                  <section>
                    {{$article -> text}}
                  </section>
                </article>

              <div class="center" id="reserve">
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">
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
    <!-- line modal -->
    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h3 class="modal-title" id="lineModalLabel">My Modal</h3>
        </div>
        <div class="modal-body">
          
                <!-- content goes here -->
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" id="exampleInputFile">
              <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>

        </div>
        <div class="modal-footer">
          <div class="btn-group btn-group-justified" role="group" aria-label="group button">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
            </div>
            <div class="btn-group btn-delete hidden" role="group">
              <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    @endif

