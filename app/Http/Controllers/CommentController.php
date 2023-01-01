<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
	public function index(): JsonResponse
	{
		$ALL_COMMENTS = Comment::all();

		return response()->json(['comments'=>$ALL_COMMENTS], 200);
	}

	public function get(Comment $comment): JsonResponse
	{
		return response()->json(['comment'=>$comment], 200);
	}

	// public function store(StoreCommentRequest $request)
	// {
	// 	$comment = Comment::create([
	// 		'text'=> $request->text,
	// 	]);
	// 	return response()->json(['comment'=>$comment], 201);
	// }

	public function destroy(Comment $comment)
	{
		$comment->delete();
		return response()->json(status:204);
	}
}
