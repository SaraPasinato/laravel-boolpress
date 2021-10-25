<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\User;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
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
        
        $categories= Category::select('id')->pluck('id')->toArray();
        $users= User::select('id')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++ ){
            $post= new Post();

            $post->category_id=Arr::random($categories);
            $post->user_id=Arr::random($users);
            $post->title=$faker->text(50);
            $post->content=$faker->paragraph(2);
            $post->image=$faker->imageUrl(250,250);
            $post->slug=Str::slug($post->title,'-');

            $post->save();
        }
    }
}
