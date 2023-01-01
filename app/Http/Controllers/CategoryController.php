<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(['categories'=>Category::all()], 200);
	}

	public function get(Category $category): JsonResponse
	{
		return response()->json(['category' => $category], 200);
	}

	public function destroy(Category $category): JsonResponse
	{
		$category->products()->detach();
		$category->delete();

		return response()->json(status:204);
	}
}
// TODO:
// store,
// update,
