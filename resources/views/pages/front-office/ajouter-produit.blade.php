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
                    <form action="{{route('produit.enregistrer')}}" method="post" enctype="multipart/form-data">
                        @method("POST")
                        @include('partials._produit-form')
                    </form>                          
                </div>
        </div>
    </div>
    <br>
</x-master-layout>