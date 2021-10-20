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
          <div  class="invalid-feedback">
            Per favore inserisci il titolo.
          </div>
        </div>
        <div class="form-group">
          <label for="image">ImageUrl</label>
          <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image',$post->image)}}">
          <div  class="invalid-feedback">
            Per favore inserisci il percorso assoluto all' immagine.
          </div>
        </div>
        <div class="form-group">
          <label for="content"></label>
          <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{old('content',$post->content)}}</textarea>
          <div  class="invalid-feedback">
            Per favore inserisci la descrizione.
          </div>
        </div> 
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Conferma</button>
          <a href="{{url()->previous()}}" class="btn btn-secondary">indietro</a>
          </div> 
</form>