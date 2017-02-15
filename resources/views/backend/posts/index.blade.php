@extends('layout')

@section('content')

    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Post </h3>
    

    <a href="{!! url('backend/posts/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'backend.posts.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nombre del post']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
     <hr/>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Url</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        @can('owner', $post)
            <tr>
                <td>
                    @if($post->imagen)
                        <img src="{{ url(config('upload.imagesurl') . 'thumb_' . $post->imagen) }}">
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->url }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('backend.posts.destroy', $post->id))) !!}
                        {!! link_to_route('backend.posts.edit', 'Editar', array($post->id), array('class' => 'btn btn-info')) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endcan
        @endforeach
        </tbody>
    </table>

    {!! $posts->render() !!}

    </div>

@endsection