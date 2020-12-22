@extends('layouts.admin')

@section('content')

@if(Session::has('post_deleted'))
   <p class="bg-danger">{{session('post_deleted')}}</p>

@elseif(Session::has('post_created'))
   <p class="bg-success">{{session('post_created')}}</p>
   
@elseif(Session::has('post_updated'))
   <p class="bg-warning">{{session('post_updated')}}</p>
   
@endif

   <h1>Posts</h1>

   <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Author</th>
          <th>Photo</th>
          <th>Category</th>
          <th>Title</th>
          <th>Content</th>
          <th>Post</th>
          <th>Comments</th>
          <th>Create_at</th>
          <th>Updated_at</th>
        </tr>
      </thead>
      <tbody>
         
         @if($posts)
         
            @foreach($posts as $post)
               <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user->name}}</td>
                  <td><img height="50" src="{{$post->photo ? $post->photo->file : '/image/placeholder_img.jpg'}}" alt=""></td>
                  <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
               <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                  <td>{{str_limit($post->body, 7)}}</td>
                  <td><a href="{{route('home.post', $post->id)}}">View post</a></td>
                  <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
               </tr>
            @endforeach
            
         @endif
        
      </tbody>
    </table>
@stop