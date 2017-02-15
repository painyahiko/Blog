@extends('home_layout')

@section('content')

	<div class="panel panel-primary col-md-10">
	<h3 class="panel-heading text-center">Bienvenido a PainyaBlog</h3>
	<hr/>
	<div class="col-md-offset-3">
	{!! Form::open(['route' => 'home', 'method' => 'GET', 'class' => 'navbar-form navbar-left']) !!}
    
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nombre del post']) !!}
    {!! Form::select('rol_id', array(
    '' => 'Roles',
    '1' => 'Registrado',
    '2' => 'Editor',
    '3' => 'Autor',
    '4' => 'Admin'
    ),null,['class' => 'form-control'])!!}

   <select class="form-control" name="category_id" id="category_id">
    <option value="">categorias</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
    </div>
	<div class="col-md-offset-3 col-xs-7">
	<hr/>

	@foreach ($posts as $post)

	<h2>{{$post->title}}</h2>
	<a href="{{ url($post->url) }}"><img style="width:500px;" src="{{ url(config('upload.imagesurl') . $post->imagen) }}"></a>
	<br/>
	
	@foreach($categories as $category)
	@if($post->categories->contains('id',$category->id))
	
	<a class="btn-xs btn-primary" href="{{'?category_id=' . $category->id}}">{{$category->name}}</a>
	
	@endif
	@endforeach

	<h3 class="text-capitalize" style="word-wrap: break-word">{{str_limit($post->content , 150)}}</h3>

	<a href="{{ url($post->url) }}" class="lead">Leer Más</a>

	<hr/>

	@endforeach

	 {!! $posts->appends(Request::only(['title','rol_id','category_id']))->render() !!}

	</div>
	</div>

@endsection

@section('tagplace')

@foreach($categories as $category)

<a class="btn btn-primary" href="{{'?category_id=' . $category->id}}">{{$category->name}}</a>
</br>

@endforeach


@endsection