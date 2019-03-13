<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

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

    public function store()
    {
        Post::create(request()->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        // $post = Post::where('id',$post)->get()->first();
        // select * from posts where id=1 limit 1;
        // $post = Post::where('id',$post)->first();
        // $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post){
        Post::find($post)->update(request()->all());
        return redirect()->route('posts.index');

    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function destroy($id)
    {
        $res=Post::where('id',$id)->delete();
        return redirect()->route('posts.index');
    }
}
