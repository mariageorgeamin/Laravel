<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Post;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    //
    public function index()
    {
        return PostResource::collection(Post::paginate(2));
    }
    public function show(Post $post)
    {
        return new PostResource($post);
    }
    /*
    *
    * Instead of using type hinting we could do this instead using post id
    *
    */
    // public function show($post)
    // {
    //     return new PostResource(Post::findOrFail($post));
    // }
    public function store(StorePostRequest $request)
    {
        // dd($request);
        Post::create($request->all());
        return response()->json([
            'message' => 'Post created successfully',
        ],201);
    }
}
