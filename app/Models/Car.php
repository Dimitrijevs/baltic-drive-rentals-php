<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'body_type',
        'fuel_type',
        'emissions',
        'gearbox',
        'price_per_day',
        'price_per_km',
        'carImage1',
        'carImage2',
        'carImage3',
        'carImage4',
        'carImage5',
        'carImage6',
        'carImage7',
        'carImage8'
    ];

    public function getImageURL()
    {
        $maxImages = 8;
        for($i = 1; $i <= $maxImages; $i++) {
            $carImage = $this->carImage . $i;
            if (file_exists($carImage)) {
                return url('storage/'.$carImage);
            }
        }

        return 0;
    }
}
