@extends('layouts.app')

@section('content')
<section class="container">
  @if($errors->all())
      <ul class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
  @endif
  <h2 class="text-capitalize">Crea una nuova categoria</h2>
    @include('includes.admin.categories.form')
</section>
    
@endsection