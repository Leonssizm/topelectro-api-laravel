<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(Product::all(), 200);
	}

	public function get(Product $product): JsonResponse
	{
		return response()->json($product, 200);
	}

	public function store(StoreProductRequest $request): JsonResponse
	{
		$product = Product::create([
			'name'           => $request->name,
			'price'          => $request->price,
			'wholesale_price'=> $request->wholesale_price,
			'sq'             => $request->sq,
			'color'          => $request->color,
			'details'        => $request->details,
			'picture'        => $this->storeImage($request),
		]);
		return response()->json($product, 201);
	}

	public function update(StoreProductRequest $request, Product $product)
	{
		$product->update($request->validated());
		return response()->json(status: 204);
	}

	public function destroy(Product $product): JsonResponse
	{
		$product->delete();

		return response()->json(status: 204);
	}

	private function storeImage($request)
	{
		$newImage = uniqid() . '-' . $request->name . '.' . $request->picture->extension();
		return $request->picture->move(storage_path('app/public'), $newImage);
	}
}
