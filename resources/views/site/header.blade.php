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
              </ul>
            </nav>

        </div>