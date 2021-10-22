@extends('layouts.app')

@section('content')
<div class="container-sm">
    <div class="card">
     <div class="card-header">
         <h1 class="card-title text-capitalize">{{$category->name}}</h1>
     </div>
     <div class="card-body">
         <p class="card-text">{{$category->color}}</p>
         @if($category->color)
         <h4 class="badge badge-primary p-2">{{$category->name}}</h4>    
         @else
         <h4 class="badge badge-secondary p-2">Nessuna Tag</h4>           
         @endif
     </div>
     <div class="card-footer d-flex justify-content-end">
        <a href="{{route('admin.categories.index')}}" class="btn btn-secondary mr-2"> indietro</a>
        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-warning mr-2">Modifica</a>
        <form action="{{route('admin.categories.destroy',$category->id)}}" method="post" class="delete-form">
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