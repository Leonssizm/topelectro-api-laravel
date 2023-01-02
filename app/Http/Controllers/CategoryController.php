<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(Category::all(), 200);
	}

	public function get(Category $category): JsonResponse
	{
		return response()->json($category, 200);
	}

	public function store(StoreCategoryRequest $request): JsonResponse
	{
		$category = Category::create([
			'name'       => $request->name,
			'description'=> $request->description,
		]);

		return response()->json($category, 201);
	}

	public function update(StoreCategoryRequest $request, Category $category)
	{
		$category->update([
			'name'       => $request->name,
			'description'=> $request->description,
		]);
		return response()->json(status: 204);
	}

	public function destroy(Category $category): JsonResponse
	{
		$category->products()->detach();
		$category->delete();

		return response()->json(status:204);
	}
}
