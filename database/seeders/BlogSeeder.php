<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Faker\Factory;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1 ,10) as $index ){
            Blog::create([
                'blogTitle' => $faker->sentence,
                'blogContent' => $faker->paragraph,
                'blogCategory' => 1,
                'blogImage' => 'https://picsum.photos/id/'.rand(1,100).'/200/300',
                'status' =>'published'
            ]);
        }
    }
}
