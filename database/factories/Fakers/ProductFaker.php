<?php

namespace Database\Factories\fakers;

use Faker\Provider\Base;

class ProductFaker extends Base
{
	private static $PRODUCT_DATA;

	public function __construct()
	{
		$dataFilePath = 'database/factories/Fakers/json/ProductData.json';
		$fakerDataJson = file_get_contents($dataFilePath);
		self::$PRODUCT_DATA = json_decode($fakerDataJson);
	}

	# Custom Properties

	public function productName(): string
	{
		return static::randomElement(self::$PRODUCT_DATA->names);
	}

	public function productMaterial(): string
	{
		return static::randomElement(self::$PRODUCT_DATA->materials);
	}

	public function SQ(): string
	{
		return random_int(1000, 9999) . '-' . random_int(1000, 9999);
	}

	public function categoryName(): string
	{
		return static::randomElement(self::$PRODUCT_DATA->category_names);
	}
}
