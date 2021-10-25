<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++ ){
            $user= new User();

            $user->name=$faker->userName();
            $user->email=$faker->email();
            $user->password=bcrypt($faker->password());

            $user->save();
        }
    }
}
