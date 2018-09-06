<?php

use App\User;
use App\Comment;
use App\Product;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();

        foreach ($users as $user) {
            $temps = rand(1, 10);
            foreach (range(1, $temps) as $temp) {
                Comment::create([
                    'user_id' => $user->id,
                    'product_id' => Product::get()->random()->id,
                    'content' => $faker->sentence(),
                    'parent_id' => null
                ]);
            }
        }
    }
}
