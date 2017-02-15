@extends('layout')

@section('content')

	<div class="panel panel-primary col-md-10">
	<h1 class="panel-heading text-center text-uppercase">{{$post->title}}</h1>
	<div class="col-md-offset-3 col-xs-7">

	<a href="#"><img style="width:500px;" src="{{ url(config('upload.imagesurl') . $post->imagen) }}"></a>
	</div>
	<div class="col-xs-12">
	<h3 style="word-wrap: break-word">{!! $modificado !!}</h3>
	
	<hr/>
	<h2><b>Comentarios</b></h2>

	 @if(Auth::check())

	 {!! Form::open(['route' => ['comment.store'],'method' => 'POST']) !!}

	 {!! Form::input('hidden', 'post_id', $post->id) !!}

        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'placeholder' => 'Añade un comentario público']) !!}
        @if($errors->first('comment'))
            <span class="errors">{{ $errors->first('comment') }}</span>
        @endif

    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

	 {!! Form::close() !!}

	 @endif

	 <br/>

	 @foreach($comments as $comment)

	 <div class="panel panel-default col-xs-12">

	 @can('owner', $comment)
	 <div class="pull-right">
	 	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('comment.destroy', $comment->id))) !!}
        	{!! Form::submit('Borrar', array('class' => 'btn-xs btn-danger')) !!}
     	{!! Form::close() !!}

     </div>
     @endcan

	 <p>{{ $comment->user->name }} - <i>{{ $comment->created_at->diffForHumans() }}</i> </p>

	 <h4 style="word-wrap: break-word">{{ $comment->comment }}</h4>


	 </div>

	 @endforeach

	 <br/>

	</div>
	</div>

@endsection