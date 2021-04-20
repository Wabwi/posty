<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request) {
        //check if user already liked the post. if yes return a conflict
        if ( $post -> likedBy($request -> user()) ) {
            return response(null, 409);   
        }

        //insert like to DB
        $post -> likes() -> create([
            'user_id' => $request -> user() -> id,
        ]);

        return back();
    }

    //Deleting a like
    public function destroy(Post $post, Request $request){
        //this gets the authenticated user -> then accesses their likes -> where the id matches the post to be deleted
        $request -> user() -> likes() -> where('post_id', $post -> id) -> delete();
        return back();
    }
}