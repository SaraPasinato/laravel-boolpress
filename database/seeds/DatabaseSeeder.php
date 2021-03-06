<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([UsersSeeder::class,UserInfosSeeder::class,CategoriesSeeder::class,TagsSeeder::class,PostsSeeder::class]);
         //? php artisan db:seed (exe seeder multipli in $this->call([UserSeeder:class,...]) )
    }
}
