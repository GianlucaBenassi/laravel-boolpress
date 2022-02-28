<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // validation
        $validator = Validator::make($data, [
            'name' => 'nullable|string|max:50',
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ], 400);
        }

        // store data
        $newComment = new Comment;
        if (!empty($data['name'])) {
            $newComment->name = $data['name'];
        }
        $newComment->content = $data['content'];
        $newComment->post_id = $data['post_id'];
        $newComment->save();

        // response
        return response()->json([
            "success" => true
        ]);
    }
}
