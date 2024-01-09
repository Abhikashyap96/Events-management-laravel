@extends('index')
@section('content')

<div class="container">
    <div class="card mx-auto col-md-8" style="margin-top:50px;">
        <div class="card-header">
            <h4>Update Events Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <li>
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" value="{{$event->title}}">
                </li><br>
                <li>
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="description" value="{{$event->description}}">
                </li><br>
                <li>
                    <label for="">Address</label>
                    <input class="form-control" type="textarea" name="address" value="{{$event->address}}">
                </li><br>
                <li>
                    <label for="">Number of Tickets</label>
                    <input class="form-control" type="number" name="tickets" value="{{$event->tickets}}">
                </li><br>


                <li>
                    <label for="">Start date</label>
                    <input class="form-control" type="datetime-local" name="start_date"
                        value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}">
                </li><br>
                <li>
                    <label for="">End date</label>
                    <input class="form-control" type="datetime-local" name="end_date"
                        value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}">
                </li><br>

                <li>
                    <label for="">Start Time</label>
                    <input class="form-control" type="time" name="start_time" value="{{$event->start_time}}">
                </li><br>

                <li>
                    <label for="">Image Upload</label>
                    <img src="{{ asset('images/' . $event->image) }}" style="width: 50px; height:50px;" name="image"
                        alt="">
                    {{-- <input class="form-control" type="file" name="image" value=""> --}}
                </li><br>

                <li>
                    <label for="">Ticket Price</label>
                    <input class="form-control" type="text" name="ticket_price" value="{{$event->ticket_price}}">
                </li><br>
                <li>
                    <label for="">Ticket Series</label>
                    <input class="form-control" type="text" name="ticket_series" value="{{$event->ticket_series}}">
                </li>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Events</button>
            </form>
        </div>

    </div>
</div>


@endsection