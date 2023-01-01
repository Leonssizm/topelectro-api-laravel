<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
	public function index(): JsonResponse
	{
		$ALL_PRODUCTS = Product::all();

		return response()->json(['Products'=>$ALL_PRODUCTS], 200);
	}

	public function get(Product $product): JsonResponse
	{
		return response()->json(['Product'=>$product], 200);
	}

	// public function destroy(Product $product): JsonResponse
	// {
	// 	$product->delete();

	// 	return response()->json(status:204);
	// }
}
