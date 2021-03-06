@extends('admin.components.admin_app')
	
@section('content')

    <div class="container">
    	<div class="form-group">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @if(isset($back_btn))
    	<div class="form-group">
    		<a href="{{route($back_btn)}}" class='btn btn-primary'>Back</a>
    	</div>
    	@endif
    </div>

    <div class="container">
	
		<div class="clearfix">
			<a href="{{ URL::previous() }}" class="btn btn-danger dropdown-toggle">Go Back</a>

			<a href="{{ route('home') }}" class="btn btn-danger dropdown-toggle">Home page</a>
	    </div>

	    @if(isset($data))
        	{!! Form::open(['url'=>route($edit_form, array($data['id'])), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
	    @else
        	{!! Form::open(['url'=>route($add_form), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        @endif

		@if(isset($published))
		<div class="form-group clearfix">
    		{!! Form::label('name', 'Route:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				<select class="form-control" name="published"> 
					 
				@if (isset($data)) 
					<option value="0" @if ($data['published'] == 0) selected="" @endif>Not public</option>
					<option value="1" @if ($data['published'] == 1) selected="" @endif>Public</option>
				@else 
					<option value="0">Not public</option> 
					<option value="1">Public</option> 
				@endif 
					 
				</select>
			</div>
		</div>
		@endif

		@if(isset($article))
		<div class="form-group clearfix">
    		{!! Form::label('name', 'Route:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				<select class="form-control" name="article"> 
					 
				@if (isset($data)) 
					<option value="tours">Tours---------------------</option>
					@foreach($tours as $tour)
					<option value="{{$tour -> title}}" @if ($data['article'] == $tour -> title) selected="" @endif>{{$tour -> title}}</option>
					@endforeach
					<option value="service">Service--------------------</option>
					@foreach($services as $service)
					<option value="{{$service -> title}}" @if ($data['article'] == $service -> title) selected="" @endif>{{$service -> title}}</option>
					@endforeach
				@else 
					<option value="tours">Tours---------------------</option>
					@foreach($tours as $tour)
					<option value="{{$tour -> title}}">{{$tour -> title}}</option> 
					@endforeach
					<option value="service">Service--------------------</option>
					@foreach($services as $service)
					<option value="{{$service -> title}}">{{$service -> title}}</option> 
					@endforeach
				@endif 
					 
				</select>
			</div>
		</div>
		@endif

		@if(isset($categories))
		<div class="form-group clearfix">
    		{!! Form::label('name', 'Route:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				<select class="form-control" name="category_id"> 
					 
				@if (isset($data))
					<option value="0">Category</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}" @if ($data['category_id'] == $category->id) selected="" @endif>{{$category->title}}</option>
					@endforeach
				@else
					<option value="0">Category</option> 
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->title}}</option> 
					@endforeach
				@endif 
					 
				</select>
			</div>
		</div>
		@endif

		@if(isset($title))
	    <div class="form-group clearfix">	
    		{!! Form::label('title', 'Title:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('title', $data['title'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

		@if(isset($site_url))
	    <div class="form-group clearfix">	
    		{!! Form::label('site_url', 'Title:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('site_url', $data['site_url'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('site_url', old('site_url'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

		@if(isset($description))
	    <div class="form-group clearfix">	
    		{!! Form::label('description', 'description:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::textarea('description', $data['description'], ['id' =>'description', 'class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::textarea('description', old('description'), ['id' =>'description', 'class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

		@if(isset($text))
	    <div class="form-group clearfix">	
    		{!! Form::label('text', 'Text:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::textarea('text', $data['text'], ['id' =>'text', 'class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::textarea('text', old('text'), ['id' =>'text', 'class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

    	@if(isset($social))
    	<hr>
	    <div class="form-group clearfix">	
    		{!! Form::label('fb', 'Facebook:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('fb', $data['fb'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('fb', old('fb'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
	    <div class="form-group clearfix">	
    		{!! Form::label('inst', 'Instagram:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('inst', $data['inst'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('inst', old('inst'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
	    <div class="form-group clearfix">	
    		{!! Form::label('twit', 'Twitter:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('twit', $data['twit'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('twit', old('twit'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

		@if(isset($mail))
	    <div class="form-group clearfix">	
    		{!! Form::label('email', 'Email:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('email', $data['email'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

		@if(isset($num))
	    <div class="form-group clearfix">	
    		{!! Form::label('num', 'Phone number:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('num', $data['num'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('num', old('num'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif
		
    	@if(isset($about_service))
    	<hr>
	    <div class="form-group clearfix">	
    		{!! Form::label('about_service', 'about_service:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('about_service', $data['about_service'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('about_service', old('about_service'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

    	@if(isset($about_thure))
	    <div class="form-group clearfix">	
    		{!! Form::label('about_tour', 'about_tour:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('about_tour', $data['about_tour'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('about_tour', old('about_tour'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

    	@if(isset($about_gallery))
	    <div class="form-group clearfix">	
    		{!! Form::label('about_gallery', 'about_gallery:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('about_gallery', $data['about_gallery'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('about_gallery', old('about_gallery'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		@endif

    	@if(isset($about_blog))
	    <div class="form-group clearfix">	
    		{!! Form::label('about_blog', 'about_blog:', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
    		    @if (isset($data)) 
				    {!! Form::text('about_blog', $data['about_blog'], ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    		    @else
    				{!! Form::text('about_blog', old('about_blog'), ['class'=>'form-control', 'placeholder'=>'Page title']) !!}
    			@endif
			</div>
		</div>
		<hr>
		@endif
	
	@if(isset($image))
    	@if (isset($data))
        <div class="form-group">
			{!! Form::label('old_image', 'Old image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Html::image ('assets/img/'.$image.'/'.$data['image'],'', ['class'=>'img-circle img-responaive','width'=>'150px']) !!}

				{!! Form::hidden('old_image', $data['image']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('image', 'Add new image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
		@else
    	<div class="form-group">
			{!! Form::label('image', 'Image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
        @endif
    @endif
	
	@if(isset($header_image))
    	@if (isset($data))
        <div class="form-group">
			{!! Form::label('old_header_image', 'Old header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Html::image ('assets/img/'.$header_image.'/'.$data['header_image'],'', ['class'=>'img-circle img-responaive','width'=>'150px']) !!}

				{!! Form::hidden('old_header_image', $data['header_image']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('header_image', 'Add new header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('header_image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
		@else
    	<div class="form-group">
			{!! Form::label('header_image', 'Header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('header_image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
        @endif
    @endif
	
	@if(isset($site_image))
    	@if (isset($data))
        <div class="form-group">
			{!! Form::label('old_site_image', 'Old header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Html::image ('assets/img/'.$site_image.'/'.$data['site_image'],'', ['class'=>'img-circle img-responaive','width'=>'150px']) !!}

				{!! Form::hidden('old_site_image', $data['site_image']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('site_image', 'Add new header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('site_image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
		@else
    	<div class="form-group">
			{!! Form::label('site_image', 'Header image', ['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::file('site_image', ['class'=>'filestyle', 'data-buttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placholder'=>'No file']) !!}
			</div>
		</div>
        @endif
    @endif

	    <div class="container">
    		<div class="form-group">
    			<div class="col-xs-offset-2 col-xs-10">
    				{!! Form::button('Save', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
    			</div>
    		</div>
		</div>

    	{!! Form::close() !!}
	</div>


	<script>
		CKEDITOR.replace('text');
		CKEDITOR.replace('description');
	</script>
@endsection
