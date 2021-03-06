@extends('layouts.app')

@section('content')
    <div class="container">
      @if(session('alert-msg'))
        <div class="alert alert-{{session('alert-type')}}">
          {{session('alert-msg')}}
        </div>
      @endif
        <header class="my-5 d-flex justify-content-between align-items-center">
          <h1 class=" text-center"> I miei post</h1>
          <a href="{{route('admin.posts.create')}}" class="btn btn-success">Nuovo Post</a>
        </header>
        <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Autore</th>
                <th scope="col">Scritto il </th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
            <tr class="text-center">
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                   @if($post->category)
                  <h4 class="badge badge-{{$post->category->color}} p-2">{{$post->category->name}}</h4>    
                  @else
                  <h4 class="badge badge-light p-2">Nessuna categoria</h4>       
                  @endif
                </td>
                <td>
                  @forelse ($post->tags as $tag)
                  <h4 class="badge  p-2" style="background-color:{{$tag->color}}">{{$tag->name}}</h4>      
                  @empty
                  <h4 class="badge bg-light border border-dark p-2" >Nessun tag</h4>      
      
                  @endforelse
                </td>
                <td>@if ($post->user){{$post->user->name}} @else anonimo @endif</td>
                <td>{{$post->getFormattedDate('created_at')}}</td>
                <td class="d-flex justify-content-center">
                  <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-primary mr-2">Vai</a>
                  <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning mr-2">Modifica</a>
                  <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" class="delete-form">
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
              <td colspan="7" ><div class="paginate row justify-content-center align-items-center">{{$posts->links()}}</div></td>
            </tfoot>
          </table>

          <hr>
          <section id="by-category-views" class="mt-5">
             <h2 class="text-secondary text-capitalize text-center mb-5"> vista per categorie</h2>
              <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 text-center">
                      <ul class="list-group list-group-flush mt-1">
                         <h4 class="text-center font-weight-bolder">{{$category->name}}
                            <span class="badge bg-info rounded-pill font-weight-normal ml-5">{{count($category->posts)}}</span>
                          </h4>
                        
                         @forelse ($category->posts as $post)
                              <li class="list-group-item text-center pt-1">
                                <p><a class="text-dark" href="{{route('admin.posts.show',$post->id)}}">{{$post->title}}</a></p>
                              </li>
                        @empty
                            <li class="list-group-item text-center"><p>Nessun risultato per {{$category->name}} </p></li>
                        @endforelse
                      </ul>
                    </div>
                @endforeach
              </div>
          </section>
    </div>
@endsection

@section('scripts')

<script src="{{asset('js/confirm.js')}}"></script>
@endsection