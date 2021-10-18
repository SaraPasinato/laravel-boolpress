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
         <div class="card-footer text-right">
            <a href="{{route('admin.posts.index')}}" class="btn btn-secondary"> indietro</a>
         </div>
        </div>
    </div>
@endsection