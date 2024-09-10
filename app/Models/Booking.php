<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    // app/Models/Booking.php
protected $fillable = [
    'event_id',
    'user_id',
    'event_title',
    'event_date',
    'event_time',
    'event_location',
    'event_duration',
    'event_organizer',
    'booking_date',
    'booking_time',
    'status',
    'user_name',
    'user_email',
];

}
