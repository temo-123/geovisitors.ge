<!-- Page Content -->
@if(isset($article_galleries))
    <div class="container page-top">
        <div class="row">
            @foreach($article_galleries as $article_gallery)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{ asset('assets/img/article_gallery/'.$article_gallery->image) }}" class="fancybox" rel="ligthbox">
                    <img  src="{{ asset('assets/img/article_gallery/'.$article_gallery->image) }}" class="zoom img-fluid "  alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endif