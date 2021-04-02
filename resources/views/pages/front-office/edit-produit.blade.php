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
                <form action="{{route('produit.updat',$produit->id)}}" method="post" class="form-horizontal form-bordered">
                    @method("PUT")
                    @include('partials._produit-form')
                </form>                          
            </div>
        </div>
    </div>
    <br>
</x-master-layout>