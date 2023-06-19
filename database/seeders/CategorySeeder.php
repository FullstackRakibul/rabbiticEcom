<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    $faker = Faker::create();

    for ($i = 1; $i <= 10; $i++) {
        $category = Category::create([
            'categoryName' => $faker->word,
            'categorySlug'=>$faker->slug,
            'categoryImage'=>$faker->imageUrl(),
            'categoryParent'=>null,
            'categoryDesc'=>$faker->paragraph,
            'categoryStatus'=>$faker->randomElement(['active', 'inactive']),
        ]);

        $this->createSubCategories($category, $faker, 3);
    }
}

private function createSubCategories($parentCategory, $faker, $levels)
{
    if ($levels <= 0) {
        return;
    }

    for ($i = 1; $i <= 5; $i++) {
        $category = Category::create([
            'categoryName' => $faker->word,
            'categorySlug'=>$faker->slug,
            'categoryImage'=>$faker->imageUrl(),
            'categoryParent'=>$parentCategory->id,
            'categoryDesc'=>$faker->paragraph,
            'categoryStatus'=>$faker->randomElement(['active', 'inactive']),
        ]);

        $this->createSubCategories($category, $faker, $levels - 1);
    }
}

}
