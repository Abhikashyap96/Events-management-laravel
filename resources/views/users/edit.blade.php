@extends('index')
@section('content')

<div class="container mx-auto">

    <div class="card col-md-8 mx-auto" style="margin-top:75px;">
        <div class="card-header">
            <h2>Edit User</h2>
        </div>
        <!-- Edit User Form -->
        <div class="card-body">
            <form action="{{ route('users.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT') {{-- Add this line to include the method spoofing --}}
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                <label for="">Email Id</label>
                @if(session('user')->role_as == 0)
                <input type="email" readonly class="form-control" name="email" value="{{$user->email}}">
                @else
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                @endif

                <label for="">Password</label>
                <input type="password" class="form-control" name="password" value="{{$user->password}}">

        </div>
        <div class="card-footer justify-content-center">
            <button type="submit" class="badge bg-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection