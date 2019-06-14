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
                    Edit information about your company
                </div>
            </div>
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
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($services as $service)
                  <tr>
                    <td>{{$service -> id}}</td>
                    <td>|</td>
                    <td>{{$service -> title}}</td>
                    <td>|</td>
                    <td>{{$service -> id}}</td>
                    <td>|</td>
                    <td>Edit</td>
                    <td>dell</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
            </div><!--/table-resp-->  
          </div><!--/tab-pane-->

          <div class="tab-pane" id="tours">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($tours as $tour)
                  <tr>
                    <td>{{$tour -> id}}</td>
                    <td>|</td>
                    <td>{{$tour -> title}}</td>
                    <td>|</td>
                    <td>{{$tour -> id}}</td>
                    <td>|</td>
                    <td>Edit</td>
                    <td>dell</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="blog">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($blogs as $blog)
                  <tr>
                    <td>{{$blog -> id}}</td>
                    <td>|</td>
                    <td>{{$blog -> title}}</td>
                    <td>|</td>
                    <th>Public</th>
                    <th>|</th>
                    <td>Edit</td>
                    <td>dell</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="gallery">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($galleries as $gallery)
                  <tr>
                    <td>{{$gallery -> id}}</td>
                    <td>|</td>
                    <td><button data-toggle="modal" data-target="#Gallery{{$gallery_page_num_1++}}">{{ $gallery->title }}</button></td>
                    <td>|</td>
                    <th>Public</th>
                    <th>|</th>
                    <td>Edit</td>
                    <td>dell</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!--/tab-pane-->
          </div><!--/tab-pane-->

          <div class="tab-pane" id="article_gallery">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>|</th>
                    <th>Name</th>
                    <th>|</th>
                    <th>Public</th>
                    <th>|</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach($artile_galleries as $artile_galleries)
                  <tr>
                    <td>{{$artile_galleries -> id}}</td>
                    <td>|</td>
                    <td><button data-toggle="modal" data-target="#ArticleGallery{{$article_gallery_page_num_1++}}">{{ $artile_galleries->title }}</button></td>
                    <td>|</td>
                    <th>Public</th>
                    <th>|</th>
                    <td>Edit</td>
                    <td>dell</td>
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
                                                      
@endsection