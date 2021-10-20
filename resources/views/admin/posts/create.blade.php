@extends('layouts.app')

@section('content')
<section class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <h2 class="text-capitalize">inserisci un nuovo post</h2>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="image">ImageUrl</label>
              <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="content"></label>
              <textarea class="form-control" id="content" name="content" rows="6"></textarea>
            </div> 
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Crea</button>
            <a href="{{url()->previous()}}" class="btn btn-secondary">indietro</a>

            </div> 
    </form>
</section>
    
@endsection