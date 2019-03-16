<?php

// CommentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $product = Product::find($request->get('product_id'));
        $product->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)

    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $product = Product::find($request->get('product_id'));

        $product->comments()->save($reply);

        return back();

    }
    public function delete(Request $request){
        $id = $request->comment_id;
        Comment::where('parent_id',$id)->delete();
        Comment::where('id',$id)->delete();
        return back();
    }

    
}