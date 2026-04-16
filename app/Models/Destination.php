<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Destination extends Model
{
    protected $table = 'destinations';
    protected $fillable = [
        'nama',
        'description',
        'location',
        'working_days',
        'working_hours',
        'ticket_price',
    ];
    public function attractions()
    {
        return $this->hasMany(Attraction::class, 'destination_id');
    }
}
  
