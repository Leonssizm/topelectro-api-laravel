<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
	public function index(): JsonResponse
	{
		$ALL_CATEGORIES = Category::all();

		return response()->json(['Categories'=>$ALL_CATEGORIES], 200);
	}

	public function get(Category $category): JsonResponse
	{
		return response()->json(['category' => $category], 200);
	}
}
