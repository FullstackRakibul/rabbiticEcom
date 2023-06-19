<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 10; $i++) {
            $brandName = $faker->unique()->company;
            $brandSlug = Str::slug($brandName);
            $brandImage = $faker->imageUrl();
            $brandDesc = $faker->paragraph;
            $brandStatus = $faker->randomElement(['active', 'inactive']);

            Brand::create([
                'brandName' => $brandName,
                'brandSlug' => $brandSlug,
                'brandImage' => $brandImage,
                'brandDesc' => $brandDesc,
                'brandStatus' => $brandStatus,
            ]);
        }
    }
}
