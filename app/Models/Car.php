<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'horsepower',
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

    public function likes() {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function likes_count() {
        return $this->hasMany(Like::class);
    }

    public function getImageURLs()
    {
        $maxImages = 8;
        $images = [];

        for ($i = 2; $i <= $maxImages; $i++) {
            $carImage = 'carImage' . $i;
            $image = $this->$carImage;
            if ($image) {
                $images[] = url('storage/' . $image);
            }
        }

        return $images;
    }

    public function getFirstImageURL()
    {
        $carImage = $this->carImage1;
        if ($carImage) {
            return url('storage/'.$carImage);
        }

        return null;
    }
}
