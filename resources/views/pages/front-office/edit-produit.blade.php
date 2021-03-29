<x-master-layout>

    <div class="container">
        <div class="row">
            
                <div class="col-md-6 offset-md-3">
                    <h1 >Modification d'un Produit</h1>  
                    @if (session('statuts'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{session('statuts')}}
                        </div>
                    @endif                                
                    <form action="{{route('produit.updat'),$produit->id}}" method="post" class="form-horizontal form-bordered">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label for="">Désignation</label>
                            <input value="{{ $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            @error('designation')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Prix</label>
                            <input value="{{ $produit->prix }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                           
                            @error('prix')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Poids</label>
                            <input value="{{ $produit->poids}}"type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helppoids" class="text-muted">poids du produit</small>
                            @error('prix')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Like</label>
                            <input value="{{ $produit->like }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helplike" class="text-muted">like</small>
                            @error('like')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input value="{{ $produit->description }}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                        <button type="submit" class="btn btn-success btn-block btn-lg">Valider</button>    
                    </form>                          
                </div>
        </div>
    </div>
    <br>
</x-master-layout>