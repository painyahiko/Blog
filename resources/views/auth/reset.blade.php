@extends('layout')

@section('content')

@if($errors->all())
<div class="alert alert-danger">
    <p>Por favor,Resuelva los siguientes errores:</p>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

    <h3>Confirmar cambio de Contraseña</h3>

    {!! Form::open(['url' => 'password/reset', 'class' => 'registerlogin']) !!}

    <div>
        Email
        {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}

    </div>

    <div>
        Password
        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}

    </div>

    <div>
        Confirmar Password
        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}

    </div>
    <br/>
    <div>
        {!! form::submit('Actualizar Contraseña', ['class' => 'btn btn-primary']) !!}
    </div>

    <input type="hidden" name="token" value="{{ $token }}">

    {!! Form::close() !!}

@endsection