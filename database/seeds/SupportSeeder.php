<?php

use App\Entities\Support;
use App\Entities\User;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role' ,'!=', 'admin')->get();

        foreach ($users as $user) {
            $user->support()->saveMany(factory(Support::class , 3)->make());
        }
    }
}
