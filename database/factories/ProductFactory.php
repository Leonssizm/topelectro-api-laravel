<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'name'             => $this->faker->unique()->productName,
			'price'            => $this->faker->numberBetween(100, 200),
			'wholesale_price'  => $this->faker->numberBetween(0, 99),
			'sq'               => $this->faker->unique()->SQ,
			'color'            => $this->faker->colorName,
			'details'          => $this->faker->text(),
			'picture'          => $this->faker->image(),
		];
	}
}
