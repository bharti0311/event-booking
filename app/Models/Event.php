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
        'event_date',
        'event_time',
        'duration',
        'location',
        'attachments',
        'team_members',
        'guests',
        'notify',
        'reminder'
    ];

    protected $casts = [
        'attachments' => 'array',
        'team_members' => 'array',
        'guests' => 'array',
        'notify' => 'array',
    ];
}
