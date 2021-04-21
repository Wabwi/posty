<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        //retrieve a list of all the posts from the DB
        //$posts = Post::paginate(10); //retrieve posts without eager loading

        //Retrieve posts with eager loading
        $posts = Post::with(['user', 'likes']) -> paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request) {
        //validate input
        $this -> validate($request, [
            'body' => 'required',
        ]);

        //Insert input into DB - using this format( $request->user()->posts()) Laravel automatically fills in the user_id column

        // $request->user()->posts()->create([
        //     'body'=> $request -> body,
        // ]);

                    //OR
        $request -> user() -> posts() -> create($request -> only('body'));


        //Redirect back to same page
        return back();
    }

    public function destroy(Post $post) {
        $post -> delete();

        return back();
    }
}
