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
		Category::factory()->count(10)->hasProducts(5)->create();
		User::factory()->count(5)->hasAddress()->create();

		for ($i = 0; $i < Product::count(); $i++)
		{
			Comment::factory()->state([
				'product_id'=> rand(1, Product::count()),
				'user_id'   => rand(1, User::count()),
			])->create();
		}
	}
}
