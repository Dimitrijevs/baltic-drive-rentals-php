<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::all()->pluck('id');
        $carIds = Car::all()->pluck('id');

        foreach ($userIds as $userId) {
            foreach ($carIds as $carId) {
                $randInt = random_int(0, 2);

                if ($randInt === 1) {
                    Like::insert([
                        'user_id' => $userId,
                        'car_id' => $carId,
                    ]);
                }
            }
        }
    }
}
