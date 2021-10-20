<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for ($i = 0; $i < 20; $i++ ){
            $post= new Post();

            $post->title=$faker->text(50);
            $post->content=$faker->paragraph(3,true);
            $post->image=$faker->imageUrl(250,250);
            $post->slug=Str::slug($post->title,'-');

            $post->save();
        }
    }
}
