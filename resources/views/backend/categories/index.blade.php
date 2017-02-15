@extends('layout')

@section('content')


    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Categorias </h3>

    <a href="{!! url('backend/categories/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'backend.categories.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de categoria']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

    <hr/>


    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>{{ $category->updated_at->diffForHumans() }}</td>
                <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('backend.categories.destroy', $category->id))) !!}
                        {!! link_to_route('backend.categories.edit', 'Editar', array($category->id), array('class' => 'btn btn-info')) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $categories->render() !!}

@endsection