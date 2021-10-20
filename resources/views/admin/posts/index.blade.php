@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class=" text-center"> I miei post</h1>
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
                <td><a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-primary">Vai</a></td>
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