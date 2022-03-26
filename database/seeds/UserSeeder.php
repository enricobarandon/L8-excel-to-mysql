<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'enrico',
            'last_name' => 'barandon',
            'email' => 'enricobarandon@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
