@extends('layouts.admin')






@section('content')

    @if(count($comments) > 0)

    <h1>Comments</h1>


<table class="table">
   <thead>
     <tr>
         <th>Id</th>
         <th>user</th>
         <th>email</th>
         <th>body</th>
         <th>post</th>
         <th>activity</th>
         <th>Created at</th>
         <th>approve</th>
         <th>delete</th>

    </thead>
    <tbody>



        @foreach($comments as $comment)

         <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->auther}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->post->slug)}}">view post</a></td>
              <td><a href="{{route('admin.replies.show', $comment->id)}}">View Replies</a></td>
            <td>{{$comment->is_active}}</td>
            <td>{{$comment->created_at->diffForhumans()}}</td>
      

              <td>

                  @if($comment->is_active == 1)


                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                      <input type="hidden" name="is_active" value="0">


                           <div class="form-group">
                               {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                           </div>
                      {!! Form::close() !!}


                      @else



                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                      <input type="hidden" name="is_active" value="1">


                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                      </div>
                      {!! Form::close() !!}




                  @endif



              </td>

              <td>


                  {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}


                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  </div>
                  {!! Form::close() !!}



              </td>

        </tr>

        @endforeach

    

   </tbody>
 </table>

  
    @else

    <h1>No Comment</h1>
    

    @endif



@stop