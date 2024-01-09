<!-- resources/views/events/manage.blade.php -->

@extends('index')
@section('content')

<div class="container" style="margin-top: 75px;">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h2>Manage Events</h2>
            <a href="{{ route('events.create') }}" class="btn btn-primary"><b>Add Event</b></a>
        </div>
        <div class="card-body d-flex">
            <div class="table-responsive">
                <table id="eventsTable" class="table table-bordered table-striped table-hover mt-3"
                    style="background-color: #2a74be;">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>No. of Tickets</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>Image</th>
                            <th>Ticket Price</th>
                            <th>Ticket Series</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($events))
                        @foreach($events as $key => $event)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->address }}</td>
                            <td>{{ $event->tickets }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $event->start_time }}</td>
                            <td>
                                <img src="{{ asset('images/' . $event->image) }}" alt="Event Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>{{ $event->ticket_price }}</td>
                            <td>{{ $event->ticket_series }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="badge btn btn-info">View</a>
                            </td>
                            <td>
                                <a href="{{ route('events.edit', $event->id) }}" class="badge btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
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

@section('scripts')
<!-- Include DataTables CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    // Initialize DataTable
        $(document).ready(function () {
            $('#eventsTable').DataTable();
        });
</script>
@endsection