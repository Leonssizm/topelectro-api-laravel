<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(['comments'=>Comment::all()], 200);
	}

	public function get(Comment $comment): JsonResponse
	{
		return response()->json(['comment'=>$comment], 200);
	}

	public function destroy(Comment $comment): JsonResponse
	{
		$comment->delete();
		return response()->json(status:204);
	}
}
