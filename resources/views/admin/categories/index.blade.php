@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('alert-msg'))
      <div class="alert alert-{{session('alert-type')}}">
        {{session('alert-msg')}}
      </div>
    @endif
      <header class="my-5 d-flex justify-content-between align-items-center">
        <h1 class=" text-center"> Le mie categorie</h1>
        <a href="{{route('admin.categories.create')}}" class="btn btn-success text-capitalize">Nuova categoria</a>
      </header>
      <table class="table">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Colore</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          @forelse ($categories as $category)
          <tr class="text-center">
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td><span class="badge p-2 bg-{{$category->color}} @if($category->color =='dark' || $category->color =='secondary') text-light @else text-dark @endif">{{$category->color}}</span></td>
              <td class="d-flex justify-content-center">
                <a href="{{route('admin.categories.show',$category->id)}}" class="btn btn-primary mr-2">Vai</a>
                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-warning mr-2">Modifica</a>
                <form action="{{route('admin.categories.destroy',$category->id)}}" method="post" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Cancella</button>
                </form>
              </td>
              
            </tr>
          @empty
            <tr><td colspan="3" class="text-center"> Non ci sono categorie al momento</td></tr>
          @endforelse   
          </tbody>
        </table>
  </div> 
@endsection

@section('scripts')

<script src="{{asset('js/confirm.js')}}"></script>
@endsection