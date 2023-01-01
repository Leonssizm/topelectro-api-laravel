<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
	public function index(): JsonResponse
	{
		$ALL_ADDRESS = Address::all();

		return response()->json(['addresses'=>$ALL_ADDRESS], 200);
	}

	public function get(Address $address): JsonResponse
	{
		return response()->json(['address'=>$address], 200);
	}

	public function destroy(Address $address): JsonResponse
	{
		$address->delete();

		return response()->json(['address'=>$address], 204);
	}
}
