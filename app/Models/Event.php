<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'address',
        'remaining_tickets',
        'tickets',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'ticket_price',
        'ticket_series'
    ];
}
