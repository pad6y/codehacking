@extends('layouts.admin')


@section('content')

   <h1>Media</h1>

   @if ($photos)
   
   <table class='table'>
      <thead>
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>created_at</th>
            <th>updated_at</th>
         </tr>
      </thead>
      <tbody>
         
         @foreach($photos as $photo)
         
         <tr>
            <td>{{$photo->id}}</td>
            <td><img height="150" src="{{$photo->file}}" alt=""> {{$photo->file}}</td>
            <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
            <td>{{$photo->updated_at}}</td>
            <td>
               
               {!! Form::open(['method' => 'DELETE', 'action' => ['MediaController@destroy', $photo->id]]) !!}
               
                  <div class='form-group'>
                     {!! Form::submit('Delete image', ['class' => 'btn btn-danger']) !!}
                  </div>
               
               {!! Form::close() !!}
            </td>
            
         </tr>
         
         @endforeach
         
      </tbody>
   </table>
   
   @endif
   
@stop