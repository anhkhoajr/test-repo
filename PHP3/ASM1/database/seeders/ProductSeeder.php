<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\products; // Sử dụng tên lớp đúng
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $img = ['sp1.png', 'sp2.png', 'sp3.png', 'sp4.png',
                'sp5.png', 'sp6.png', 'sp7.png', 'sp8.png', 'sp9.png', 'sp10.png',];
    
    
        for ($i = 0; $i < 50; $i++) {
            products::create([
                'name' => $faker->word,
                'img' => $faker->randomElement($img),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'sold' => $faker->numberBetween(1, 100),
                'view' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 4),
            ]);
        }
    }
}


