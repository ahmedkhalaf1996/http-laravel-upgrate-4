@extends('layouts.admin')






@section('content')


    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminMediasController@store', 'class'=>'dropzone']) !!}




    {!! Form::close() !!}




@stop


