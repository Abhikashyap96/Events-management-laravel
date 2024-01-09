@extends('master')
@section('content')

<div class="container">
    <div class="card mx-auto col-md-8" style="margin-top:50px;">
        <div class="card-header">
            <h4>Create Events Form</h4>
        </div>
        <div class="card-body">
            <form action="/event" method="POST" enctype="multipart/form-data">
                @csrf
               
                        <li>
                            <label for="">Title</label>
                            <input class="form-control"type="text" name="title">
                        </li><br>
                        <li>
                            <label for="">Description</label>
                            <input class="form-control"type="text" name="description">
                        </li><br>
                        <li>
                            <label for="">Address</label>
                            <input class="form-control"type="textarea" name="address">
                        </li><br>
                    <li>
                        <label for="">Number of Tickets</label>
                        <input class="form-control" type="number" name="tickets">
                    </li><br>
               
                   
                        <li>
                            <label for="">Start date</label>
                            <input class="form-control" type="date" name="start_date">
                        </li><br>
                        <li>
                            <label for="">End date</label>
                            <input class="form-control" type="date" name="end_date">
                        </li><br>
                    
                        <li>
                            <label for="">Start Time</label>
                            <input class="form-control"type="time" name="start_time">
                        </li><br>
                    
                        <li>
                            <label for="">Image Upload</label>
                            <input class="form-control"type="file" name="image">
                        </li><br>
                   
                        <li>
                            <label for="">Ticket Price</label>
                            <input class="form-control"type="text" name="ticket_price">
                        </li><br>
                        <li>
                            <label for="">Ticket Series</label>
                            <input class="form-control"type="text" name="ticket_series">
                        </li>
                    
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Events</button>
        </div>
    </form>
    </div>
</div>


@endsection