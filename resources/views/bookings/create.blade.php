@extends('index')
@section('content')

<!-- Your existing HTML content -->
<div class="container" style="margin-top:75px;">
    @if(isset($events->id))
   
        <div class="card"
            style="background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 18rem; margin: auto;">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0"><b>Booking Form</b></h2>
            </div>
            <div class="card-body">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $events->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile_no" class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" name="mobile_no" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="ticket_count" class="form-label">Select Number of Tickets:</label>
                        <select class="form-select" name="ticket_count" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Book Now</button>

                </form>
            </div>
        </div>
    </div>

    @endif
</div>

@endsection