<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $path = Storage::putFile('posts', $request->file('image'));
        Post::create($request->only(['title' , 'description' , 'user_id']) +  ["img_name" => $path]);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all(),
        ]);
    }

    public function update(UpdatePostRequest $request,Post $post){
        $path = Storage::putFile('posts', $request->file('image'));
        Post::find($post->id)->update($request->only(['title' , 'description' , 'user_id']) + ["img_name" => $path]);
        Storage::delete($post->img_name);
        return redirect()->route('posts.index');

    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $res=Post::where('id',$post->id)->delete();
        Storage::delete($post->img_name);
        return redirect()->route('posts.index');
    }
}
