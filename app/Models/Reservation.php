<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_time',
        'car_start_point',
        'car_end_point',
        'start_date',
        'end_date',
        'end_price',
        'kilometers',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
