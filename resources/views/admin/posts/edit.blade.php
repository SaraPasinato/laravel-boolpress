@extends('layouts.app')

@section('content')
<section class="container">
    <h2 class="text-capitalize">Modifica un nuovo post</h2>
    <form action="{{ route('admin.posts.update',$post->id) }} " method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label for="image">ImageUrl</label>
              <input type="text" class="form-control" id="image" name="image" value="{{$post->image}}">
            </div>
            <div class="form-group">
              <label for="content"></label>
              <textarea class="form-control" id="content" name="content" rows="6">{{$post->content}}</textarea>
            </div> 
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Conferma</button>
              <a href="{{url()->previous()}}" class="btn btn-secondary">indietro</a>
              </div> 
    </form>
</section>
    
@endsection