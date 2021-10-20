@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="card">
         <div class="card-header">
             <h1 class="card-title text-capitalize">{{$post->title}}</h1>
         </div>
         <div class="card-body">
             <p class="card-text">{{$post->content}}</p>
             <address>{{$post->getFormattedDate('created_at')}}</address>
         </div>
         <div class="card-footer d-flex justify-content-end">
            <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mr-2"> indietro</a>
            <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning mr-2">Modifica</a>
            <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancella</button>
              </form>
         </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection