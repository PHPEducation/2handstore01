<?php

use App\User;
use App\Product;
use App\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        foreach (range(1, 1000) as $value) {
            Product::create([
                'name' => $faker->sentence(),
                'price' => rand(100000, 50000000),
                'thumbnail' => 'product' . rand(1, 25) . '.jpeg',
                'detail' => $faker->paragraph(),
                'status' => rand(0, 1),
                'user_id' => User::get()->random()->id,
                'category_id' => Category::get()->random()->id,
                'province_id' => rand(1, 705)
            ]);
        }
    }
}
