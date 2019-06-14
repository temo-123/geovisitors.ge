      <!-- Header -->
        <div id="header">

          <!-- Inner -->
          @if(isset($article))
            <div class="inner">
              <header>
                <h1 class="header_title_border">{{$article -> title}}</h1>
                <!-- <h1><a href="index.html" id="logo">Helios</a></h1> -->
              </header>
            </div>
          @endif
          
          <!-- Nav -->
            <nav id="nav">
              <ul>
                <li><a href="{{ route('index')}}">Home</a></li>
                
                @if(isset($portfolio))
                <li><a href="#main" class="circled scrolly">Portfolio</a></li>
                @elseif(isset($service))
                <li><a href="#more_service" class="circled scrolly">More service</a></li>
                @endif

                @if (Auth::guest())
                    <li><a href="#reserve" class="circled scrolly">Reserve</a></li>
                @else
                    <li><a href="#" class="circled scrolly">Edit</a></li>
                @endif

              </ul>
            </nav>

        </div>