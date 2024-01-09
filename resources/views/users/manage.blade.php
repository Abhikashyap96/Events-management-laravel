@extends('index')
@section('content')

<div class="container" style="margin-top:75px;">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h2>Manage Users</h2>



            <a href="{{ route('users.create') }}" class="btn btn-primary"><b>Add User</b></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="eventsTable" class="table table-bordered table-striped table-hover mt-3"
                    style="background-color: #2a74be;">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users))
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_as ? 'Admin' : 'User' }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="badge btn btn-info">View</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="badge btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection