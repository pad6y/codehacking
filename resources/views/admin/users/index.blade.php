@extends('layouts.admin')

@section('content')

@if(Session::has('user_deleted'))
   <p class="bg-danger">{{session('user_deleted')}}</p>

@elseif(Session::has('user_created'))
   <p class="bg-success">{{session('user_created')}}</p>
   
@elseif(Session::has('user_updated'))
   <p class="bg-warning">{{session('user_updated')}}</p>
   
@endif


<h1>Users</h1>

<table class="table table-striped">
   <thead>
     <tr>
       <th>ID</th>
       <th>Photo</th>
       <th>Name</th>
       <th>Email</th>
       <th>Role</th>
       <th>Status</th>
       <th>Create_at</th>
       <th>Updated_at</th>
     </tr>
   </thead>
   <tbody>
      
      @if($users)
      
         @foreach($users as $user)
            <tr>
               <td>{{$user->id}}</td>
               <td><img height="50" src="{{$user->photo ? $user->photo->file : '/image/placeholder_img.jpg'}}" alt=""></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
               <td>{{$user->email}}</td>
               <td>{{$user->role->name}}</td>
               <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
               <td>{{$user->created_at->diffForHumans()}}</td>
               <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
         @endforeach
         
      @endif
     
   </tbody>
 </table>


@stop