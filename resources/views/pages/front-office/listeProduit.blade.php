<x-master-layout>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Liste des produits</h3>
                @if (session('statuts'))                                   
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{session('statuts')}}
                    </div>
                @endif
                @if ($lesproduits->count()>0)
                    <table class="table table-hover table-stripped">
                           <thead>
                                <tr>
                                    <td>Designation</td>
                                    <td>Prix</td>
                                    <td>Pays d'origine</td>                                    
                                    <td>Actions</td>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesproduits as $prod)
                                    <tr>
                                        <td>{{$prod->designation}}</td>
                                        <td>{{$prod->prix}} X0F</td>
                                        <td>{{$prod->pays_source}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('a.produit') }}" class="btn btn-success mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                      </svg>
                                                </a>
                                                <a href="#" class="btn btn-danger mr-2" onclick="deleteConfirm('{{'produitItem'.$prod->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 18px">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <form id="{{'produitItem'.$prod->id}}" action="{{route('supp.produit', $prod->id)}}"
                                                    method="GET" style="display: none;"> @csrf</form>
                                                {{-- <a href="{{route('supp.produit', $prod->id)}}" class="btn btn-danger mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 18px">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </a> --}}
                                                <a href="{{route('ajoutercommande', $prod->id)}}" class="btn btn-info mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                      </svg>
                                                </a>
                                                <a href="{{route('produit.modifier', $prod->id)}}" class="btn btn-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('excel.export')}}" class="btn btn-success ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                              </svg>
                        </a>
                        <br>
                        {{$lesproduits->links()}}
                        
                    @else
                        <p>
                            Aucun produit n'a été retrouvé.
                        </p>
                    @endif
            </div>

            <div class="col-md-6">
                <h3>Liste des commandes</h3>
                @if (session('statut'))
                    
                    
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{session('statut')}}
                    </div>
                @endif
                    @if ($lescommandes->count()>0)
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <td>Libelle</td>
                                    <td>N° Commande</td>
                                    <td>Produit</td>
                                    <td>Prix</td>
                                                                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lescommandes as $cmd)
                                    <tr>
                                        <td>{{$cmd->libelle}}</td>
                                        <td>{{$cmd->id}}</td>
                                        <td>{{$cmd->produitCommande->designation}}</td>
                                        <td>{{$cmd->produitCommande->prix}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('supprimercommande', $cmd->id)}}" class="btn btn-danger mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 18px">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>                                            
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{$lescommandes->links()}}
                        
                    @else
                        <p>
                            Aucune commande n'a été trouvée.
                        </p>
                    @endif
            </div>
        </div>
    </div>
    <br>
</x-master-layout>