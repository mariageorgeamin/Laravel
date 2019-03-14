@extends('layouts.app')

@section('content')
<div class="container">
<br>
<center><a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a></center>
<br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->slug}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
      <div class="row">
      <div class="col-md-4">
        <a href="{!!route('posts.show',['post'=>$post->id])!!}" class="btn btn-primary">Show</a>
        </div>
        <div class="col-md-4">
        <a href="{!!route('posts.edit',['post'=>$post->id])!!}" class="btn btn-success">Edit</a>
        </div>
          <form action="{!!route('posts.destroy',['post'=>$post->id])!!}" method="post">
          @method('DELETE')
          @csrf
          <div class="col-md-4">
          <input class="btn btn-danger" type="submit" onclick="return confirm('Are you sure')" value="Delete"/>
        </div>
        </form>
      </div>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
{{$posts->links()}}
@endsection
</div>
