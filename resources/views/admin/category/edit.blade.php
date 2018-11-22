@extends('layouts.admin')



@section('content')



<div class="col-sm-6">
{!! Form::model($categorys,['method'=>'PATCH','action'=>['AdminCategoryController@update',$categorys->id]]) !!}

<div class="form-group">
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}


<div>
{!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$categorys->id]]) !!}

<div class="form-group">
{!! Form::submit('DELETE', ['class'=>'btn btn-danger ']) !!}
</div>

{!! Form::close() !!}

</div>



</div>




@stop