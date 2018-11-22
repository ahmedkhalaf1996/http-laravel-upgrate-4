@extends('layouts.admin')



@section('content')


<h1 class="text-center">All category</h1>

    @if(Session::has('create_new_category'))


      <p class="bg-danger">{{'create new category by name : '.session('create_new_category')}}</p>


    @endif

<div class="col-sm-6">
	

<table class="table">
   <thead>
     <tr>
         <th>Id</th>
         <th>name</th>

    </thead>
    <tbody>

    @if($categorys)


        @foreach($categorys as $category)

      <tr>
          <td>{{$category->id}}</td>

          <td><a href="{{route('admin.category.edit',$category->id)}}">{{$category->name}}</a></td>
      </tr>

        @endforeach

        @endif

   </tbody>
 </table>

</div>

<br>


<div class="col-sm-6">
 {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoryController@store']) !!}

	<div class="form-group">
	 {!! Form::label('name', 'Name:') !!}
	 {!! Form::text('name', null, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
	</div>

   {!! Form::close() !!}

</div>




@stop