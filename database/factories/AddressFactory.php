<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'city'       => $this->faker->randomElement(['Kutaisi', 'Tbilisi', 'Khashuri', 'Ambrolauri', 'Batumi']),
			'street'     => $this->faker->randomElement(['Chavchavadze N6', 'Samgori N3', 'Rustaveli N14', 'TitoZarkuas N7', 'LucyZarkuas N3']),
			'postal_code'=> $this->faker->randomElement([1058, 1090, 5852, 2555, 1225]),
		];
	}
}
