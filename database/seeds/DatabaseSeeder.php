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
         $this->call(PostsSeeder::class);
         //? php artisan db:seed (exe seeder multipli in $this->call([UserSeeder:class,...]) )
    }
}
