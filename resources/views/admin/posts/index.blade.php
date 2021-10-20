@extends('layouts.app')

@section('content')
    <div class="container">
      @if(session('alert-msg'))
        <div class="alert alert-{{session('alert-type')}}">
          {{session('alert')}}
        </div>
      @endif
        <header class="my-5 d-flex justify-content-between align-items-center">
          <h1 class=" text-center"> I miei post</h1>
          <a href="{{route('admin.posts.create')}}" class="btn btn-success">Nuovo Post</a>
        </header>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Scritto il </th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->getFormattedDate('created_at')}}</td>
                <td class="d-flex justify-content-center">
                  <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-primary mr-2">Vai</a>
                  <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning mr-2">Modifica</a>
                  <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancella</button>
                  </form>
                </td>
                
              </tr>
            @empty
              <tr><td colspan="3" class="text-center"> Non ci sono posts al momento</td></tr>
            @endforelse
               
            </tbody>
            <tfoot>
              <tr ><td colspan="3" ><div class="paginate d-flex justify-content-center">{{$posts->links()}}</div></td></tr>
            </tfoot>
          </table>
    </div>
@endsection