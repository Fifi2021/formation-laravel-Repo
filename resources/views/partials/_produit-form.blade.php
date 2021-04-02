@csrf
<div class="form-group">
    <label for="">Désignation</label>
    <input value="{{ old('designation') ?? $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
    
    @error('designation')
        <small class="text-danger>{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Prix</label>
    <input value="{{ old('prix') ?? $produit->prix }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
    
    @error('prix')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Poids</label>
    <input value="{{ old('poids') ?? $produit->poids}}"type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helppoids" class="text-muted">poids du produit</small>
    @error('prix')
        <small class="text-danger>{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Like</label>
    <input value="{{ old('like') ?? $produit->like }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helplike" class="text-muted">like</small>
    @error('like')
        <small class="text-danger>{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Description</label>
    <input value="{{ old('description') ?? $produit->description }}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpdesc" class="text-muted">description</small>
    @error('description')
        <small class="text-danger>{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Pays source</label>
    <select class="form-control" name="pays" id="">
        <option value="Burkina" {{ old('pays')=="Burkina" ? "selected" : ""}}>Burkina</option>
        <option value="Mali" {{ old('pays')=="Mali" ? "selected" : ""}}>Mali</option>
        <option value="Senegal" {{ old('pays')=="Senegal" ? "selected" : ""}}>Senegal</option>
    </select>  
    @error('pays')
        <small class="text-danger>{{$message}}</small>
    @enderror                      
</div>
<div class="custom-file mb-5 mt-4">
    <label class="custom-file-label" for="image">Image</label>
    <input value="{{ old('image') ?? $produit->image }}" type="file" name="image" id="" class="custom-file-input" placeholder="" aria-describedby="helpId">
    @error('image')
        <small class="text-danger>{{$message}}</small>
    @enderror
</div>
<button type="submit" class="btn btn-success btn-block btn-lg">Valider</button>    