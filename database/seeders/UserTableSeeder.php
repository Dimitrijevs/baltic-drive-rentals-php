<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Vecais bembīts one Love',
            'is_admin' => 1,
            'phone_number' => '22722505',
            'email' => 'dimitrijevgleb@gmail.com',
            'avatar' => null,
            'password' => bcrypt('12345678'),
        ]);

        $users = rand(50, 200);

        User::factory($users)->create();
    }
}
