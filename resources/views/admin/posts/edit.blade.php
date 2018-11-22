

@extends('layouts.admin')




@section('content')

@include('includes.tinyediteor')


    <h1>Edit Post</h1>
   
<div class="row">

 <div class="col-sm-3">

<img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive">
     
 </div>
</div>

<br>

    <div class="row">
 
        {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@update', $post->id], 'files'=>true]) !!}
           <div class="form-group">
                 {!! Form::label('title', 'Title:') !!}
                 {!! Form::text('title', null, ['class'=>'form-control'])!!}
           </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose Categories'] + $categorys, null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
             </div>


            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>




             <div class="form-group">
                {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-6']) !!}
             </div>

           {!! Form::close() !!}

    </div>


    <div class="row">
	 {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostController@destroy', $post->id]]) !!}
	  <div class="form-group">
	   {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
	  </div>
	 {!! Form::close() !!}
    </div>
   <br>
    <div class="row">

        @include('includes.form_error')
    
    </div>




@stop