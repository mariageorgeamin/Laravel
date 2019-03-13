 @extends('layouts.app')

 @section('content')
    <form action="{!!route('posts.update',['post'=>$post->id])!!}" method="POST">
 @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{$post->description}}</textarea>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    </form>
@endsection
 