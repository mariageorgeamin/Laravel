@extends('layouts.app')

@section('content')
<div class="container">
<br>
<div class="card">
  <h5 class="card-header">Post info</h5>
  <div class="card-body">
    <h5 class="card-title">Title:- {{$post->title}}</h5>
    <p class="card-text">Description:- {{$post->description}}</p>
  </div>
</div>
<div class="card">
  <h5 class="card-header">Post creator info</h5>
  <div class="card-body">
    <h5 class="card-title">Name:-{{ isset($post->user) ? $post->user->name : 'Not Found'}}</h5>
    <p class="card-text">Email:- {{ isset($post->user) ? $post->user->email : 'Not Found'}}</p>
    <p class="card-text">Created at:- {{$post->created_at->format('l jS \of F Y h:i:s A')}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
      
@endsection
