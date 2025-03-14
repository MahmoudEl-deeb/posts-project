<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function index(){
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
        $users=User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        $title = request()->title;
        $description = request()->description;
        $postcreator = request()->post_creator;
        $post=new Post();
        $post->title=$title;
        $post->description=$description;
        $post->user_id=$postcreator;
        $post->save();
        return to_route('posts.index', $post->id);
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return to_route('posts.index');
    }

    public function update($id)
    {
        $title = request()->title;
        $description = request()->description;
        $postcreator = request()->id;
        $post = Post::find($id);
        $user = User::find($postcreator);

        $post->title = $title;
        $post->description = $description;
        // $post->user->name = $user->name;

        $post->user->update(['name' => $user->name]);
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

