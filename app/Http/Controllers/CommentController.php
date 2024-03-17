<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request) {
        $user_id = auth()->user()->id;

        Comment::create([
            'user_id' => $user_id,
            'car_id' => $request['car_id'],
            'comment' => $request['comment'],
        ]);

        return redirect()->route('car.show', $request['car_id']);
    }

    public function update(CommentUpdateRequest $request) {
        $comment = Comment::find($request['comment_id']);

        $comment->update([
            'comment' => $request['comment'],
        ]);

        return redirect()->route('car.show', $request['car_id']);
    }

    public function destroy($car_id, $comment_id) {
        Comment::find($comment_id)->delete();

        return redirect()->route('car.show', $car_id);
    }
}
