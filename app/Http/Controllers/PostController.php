<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Responses\PostResponse;

class PostController extends Controller
{

    public function showJson($id)
{
    $post = Post::with('user')->findOrFail($id);
    return response()->json([
        'title' => $post->title,
        'description' => $post->description,
        'username' => $post->user->name,
        'useremail' => $post->user->email,
    ]);
}
    public function index()
    {
        $posts = Post::with('user')->paginate(5);
        return view("posts.index", ["posts" => $posts]);
        // return Inertia::render('Posts/Index', [
        //     'posts' => $posts,
        // ]);
    }
    public function show($id)
{
    $post = Post::with('user')->findOrFail($id);
    
    
    return view('posts.show', ['post' => $post]);
}

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(StorePostRequest $request)
{
    
    $title = $request->title;
    $description = $request->input('description');
    $image ="";
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('post-images', 'public');
        $image = $path;
    }
    $user_id = $request->input('post_creator'); 
    Post::create([
        'title' => $title,
        'description' => $description,
        'image' => $image,
        'user_id' => $user_id
    ]);
    
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
    
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('post-images', 'public');
        $post->image = $path;
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
