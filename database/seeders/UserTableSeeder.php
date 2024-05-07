<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'CEO of BDRentals',
            'is_admin' => 1,
            'phone_number' => '22722505',
            'email' => 'dimitrijevgleb@gmail.com',
            'avatar' => null,
            'password' => bcrypt('12345678'),
        ]);

        User::factory(99)->create();
    }
}
