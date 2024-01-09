<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
</head>

<body>

    <h1>Ticket Confirmation</h1>

    <p>Dear {{ $mailData['ticket']->name }},</p>

    <p>Your ticket has been successfully booked for the event. Here are the details:</p>

    <ul>
        {{-- <li><strong>Event:</strong> {{ $mailData['ticket']->event->name }}</li> --}}
        <li><strong>Name:</strong> {{ $mailData['ticket']->name }}</li>
        <li><strong>Mobile:</strong> {{ $mailData['ticket']->mobile }}</li>
        <li><strong>Email:</strong> {{ $mailData['ticket']->email }}</li>
        <li><strong>Ticket Count:</strong> {{ $mailData['ticket']->ticket_count }}</li>
        <li><strong>Booking Date:</strong> {{ $mailData['ticket']->booking_date }}</li>
        <li><strong>Expiry Date:</strong> {{ $mailData['ticket']->expiry_date }}</li>
    </ul>

    <p>Thank you for booking with us!</p>

    <p>Best regards,<br>
         Events Management</p>
</body>

</html>