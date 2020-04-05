<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin_email@test.ru',
            'role' => 'admin'
        ]);

        factory(User::class , 5)->create();
    }
}
