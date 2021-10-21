<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['HTML', 'JS','PHP','CSS','SCSS','LARAVEL','VUEJS',];

        foreach($categories as $category){
            $newCatergory= new Category();

            $newCatergory['name']=$category;
            $newCatergory['slug']=Str::slug($newCatergory->name,'-');

            $newCatergory->save();
        }
   }
}
