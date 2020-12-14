@extends('layouts.admin')



@section('content')

   <h1>Edit Post</h1>

   
   {!! Form::model(['method' => 'POST', 'enctype'=>'multipart/form-data', 'action' => 'PostController@store']) !!}

      <div class='form-group'>
         {!! Form::label('title', 'Title:') !!}
         {!! Form::text('title', null, ['class' => 'form-control'])!!}
      </div>

      <div class='form-group'>
         {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
      </div>

   {!! Form::close() !!}
@stop