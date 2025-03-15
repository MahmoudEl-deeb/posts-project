<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::paginate(5);
        return view("posts.index", ["posts" => $posts]);
    }
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(StorePostRequest $request)
{
    $post = new Post();
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    $post->user_id = $request->input('post_creator'); // Map post_creator to user_id
    $post->save();
    
    return to_route('posts.index');
}

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return to_route('posts.index');
    }

    public function update(StorePostRequest $request, $id)
{
    $post = Post::find($id);
    if (!$post) {
        return to_route('posts.index');
    }
    
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    
    // Only update user relationship if post_creator is provided
    if ($request->has('post_creator')) {
        $post->user_id = $request->input('post_creator');
    }
    
    $post->save();
    return to_route('posts.index');
}
    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.update', ['post' => $post, 'users' => $users]);
    }
    public function confirmDelete($id)
    {
        $post = Post::find($id);
        return view('posts.delete', compact('post'));
    }
}
