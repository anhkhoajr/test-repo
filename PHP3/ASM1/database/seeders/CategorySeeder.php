<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $name = ['áo thun','áo khoác','quần ngắn','quần dài'];

        $faker = Faker::create();
        for ($i = 0; $i < 4; $i++){
            Category::create([
                'name'=> $name[$i],
                'description' => $faker->sentence,
            ]);
        }
    }
}