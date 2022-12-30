<?php

namespace App\Http\Controllers;

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

	public function destroy(User $user): JsonResponse
	{
		$user->delete();
		return response()->json(status: 204);
	}
}
