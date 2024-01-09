@extends('index')
@section('content')

<div class="container" style="margin-top:75px;">

    <div class="card">
        @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h4>manage bookings</h4>
            <a class="btn btn-info" href="{{ route('bookings.create', ['eventId' => $event->id]) }}">Create Booking</a>
        </div>
    </div>
    <div class="card-body d-flex">
        <div class="table-responsive">
            <table id="eventsTable" class="table table-bordered table-striped table-hover mt-3"
                style="background-color: #2a74be;">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Event id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Number of Tickets</th>
                        <th>Booking Date</th>
                        <th>Expiry Date</th>
                        <th>Created At</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $bookingTicket)
                    <tr>
                        <td>{{ $bookingTicket->id }}</td>
                        <td>
                            @if($bookingTicket->event)
                            {{ $bookingTicket->event->name }}
                            @else
                            No Event
                            @endif
                        </td>
                        <td>{{ $bookingTicket->name }}</td>
                        <td>{{ $bookingTicket->email }}</td>
                        <td>{{ $bookingTicket->mobile }}</td>
                        <td>{{ $bookingTicket->ticket_count }}</td>
                        <td>{{ $bookingTicket->booking_date }}</td>
                        <td>{{ $bookingTicket->expiry_date }}</td>
                        <td>{{ $bookingTicket->created_at }}</td>
                        <td>
                            <a href="{{ route('bookings.show', $bookingTicket->id) }}"
                                class="badge btn btn-info">View</a>
                            <a href="{{ route('bookings.edit', $bookingTicket->id) }}"
                                class="badge btn btn-warning">Edit</a>
                            <form action="{{ route('bookings.destroy', $bookingTicket->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">No bookings available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection