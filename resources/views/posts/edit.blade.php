 @extends('layouts.app')

 @section('content')
 <div class="container">
    <form action="{!!route('posts.update',['post'=>$post->id])!!}" method="POST">
 @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
            @if ($errors->has('title'))
            <div class="alert alert-danger">
            <ul>
                    <li>{{$errors->first('title')}}</li>
            </ul>
        </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{$post->description}}</textarea>
            @if ($errors->has('description'))
            <div class="alert alert-danger">
            <ul>
                    <li>{{$errors->first('description')}}</li>
            </ul>
        </div>
            @endif
        </div>

        <div class="form-group">
           <label for="exampleInputPassword1">Post Creator</label>
           <select class="form-control" name="user_id">
               @foreach($users as $user)
                @if($user->id == $post->user_id)
                   <option value="{{$user->id}}" selected>{{$user->name}}</option>
                @else
                   <option value="{{$user->id}}" >{{$user->name}}</option>
                @endif
               @endforeach
           </select>
       </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    </form>
    </div>
@endsection
 