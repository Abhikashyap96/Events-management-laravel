@extends('index')
@section('content')

<div class="container">
    <h2>Create User</h2>

    <!-- Add User Form -->
    <div class="card col-md-8 mx-auto" style="margin-top:50px;">
        <div class="card-header">
            <h3>Registration Form</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store')}}" method="POST">
                @csrf
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="name">
                <label for="">Email Id</label>
                <input type="email" class="form-control" name="email">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">

        </div>
        <div class="card-footer justify-content-center">
            <button type="submit" class="badge bg-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection