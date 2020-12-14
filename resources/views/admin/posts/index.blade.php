@extends('layouts.admin')



@section('content')

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
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
               </tr>
            @endforeach
            
         @endif
        
      </tbody>
    </table>
@stop