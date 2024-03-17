<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = range(1, 400);
        $carIds = range(1, 14);

        foreach ($userIds as $userId) {
            foreach ($carIds as $carId) {

                $randInt = random_int(0, 2);

                if ($randInt === 1) {
                    Like::factory()->create([
                        'user_id' => $userId,
                        'car_id' => $carId,
                    ]);
                }
            }
        }
    }
}
