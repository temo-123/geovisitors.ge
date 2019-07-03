      <!-- Header -->
        <div id="header">

          <!-- Inner -->
          @if(isset($article))
            <div class="inner">
              <header>
                <h1>{{$article -> title}}</h1>
                <!-- <h1><a href="index.html" id="logo">Helios</a></h1> -->
              </header>
            </div>
          @endif
          
          <!-- Nav -->
            <nav id="nav">
              <ul>
                <li><a class="top_menu_text_size" href="{{ route('index')}}">Home</a></li>
                
                @if(isset($portfolio))
                <li><a href="#main" class="top_menu_text_size circled scrolly">Portfolio</a></li>
                @elseif(isset($service))
                <li><a href="#more_service" class="top_menu_text_size circled scrolly">More service</a></li>
                @endif

                @if (Auth::guest())
                    <li><a href="#reserve" class="top_menu_text_size circled scrolly">Reserve</a></li>
                @else
                    <li><a href="#" class="top_menu_text_size circled scrolly">Edit</a></li>
                @endif

              </ul>
            </nav>

        </div>