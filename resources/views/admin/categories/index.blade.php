@extends('layouts.admin')

@section('content')

<div class="row">
      
   @include('includes.form_error')
   
</div>

<h1>Categories Page</h1>

<div class="row">
   <div class="col-sm-6">
      
      {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
      
         <div class='form-group'>
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control'])!!}
         </div>
      
         <div class='form-group'>
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
         </div>
      
      {!! Form::close() !!}
      
   </div>

   <div class="col-sm-6">
      <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Create_at</th>
            <th>Updated_at</th>
         </tr>
         </thead>
         <tbody>
            
            @if($categories)
            
               @foreach($categories as $category)
                  <tr>
                     <td>{{$category->id}}</td>
                     <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                     <td>{{$category->created_at->diffForHumans()}}</td>
                     <td>{{$category->updated_at->diffForHumans()}}</td>
                  </tr>
               @endforeach
               
            @endif
         
         </tbody>
      </table>
   </div>
</div>


@stop