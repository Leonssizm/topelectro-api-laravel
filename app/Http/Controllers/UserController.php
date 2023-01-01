<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
	public function index()
	{
		return response()->json(User::all(), 200);
	}

	public function get(User $user): JsonResponse
	{
		return response()->json(['user'=>$user], 200);
	}

	// public function address($id)
	// {
	// 	$address = User::find($id)->address;

	// 	return response()->json(['address' => $address], 200);
	// }
	// --> retrieve individual user and address like: "user": {*users info* & *address*}

	public function store(StoreUserRequest $request): JsonResponse
	{
		$user = User::create([
			'name'    => $request->name,
			'email'   => $request->email,
			'password'=> $request->password,
		]);

		return response()->json(['user'=>$user], 201);
	}

	public function update(UpdateUserRequest $request, User $user)
	{
		$user->update([
			'name'    => $request->name,
			'email'   => $request->email,
			'password'=> $request->password,
		]);

		return response()->json(status: 204);
	}

	public function destroy(User $user): JsonResponse
	{
		$user->delete();
		return response()->json(status: 204);
	}
}
