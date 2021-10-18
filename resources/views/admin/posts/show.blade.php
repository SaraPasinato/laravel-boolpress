@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="card">
         <div class="card-title">{{$post->title}}</div>
         <div class="card-body">
             <p class="card-text">{{$post->content}}</p>
             <address>{{$post->getFormattedDate('created_at')}}</address>
         </div>
        </div>
    </div>
@endsection