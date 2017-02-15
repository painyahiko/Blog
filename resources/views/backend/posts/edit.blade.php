@extends('layout')

@section('content')

    <h3>Editar Post</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => ['backend.posts.update', $post->id], 'files' => true,'method' => 'PUT', 'class' => 'registerlogin']) !!}

    {!! Form::input('hidden', 'user_id', $post->user_id) !!}

    <div>
        <label for="">Titulo:</label><br/>
        {!! Form::input('text', 'title', $post->title, ['class' => 'form-control']) !!}

        @if($errors->first('title'))

            <span class="errors">{{ $errors->first('title') }}</span>

        @endif
    </div>

    <div>
        <label for="">Categoría:</label><br/>
        @foreach($categories as $category)
            {{ $category->name }}
            @if($post->categories->contains('id',$category->id))
                {!! Form::checkbox("category[]", "$category->id", true) !!}
            @else
                {!! Form::checkbox("category[]", "$category->id", false) !!}
            @endif
        @endforeach
    </div>

    <div>
        <label for="">Contenido:</label><br/>
        {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}

        @if($errors->first('content'))

            <span class="errors">{{ $errors->first('content') }}</span>

        @endif
    </div>

    <div>
        <label for="">Imagen Destacada:</label><br/>
        {!! Form::file('imagen', ['class' => 'form-control']) !!}
        @if($errors->first('content'))
            <span class="errors">{{ $errors->first('imagen') }}</span>
        @endif
    </div>

    <div>
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection