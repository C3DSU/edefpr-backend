@extends('adminlte::page')

@section('title', 'Cadastrar nova atividade raalizada')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar nova atividade realizada</h1>
@stop

@section('content')
    @include('myActivities._form', [
        'form' => $form
    ])
@stop
