 @extends('layouts.app')

 @section('content')
 <div class="container">
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
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
            <textarea name="description" class="form-control"></textarea>
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
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('user_id'))
            <div class="alert alert-danger">
            <ul>
                    <li>{{$errors->first('user_id')}}</li>
            </ul>
        </div>
            @endif
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection
 