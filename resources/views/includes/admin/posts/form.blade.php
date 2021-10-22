@if($post->exists)
 <form action="{{ route('admin.posts.update',$post->id) }} " method="POST">
  @method('PATCH')
@else
 <form action="{{ route('admin.posts.store') }} " method="POST">
@endif
    @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title',$post->title)}}">
          @error('title')
          <div  class="invalid-feedback">
            Per favore inserisci il titolo.
          </div>
          @enderror  
        </div>
        <div class="form-group">
          <label for="image">ImageUrl</label>
          <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image',$post->image)}}">
          @error('image')
          <div  class="invalid-feedback">
            Per favore inserisci il percorso assoluto all' immagine.
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="content"></label>
          <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{old('content',$post->content)}}</textarea>
          @error('content')
          <div  class="invalid-feedback">
            Per favore inserisci la descrizione.
          </div> 
          @enderror
        </div> 
        <div class="form-group">
          <label for="category_id">Seleziona la categoria</label>
          <select class="form-control" id="category_id" name="category_id">
            <option>Nessuna categoria</option>
            @foreach ($categories as $category)
              <option @if(old('category_id',$post->category_id) == $category->id) selected  @endif value="{{$category->id}}">{{$category->name}}</option>     
            @endforeach
          
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Conferma</button>
          <a href="{{url()->previous()}}" class="btn btn-secondary">indietro</a>
          </div> 
</form>