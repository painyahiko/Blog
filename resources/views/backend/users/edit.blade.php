@extends('layout')

@section('content')

    <h3>Editar Usuario</h3>

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    {!! Form::open(['route' => ['backend.users.update', $user->id],'method' => 'PUT', 'class' => 'registerlogin']) !!}

    <div>
        <label for="">Nombre:</label><br/>
        {!! Form::input('text', 'name', $user->name, ['class' => 'form-control']) !!}

        @if($errors->first('name'))

            <span class="errors">{{ $errors->first('name') }}</span>

        @endif
    </div>

    <div>
        <label for="">Email:</label><br/>
        {!! Form::input('email', 'email', $user->email, ['class' => 'form-control']) !!}

        @if($errors->first('email'))

            <span class="errors">{{ $errors->first('email') }}</span>

        @endif

    </div>

    <div>
        <label for="">Rol:</label><br/>
        {!! Form::select('rol_id', array(
    '1' => 'Registrado',
    '2' => 'Editor',
    '3' => 'Autor',
    '4' => 'Admin'
    ),$user->rol_id ) !!}



    </div>

    <div>
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection