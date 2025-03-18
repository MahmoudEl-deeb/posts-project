<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
        $POSTs= Post::all();
        return PostResource::collection($POSTs);
    }

    public function show ($id){
        $Post= Post::findOrFail($id);
        return new PostResource($Post);
    }

    public function store(StorePostRequest $request){
        $title = $request->title;
        $description = $request->input('description');
    $image = "";
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('post-images', 'public');
        $image = $path;
    }
    $user_id = $request->input('post_creator');
    $post= Post::create([
        'title' => $title,
        'description' => $description,
        'image' => $image,
        'user_id' => $user_id
    ]);
    return new PostResource($post);

}
}


