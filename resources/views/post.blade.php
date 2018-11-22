@extends('layouts.blog-post')



@section('content')



<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        <h1>Post</h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>  {{$post->created_at->diffForHumans()}} </p>
            <hr>
            <img width="900" class="img-responsive" src="{{$post->photo ? $post->photo->file : null  }}" alt="">
            <hr>
            <p>{!! $post->body !!}</p>
            <hr>
      


    @if(Session::has('comment_message'))

            {{session('comment_message')}}


       @endif

      @if(Auth::check())
    <div class="well">
    	<h4>leave acomment:</h4>
    
        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
         
              <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="from-group">
        	{!! Form::label('body','Body') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
        </div>
        <br>
        <div class="from-group">
        	{!! Form::submit('submit comment',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>



    @endif



     @if(count($comments) > 0)

       @foreach($comments as $comment)
      <div class="media">
          <a class="pull-left" href="#">
              <img height="64" width="64" class="media-object" src="{{$comment->photo ? $comment->photo : Auth::user()->gravatar}}" alt="">
          </a>
          <div class="media-body">
              <h4>{{$comment->author}}
                <small>{{$comment->created_at->diffForhumans()}}</small>
              </h4>
              <p>{{$comment->body}}</p>



  @if(count($comment->replies))

    @foreach($comment->replies as $reply)

  
       @if($reply->is_active ==1)

    <div class="reply media">
      <a href="" class="pull-left">
        <img height="64" width="64" src="{{$reply->photo}}" alt="" class="media-object" >
      </a>
      <div class="media-body">
        <h4 class="media-headimg">
          {{ $reply->author }}
         <small>{{$reply->created_at->diffForhumans()}}</small>
          
        </h4>
      </div>
        <p>{{$reply->body}}</p>                
    </div>

        @endif
    @endforeach

  <div class="comment-reply-container">
   
   <button style="margin-bottom:10px;" class="toggle-reply btn btn-primary pull-right">reply</button>

     <div class="comment-reply">

    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesComtroller@createReply']) !!}

      <input type="hidden" name="comment_id" value="{{$comment->id}}">

      <div class="from-group">
        {!! Form::label('body','Body') !!}
          {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
      </div>
      <br>
      <div class="from-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

    </div>
  </div>



  

  @else



  <div class="comment-reply-container">
   
   <button style="margin-bottom:10px;" class="toggle-reply btn btn-primary pull-right">reply</button>

     <div class="comment-reply">

    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesComtroller@createReply']) !!}

      <input type="hidden" name="comment_id" value="{{$comment->id}}">

      <div class="from-group">
        {!! Form::label('body','Body') !!}
          {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
      </div>
      <br>
      <div class="from-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

    </div>
  </div>

   @endif




          </div>
      </div>
 

      @endforeach

     @endif

        </div>
    </div>
</div>


@stop

@section('scripts')

  <script type="text/javascript">
    
    $(".comment-reply-container .toggle-reply").click(function(){

      $(this).next().slideToggle("slow");
    });


  </script>

@stop

