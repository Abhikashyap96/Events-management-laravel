@extends('index')
@section('content')



<!-- resources/views/events/manage.blade.php -->

<div class="container mx-auto" style="margin-top: 80px;">

    <h2>All Events</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(isset($events) && count($events) > 0)
    <div class="row">
        @foreach($events as $key => $event)
        <div class="col-md-3 mb-4">
            <div class="card"
                style="height: 100%; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px;">
                <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="card-img-top"
                    style="max-height: 200px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title" style="color: #007bff;"><b>{{ $event->title }}</b></h5>
                    <p class="card-text"><b>Address:</b> {{ $event->address }}</p>
                    <p class="card-text"><b>No. of Tickets:</b> {{ $event->tickets }}</p>
                    <p class="card-text"><b>Start Date:</b> {{ $event->start_date }}</p>
                    <p class="card-text"><b>Start Time:</b> {{ $event->start_time }}</p>
                    <p class="card-text"><b>Ticket Price:</b> ${{ $event->ticket_price }}</p>
                </div>
                <div class="card-footer"
                    style="background-color: #f8f9fa; border-top: 1px solid #dee2e6; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View Details</a>
                    <?php
                    $endData = explode(" ",$event->end_date);
                    $givenDate = \Carbon\Carbon::parse($endData[0] );
                    $currentDate = \Carbon\Carbon::now();
                   ?>
                    @if(($givenDate->gte($currentDate)) )
                    <a href="{{ route('bookings.create', ['eventId' => $event->id]) }}"
                        class="btn btn-success btn-sm">Create Booking</a>
                    @else
                    <a href="#" class="btn btn-danger btn-sm" disabled>Expire Event</a>
                    @endif

                </div>
            </div>
        </div>
        @if(($key + 1) % 4 == 0)
        <div class="w-100"></div> {{-- Line break after every 4 cards --}}
        @endif
        @endforeach
    </div>
    @else
    <p>No events available.</p>
    @endif



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