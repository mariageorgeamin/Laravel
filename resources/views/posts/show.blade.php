@extends('layouts.app')

@section('content')
<div class="container">
<br>
<div class="card">
  <h5 class="card-header">Post info</h5>
  <div class="card-body">
    <h5 class="card-title">Title:- {{$post->title}}</h5>
    <p class="card-text">Description:- {{$post->description}}</p>
    <div class="panel-body">Image: <img src = "{{Storage::url($post->img_name)}}" width="100" height="100"></div>
  </div>
</div>
<div class="card">
  <h5 class="card-header">Post creator info</h5>
  <div class="card-body">
    <h5 class="card-title">Name:-{{ isset($post->user) ? $post->user->name : 'Not Found'}}</h5>
    <p class="card-text">Email:- {{$post->user->email}}</p>
    <p class="card-text">Created at:- {{$post->human_readable_date}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
      
@endsection
