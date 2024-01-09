@extends('index')
@section('content')



<!-- resources/views/events/manage.blade.php -->

<div class="container" style="margin-top: 80px;width: 60%">
    <div class="card" style="background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><b>Event Details</b></h2>
        </div>
        <div class="card-body">
            @if(isset($event->id))
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="img-fluid rounded"
                        style="max-height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Event Id:</b> {{ $event->id }}</li>
                        <li class="list-group-item"><b>Title:</b> <span style="font-size: 1.2em;">{{ $event->title
                                }}</span></li>
                        <li class="list-group-item"><b>Description:</b> {{ $event->description }}</li>
                        <li class="list-group-item"><b>Address:</b> {{ $event->address }}</li>
                        <li class="list-group-item"><b>Total Tickets:</b> {{ $event->tickets }}</li>
                        <li class="list-group-item"><b>Available Tickets:</b> {{ $event->remaining_tickets }}</li>
                        <li class="list-group-item"><b>Start Date:</b> {{ $event->start_date }}</li>
                        <li class="list-group-item"><b>End Date:</b> {{ $event->end_date }}</li>
                        <li class="list-group-item"><b>Start Time:</b> {{ $event->start_time }}</li>
                        <li class="list-group-item"><b>Ticket Price:</b> ${{ $event->ticket_price }}</li>
                        <li class="list-group-item"><b>Ticket Series:</b> {{ $event->ticket_series }}</li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="card-footer"
            style="background-color: #f8f9fa; border-top: 1px solid #dee2e6; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
            <a class="btn btn-info btn-sm" href="{{ route('bookings.create', ['eventId' => $event->id]) }}">Create
                Booking</a>
            <a class="btn btn-warning " href="javascript:history.back()" style=" float: right;"> Back</a>
        </div>
    </div>
</div>


@endsection