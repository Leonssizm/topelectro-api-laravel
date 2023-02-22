<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

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

		$product->categories()->attach($request->category_ids);
		$product->load('categories');
		return response()->json($product, 201);
	}

	public function update(UpdateProductRequest $request, Product $product): JsonResponse
	{
		return response()->json($request->all());
		if ($request->hasFile('picture'))
		{
			File::delete('storage/' . $product->picture);
			$product->picture = $this->storeImage($request);
		}
		$product->update($request->validated() + [
			'picture' => $request->picture,
		]);
		$product->categories()->sync($request->category_ids);

		// return response()->json(status: 204);
		return 'TITO';
	}

	public function destroy(Product $product): JsonResponse
	{
		File::delete('storage/' . $product->picture);
		$product->delete();

		return response()->json(status: 204);
	}

	private function storeImage($request)
	{
		$storedImage = uniqid() . '-' . $request->name . '.' . $request->picture->extension();
		$request->picture->move('storage', $storedImage);
		return $storedImage;
	}
}
