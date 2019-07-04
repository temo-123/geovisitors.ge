            @if(isset($bbogs))
            <div class="row" id='more_service'>
              @foreach($blogs as $blog)
              @if($blog -> id != $article->id)
              <article class="col-4 col-12-mobile special"> 
                <a href="{{ route('blog', array('title'=>$blog->title)) }}" class="image featured">
                  <img src="{{ asset('assets/img/blog/'.$blog->image) }}" alt="" />
                </a>
                <header>
                  <h3><a href="{{ asset('assets/img/blog/'.$blog->image) }}">{!!$blog->title!!}</a></h3>
                </header>
                <div class="central_text">
                  {!!$blog->description!!}
                </div>
              </article>
              @endif
              @endforeach
            </div>
            @endif