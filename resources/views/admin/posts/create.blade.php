@extends('layouts.app')

@section('content')
<section class="container">
  <h2 class="text-capitalize">Crea un nuovo post</h2>
    @include('includes.admin.posts.form')
</section>
    
@endsection