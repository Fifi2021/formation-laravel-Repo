<x-master-layout>
    <a href="{{ route('liste.produit') }}" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg>
    </a>

    <div class="container">
        <div class="row">
            
                <div class="col-md-6 offset-md-3">
                    <h1 >Ajout d'un nouveau Produit</h1>  
                    @if (session('statuts'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{session('statuts')}}
                        </div>
                    @endif                                
                    <form action="{{route('produit.enregistrer')}}" method="post">
                        @method("POST")
                        @csrf
                        <div class="form-group">
                            <label for="">Désignation</label>
                            <input value="{{ old('designation') }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpdesign" class="text-muted">Veuillez renseigner ce champ</small>
                            @error('designation')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Prix</label>
                            <input value="{{ old('prix') }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpprix" class="text-muted">prix du produit</small>
                            @error('prix')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Poids</label>
                            <input value="{{ old('poids') }}"type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helppoids" class="text-muted">poids du produit</small>
                            @error('prix')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Like</label>
                            <input value="{{ old('like') }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helplike" class="text-muted">like</small>
                            @error('like')
                                <small class="text-danger>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input value="{{ old('description') }}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                            @error('pay')
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