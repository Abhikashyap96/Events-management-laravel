@extends('index')
@section('content')

<div class="container">
    <div class="card mx-auto col-md-8" style="margin-top:50px;">
        <div class="card-header">
            <h4>Create Events Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('events.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <li>
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" required>
                </li><br>
                <li>
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="description" required>
                </li><br>
                <li>
                    <label for="">Address</label>
                    <input class="form-control" type="textarea" name="address" required>
                </li><br>
                <li>
                    <label for="">Number of Tickets</label>
                    <input class="form-control" type="number" name="tickets"required>
                </li><br>
                <li>
                    <label for="">Remaining Tickets</label>
                    <input class="form-control" type="number" name="remaining_tickets" required>
                </li><br>


                <li>
                    <label for="">Start date</label>
                    <input class="form-control" type="date" name="start_date" required>
                </li><br>
                <li>
                    <label for="">End date</label>
                    <input class="form-control" type="date" name="end_date" required>
                </li><br>

                <li>
                    <label for="">Start Time</label>
                    <input class="form-control" type="time" name="start_time" required>
                </li><br>

                <li>
                    <label for="">Image Upload</label>
                    <input class="form-control" type="file" name="image" required>
                </li><br>

                <li>
                    <label for="">Ticket Price</label>
                    <input class="form-control" type="text" name="ticket_price" required>
                </li><br>
                <li>
                    <label for="">Ticket Series</label>
                    <input class="form-control" type="text" name="ticket_series" required>
                </li>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Events</button>
        </div>
        </form>
    </div>
</div>


@endsection