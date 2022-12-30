<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();

		// \App\Models\User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);
		// Product::factory()->count(50);
		Category::factory()->count(10)->hasProducts(5)->create();
		User::factory()->count(5)->hasAddress(1)->create();

		for ($i = 0; $i < 50; $i++)
		{
			Comment::factory()->state([
				'product_id'=> rand(1, 50),
				'user_id'   => rand(1, 5),
			])->create();
		}
	}
}
