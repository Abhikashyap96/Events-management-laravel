@extends('index')
@section('content')

<div class="container">
   

    <!-- Display User Details -->
    <div class="card col-md-8 mx-auto" style="margin-top:75px;">
        <div class="card-header">
            <h2>User Details</h2>
        </div>
        <div class="card-body">

            <tbody>
                @if(isset($user->id))
                
               
                 <p><b>User Id: </b>   <td>{{ $user->id }}</td></p>
                 <p><b>User Name: </b><td>{{ $user->name }}</td></p> 
                 <p><b>User Email: </b><td>{{ $user->email }}</td></p> 
                 <p><b>Role: </b><td>{{ $user->role_as ? 'Admin' : 'User' }}</td></p>
                
               
                @endif
            </tbody>
            <a href="{{ route('users.edit', $user->id) }}" class="badge btn btn-warning">Edit</a>
           
        </div>
    </div>
</div>

@endsection