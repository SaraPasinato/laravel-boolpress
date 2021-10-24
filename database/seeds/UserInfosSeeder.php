<?php

use App\User;
use App\UserInfo;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class UserInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users= User::select('id')->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++ ){
            $userInfo= new UserInfo();

            $userInfo->user_id=Arr::random($users);
            $userInfo->address=$faker->address();
            $userInfo->phone=$faker->e164PhoneNumber();
            $userInfo->country=$faker->countryISOAlpha3();

            $userInfo->save();
        }
    }
}
