@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="card">
         <div class="card-header">
             <h1 class="card-title text-capitalize">{{$post->title}}</h1>
         </div>
         <div class="card-body">
             <p class="card-text">{{$post->content}}</p>
             <address class="card-text font-italic">Creato da : {{$post->user->name}}</address>
             <address>{{$post->getFormattedDate('created_at')}}</address>
             @if($post->category)
             <h4 class="badge badge-{{$post->category->color}} p-2">{{$post->category->name}}</h4>    
             @else
             <h4 class="badge badge-light p-2">Nessuna categoria</h4>    
                 
             @endif
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