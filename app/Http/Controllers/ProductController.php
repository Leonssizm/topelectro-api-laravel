<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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

	public function update(UpdateProductRequest $request, Product $product): JsonResponse
	{
		if ($request->hasFile('picture'))
		{
			Storage::delete($product->picture);
			$product->picture = $this->storeImage($request);
		}
		$product->update($request->validated() + [
			'picture' => $product->picture,
		]);
		return response()->json(status: 204);
	}

	public function destroy(Product $product): JsonResponse
	{
		Storage::delete($product->picture);
		$product->delete();

		return response()->json(status: 204);
	}

	private function storeImage($request)
	{
		$newImage = uniqid() . '-' . $request->name . '.' . $request->picture->extension();
		return $request->picture->move(storage_path('app/public'), $newImage);
	}
}
