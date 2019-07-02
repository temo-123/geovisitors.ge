@extends('admin.components.admin_app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! <a href="{{route('index')}}">Back to index page</a> 
                </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-body">
                @foreach($abouts as $about)
                <a href="{{route('aboutEdit', [$about -> id])}}">Edit information about your company</a>
                @endforeach
              </div>
            </div>

            @if (session('bed_status')||session('good_status'))
              <div class="panel panel-default">
                <div class="panel-body">
                    @if(session('bed_status'))
                      <div class="alert alert-danger">
                        {{ session('bed_status') }}
                      </div>
                    @elseif(session('good_status'))
                      <div class="alert alert-success">
                        {{ session('good_status') }}
                      </div>
                    @endif
                </div>
              </div>
            @endif
        </div>
    </div>
</div>

<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#services" data-toggle="tab">Services</a></li>
        <li><a href="#tours" data-toggle="tab">Tours</a></li>
        <li><a href="#blog" data-toggle="tab">Blog</a></li>
        <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
        <li><a href="#article_gallery" data-toggle="tab">Article Gallery</a></li>
      </ul>
          
      <div class="tab-content">

          <div class="tab-pane active" id="services">
            <div class="table-responsive">
              <a style="margin: 2%;" class="btn btn-primary dropdown-toggle" href="{{route('serviceAdd')}}">Add new service</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($services as $service)
                  <tr>
                    <td>{{$service -> id}}</td>
                    <td>|</td>
                    <td>{{$service -> title}}</td>
                    <td>|</td>
                    <td>{{$service -> published}}</td>
                    <td>|</td>
                    <td class="text-right">
                      <a class="btn btn-primary dropdown-toggle" href="{{route('serviceEdit',[$service->id])}}">Edit</a>
                    </td>
                    <td class="text-right">
                      {!! Form::open(['url'=>route('serviceDestroy',[$service->id]), 'class' => 'form-horisontal', 'method' => 'POST']) !!}
                      
                      {{ method_field('DELETE') }}
                      {!! Form::button('Delete',['class'=>'btn btn-danger dropdown-toggl', 'type'=>'submit']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
            </div><!--/table-resp-->  
          </div><!--/tab-pane-->

          <div class="tab-pane" id="tours">
            <div class="table-responsive">
              <a style="margin: 2%;" class="btn btn-primary dropdown-toggle" href="{{route('tourAdd')}}">Add new tour</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($tours as $tour)
                  <tr>
                    <td>{{$tour -> id}}</td>
                    <td>|</td>
                    <td>{{$tour -> title}}</td>
                    <td>|</td>
                    <td>{{$tour -> published}}</td>
                    <td>|</td>
                    <td class="text-right">
                      <a class="btn btn-primary dropdown-toggle" href="{{route('tourEdit',[$tour->id])}}">Edit</a>
                    </td>
                    <td class="text-right">                      
                      {!! Form::open(['url'=>route('tourDestroy',[$tour->id]), 'class' => 'form-horisontal', 'method' => 'POST']) !!}
                      
                      {{ method_field('DELETE') }}
                      {!! Form::button('Delete',['class'=>'btn btn-danger dropdown-toggl', 'type'=>'submit']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="blog">
            <div class="table-responsive">
              <a style="margin: 2%;" class="btn btn-primary dropdown-toggle" href="{{route('blogAdd')}}">Add new blog</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($blogs as $blog)
                  <tr>
                    <td>{{$blog -> id}}</td>
                    <td>|</td>
                    <td>{{$blog -> title}}</td>
                    <td>|</td>
                    <td>{{$blog -> published}}</td>
                    <th>|</th>
                    <td class="text-right">
                      <a class="btn btn-primary dropdown-toggle" href="{{route('blogEdit',[$blog->id])}}">Edit</a>
                    </td>
                    <td class="text-right">
                      {!! Form::open(['url'=>route('blogDestroy',[$tour->id]), 'class' => 'form-horisontal', 'method' => 'POST']) !!}
                      
                      {{ method_field('DELETE') }}
                      {!! Form::button('Delete',['class'=>'btn btn-danger dropdown-toggl', 'type'=>'submit']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="gallery">
            <div class="table-responsive">
              <a style="margin: 2%;" class="btn btn-primary dropdown-toggle" href="{{route('galleryAdd')}}">Add new image for gallery</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($galleries as $gallery)
                  <tr>
                    <td>{{$gallery -> id}}</td>
                    <td>|</td>
                    <td><button data-toggle="modal" data-target="#Gallery{{$gallery_page_num_1++}}">{{ $gallery->title }}</button></td>
                    <td>|</td>
                    <td>{{$gallery -> published}}</td>
                    <th>|</th>
                    <td class="text-right">
                      <a class="btn btn-primary dropdown-toggle" href="{{route('galleryEdit',[$gallery->id])}}">Edit</a>
                    </td>
                    <td class="text-right">
                      {!! Form::open(['url'=>route('galleryDestroy',[$gallery->id]), 'class' => 'form-horisontal', 'method' => 'POST']) !!}
                      
                      {{ method_field('DELETE') }}
                      {!! Form::button('Delete',['class'=>'btn btn-danger dropdown-toggl', 'type'=>'submit']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="article_gallery">
            <div class="table-responsive">
              <a style="margin: 2%;" class="btn btn-primary dropdown-toggle" href="{{route('article_galleryAdd')}}">Add new image for Article</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($article_galleries as $artile_galleries)
                  <tr>
                    <td>{{$artile_galleries -> id}}</td>
                    <td>|</td>
                    <td><button data-toggle="modal" data-target="#ArticleGallery{{$article_gallery_page_num_1++}}">{{ $artile_galleries->title }}</button></td>
                    <td>|</td>
                    <td>{{$artile_galleries -> published}}</td>
                    <th>|</th>
                    <td class="text-right">
                      <a class="btn btn-primary dropdown-toggle" href="{{route('article_galleryEdit',[$artile_galleries->id])}}">Edit</a>
                    </td>
                    <td class="text-right">
                      {!! Form::open(['url'=>route('article_galleryDestroy',[$artile_galleries->id]), 'class' => 'form-horisontal', 'method' => 'POST']) !!}
                      
                      {{ method_field('DELETE') }}
                      {!! Form::button('Delete',['class'=>'btn btn-danger dropdown-toggl', 'type'=>'submit']) !!}
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

      </div><!--/tab-content-->
    </div><!--/col-9-->
  </div><!--/row-->










  @foreach($galleries as $gallery)
    <div class="modal fade" id="Gallery{{$gallery_page_num_2++}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" style='z-index: 103000000; width: 700px;'>
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>

            <h3 class="modal-title" id="lineModalLabel">{{ $gallery->title }}</h3>
          </div>

          <div class="modal-body">

            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-xs-12">
                <img class="col-sm-12 col-md-12 col-lg-12" src="{{ asset('assets/img/gallery/'. $gallery->image) }}">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <div class="col-md-6" role="group" aria-label="group button">
              <button type="button" class="close" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach  

  @foreach($article_galleries as $article_gallery)
    <div class="modal fade" id="ArticleGallery{{$article_gallery_page_num_2++}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" style='z-index: 103000000; width: 700px;'>
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>

            <h3 class="modal-title" id="lineModalLabel">{{ $article_gallery->title }}</h3>
          </div>

          <div class="modal-body">

            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-xs-12">
                <img class="col-sm-12 col-md-12 col-lg-12" src="{{ asset('assets/img/article_gallery/'. $article_gallery->image) }}">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <div class="col-md-6" role="group" aria-label="group button">
              <button type="button" class="close" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
                                                      
@endsection