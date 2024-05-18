<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use App\Models\Reservation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all()->count();
        $cars = Car::all()->count();
        $reservations = $faker->numberBetween(50, 200);
        $addresses = ['Lidosta Rīga', 'Aspazijas bulvāris 32', 'Brīvības iela 366'];

        for ($i = 0; $i < $reservations; $i++) {
            $reservation = new Reservation();
            $reservation->user_id = $faker->numberBetween(1, $users);

            $car_id = $faker->numberBetween(1, $cars);
            $reservation->car_id = $car_id;

            do {
                $start_date = $faker->dateTimeBetween('-1 month', '-1 week');
                $end_date = $faker->dateTimeBetween($start_date, '+1 week');
            } while (Reservation::where('car_id', $car_id)
                ->where(function($query) use ($start_date, $end_date) {
                    $query->whereBetween('start_date', [$start_date, $end_date])
                          ->orWhereBetween('end_date', [$start_date, $end_date]);
                })->exists());

            $reservation->start_date = $start_date;
            $reservation->end_date = $end_date;
            $reservation->start_time = $faker->time();

            if (rand(0, 1)) :
                $reservation->car_start_point = $faker->randomElement($addresses);
            else :
                $reservation->car_start_point = $faker->address;
            endif;

            if (rand(0, 1)) :
                $reservation->car_end_point = $faker->randomElement($addresses);
            else :
                $reservation->car_end_point = $faker->address;
            endif;

            $kilometers = $faker->numberBetween(200, 6000);
            $reservation->kilometers = $kilometers;

            $car = Car::find($car_id);
            $costPerDay = $car->price_per_day;
            $costPerKm = $car->price_per_km;
            $days = Carbon::parse($reservation->start_date)->diffInDays($reservation->end_date);
            $daysPrice = $days * $costPerDay;
            $kmPrice = $kilometers * $costPerKm;
            $price = $daysPrice + $kmPrice;

            if (!in_array($reservation->car_start_point, $addresses)) {
                $price += 10;
            }

            if (!in_array($reservation->car_end_point, $addresses)) {
                $price += 10;
            }

            if ($price >= 1000) :
                $price *= 0.85;
            elseif ($price >= 500) :
                $price *= 0.9;
            elseif ($price >= 200) :
                $price *= 0.94;
            elseif ($price >= 100) :
                $price *= 0.97;
            endif;

            $reservation->end_price = $price;
            $reservation->save();
        }
    }
}
