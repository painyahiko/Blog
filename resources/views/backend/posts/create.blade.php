
@extends('layout')

@section('content')

    <h3>Nuevo Post</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => 'backend.posts.store', 'files' => true, 'class' => 'registerlogin']) !!}
    <div>
        <label for="">Titulo:</label><br/>
        {!! Form::input('text', 'title', old('title'), ['class' => 'form-control']) !!}
        @if($errors->first('title'))
            <span class="errors">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div>
        <label for="">Categoría:</label><br/>
        @foreach($categories as $category)
            {{ $category->name }}
            {!! Form::checkbox("category[]", "$category->id", false) !!}
        @endforeach
    </div>

    <div>
        <label for="">Contenido:</label><br/>
        {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
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
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection