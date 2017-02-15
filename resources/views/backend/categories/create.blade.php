@extends('layout')

@section('content')

    <h3>Nueva Categoria</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => 'backend.categories.store','class' => 'registerlogin']) !!}
    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', old('name'), ['class' => 'form-control']) !!}
        @if($errors->first('name'))
            <span class="errors">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection