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
        $categories=[
            ['name'=>'HTML','color'=>'primary'],
            ['name'=>'JS','color'=>'warning'],
            ['name'=>'PHP','color'=>'secondary'],
            ['name'=>'CSS','color'=>'info'],
            ['name'=>'SCSS','color'=>'dark'],
            ['name'=>'LARAVEL','color'=>'danger'],
            ['name'=>'VUEJS','color'=>'success']
        ];

        foreach($categories as $category){
            $newCatergory= new Category();

            $newCatergory->name=$category['name'];
            $newCatergory->color=$category['color'];
            $newCatergory['slug']=Str::slug($newCatergory->name,'-');

            $newCatergory->save();
        }
   }
}
