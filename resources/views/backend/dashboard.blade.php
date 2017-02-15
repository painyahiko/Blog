@extends('layout')

@section('content')

<h3>Bienvenido, {!! auth()->user()->name !!}</h3>

@endsection