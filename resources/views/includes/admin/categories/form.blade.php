@if($category->exists)
 <form action="{{ route('admin.categories.update',$category->id) }} " method="POST">
  @method('PATCH')
@else
 <form action="{{ route('admin.categories.store') }} " method="POST">
@endif
    @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name',$category->name)}}">
          @error('name')
          <div  class="invalid-feedback">
            Per favore inserisci il name.
          </div>
          @enderror  
        </div>
        <div class="form-group">
          <label for="color">Seleziona il colore</label>
          <select class="form-control" id="color" name="color">
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="light">Nessuna colore</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="primary">Blue</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="secondary">Gray</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="info">LightBlue</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="success">Green</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="danger">Red</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="warning">Yellow</option>
            <option @if(old('color',$category->color) == $category->color) selected  @endif value="dark">Black</option>
            @error('color')
            <div  class="invalid-feedback">
              Per favore inserisci il colore.
            </div>
            @enderror  
          
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Conferma</button>
          <a href="{{url()->previous()}}" class="btn btn-secondary">indietro</a>
          </div> 
</form>