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
			'name'           => $this->faker->name(),
			'price'          => $this->faker->randomElement([123.99, 111.99, 149.99, 102.59, 138.99]),
			'wholesale_price'=> $this->faker->randomElement([13.99, 11.99, 19.99, 12.59, 18.99]),
			'sq'             => $this->faker->randomElement(['158q25', 'QWS123', '123RTY', 'WW112R', '25RTY']),
			'color'          => $this->faker->randomElement(['red', 'blue', 'green', 'black', 'orange']),
			'details'        => $this->faker->text(),
			'picture'        => $this->faker->image(),
		];
	}
}
