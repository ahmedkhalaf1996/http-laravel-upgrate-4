@extends('layouts.admin')






@section('content')


    <h1>Posts</h1>


    <table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Owner</th>
             <th>Category</th>
             <th>Title</th>
             <th>body</th>
             <th>view post</th>
             <th>Created at</th>
             <th>Update</th>
        </thead>
        <tbody>

      @if($posts)


          @foreach($posts as $post)

        <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td>{{$post->title}}</td>
{{--str_limit()  ::: is a function bild in on laravel give us only 8 or any num of caracter + the spase also taken--}}
            <td>{!! str_limit($post->body,10) !!}</td>
            <td><a href="{{route('home.post',$post->slug)}}">view post</a></td>
            <td><a href="{{route('admin.comments.show',$post->id)}}">view comments</a></td>
            <td>{{$post->created_at->diffForhumans()}}</td>
            <td>{{$post->updated_at->diffForhumans()}}</td>

        </tr>

          @endforeach

          @endif

       </tbody>
     </table>

<div class="row"> 
  <div class="col-sm-6 col-sm-offset-5">
     {{ $posts->render()}} 
  </div>
</div>




@stop