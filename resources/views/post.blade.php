@extends('layouts.blog-post')


@section('content')

<!-- Blog Post -->

   <!-- Title -->
   <h1>{{$post->title}}</h1>

   <!-- Author -->
   <p class="lead">
      by <a href="#">{{$post->user->name}}</a>
   </p>

   <hr>

   <!-- Date/Time -->
   <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

   <hr>

   <!-- Preview Image -->
   <img class="img-responsive" src="{{$post->photo->file}}" alt="">

   <hr>

   <!-- Post Content -->
   <p class="lead">{{$post->body}}</p>

   <hr>

   @if(Session::has('success'))
   
      {{session('success')}}
      
   @endif
   
   <!-- Blog Comments -->
   
   @if(Auth::check())
   <!-- Comments Form -->
   
   <div class="well">
      
      {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}
      
         <input type="hidden" name="post_id" value="{{$post->id}}">
      
         <div class='form-group'>
            {!! Form::label('body', 'Leave a comment:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' =>3])!!}
         </div>
      
         <div class='form-group'>
            {!! Form::submit('Post comment', ['class' => 'btn btn-primary']) !!}
         </div>
      
      {!! Form::close() !!}
      
      
   </div>
   
   @endif
   
   <hr>

   <!-- Posted Comments -->

   @if(count($comments) > 0)
   
      @foreach($comments as $comment)
      
   <!-- Comment -->
   <div class="media">
      <a class="pull-left" href="#">
         <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
      </a>
      <div class="media-body">
         <h4 class="media-heading">{{$comment->author}}
               <small>{{$comment->created_at->diffForHumans()}}</small>
         </h4>
         <p>{{$comment->body}}</p>
         

         <!-- Nested Comment -->
         @if(count($comment->replies) > 0)
   
            @foreach($comment->replies as $reply)
               
               @if($reply->is_active == 1)
                                 
               <div id="nested-comment" class="media">
                  <a class="pull-left" href="#">
                     <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                  </a>
                  
                  <div class="media-body">
                     <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at->diffForHumans()}}</small>
                     </h4>
                     {{$reply->body}}
                  </div>
                           
                  
                  <div class="comment-reply-container">
                     
                     <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                     
                     <div class="comment-reply col-sm-9">

                     
                        {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                           <div class='form-group'>
                        
                           <input type="hidden" name="comment_id" value="{{$comment->id}}">
                           
                              {!! Form::label('reply', 'Reply to comment:') !!}
                              {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' =>1])!!}
                           </div>
                        
                           <div class='form-group'>
                              {!! Form::submit('Reply', ['class' => 'btn btn-primary']) !!}
                           </div>
                        
                        {!! Form::close() !!}
                  
                     </div>
                                       
                  </div>
               
                  <!-- End Nested Comment -->
               </div>
               
               @else
      
               <h1 class="text-center">No replies</h1>
               
               
               @endif
               
            @endforeach
      
         @endif
      
      </div>
   </div>
   
      @endforeach
      
   @endif
   


@stop

@section('scripts')

   <script>
      
      $(".comment-reply-container .toggle-reply").click(function() {
         
         $(this).next().slideToggle('slow');
      })
      
      
   </script>


@stop