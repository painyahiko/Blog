@extends('layout')

@section('content')

    <h3>Recuperar Contraseña</h3>

    {!! Form::open(['url' => 'password/email', 'class' => 'resetpassword']) !!}

    <div>
        Email
        {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}

    </div>
    <br/>
    <div>
        {!! form::submit('Recuperar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection