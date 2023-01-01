<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(['products'=>Product::all()], 200);
	}

	public function get(Product $product): JsonResponse
	{
		return response()->json(['product'=>$product], 200);
	}
}
