@extends('layout')

@section('content')


    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Post </h3>
    
    <hr/>

    {!! Form::open(['route' => 'backend.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}


    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol->rol }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('backend.users.destroy', $user->id))) !!}
                        {!! link_to_route('backend.users.edit', 'Editar', array($user->id), array('class' => 'btn btn-info')) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

@endsection