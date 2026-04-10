<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'dstination';
    protected $fillable = [
        'nama',
        'description',
        'location',
        'working_days',
        'working_hours',
        'ticket_price',
    ];
}
