<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'title' => 'Administrator',
            'description' => 'admin'
        ]);

        UserType::create([
            'title' => 'User',
            'description' => 'viewing'
        ]);
    }
}
