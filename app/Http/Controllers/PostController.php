<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }


    public function index() {
        // $posts = Post::paginate(20);
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // auth()->user()->posts()->create();

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function destroy(Post $post) {
        // if (!$post->ownedBy(auth()->user())) {
        //     dd('no');
        // }

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

}
