<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;

class MainController extends Controller
{
    //
    public function AfficheAccueil()
    {

        return view('pages.front-office.welcome',
            [
                'nomsite'=>'Service en ligne du MENPTD',
                'nomMinistere'=>'Ministère Economique Numerique des Poste et de la transformation Digitale',
            ]
        );

    }

    public function AfficheProc($param)
    {
        //dd($param);
            return view('pages.front-office.procedure',
            [
                'parametre'=>$param
            
            ]
        );
        
    }

    //fonction de creation de nouveux produit
    public function ajoutProduit()
    {
        $prod = new Produit();
        $prod->uuid = Str::uuid();
        $prod->designation='Ingredients';
        $prod->description=' Lorem ';
        $prod->prix='1000';
        $prod->like='21';
        $prod->pays_source='Burkina Faso';
        $prod->poids='45.10';
        $prod->save();    
    }

    public function ajouterProduit()
    {
        
        return view('pages.front-office.ajouter-produit');
    }

    public function enregistrerProduit(ProduitFormRequest $request)
    {
        
        $prod = new Produit();
        $prod->uuid = Str::uuid();
        $prod->designation=$request->designation;
        $prod->description=$request->description;
        $prod->prix=$request->prix;
        $prod->like=$request->like;
        $prod->poids=$request->poids;
        $prod->pays_source=$request->pays;
        $prod->created_at=now();        
        $prod->save();
        return redirect()->back()->with('statuts','produit ajouté avec succès');
        
    }

    public function editProduit(Produit $produit)
    {
        dd($produit);

        //$produit= Produit::find($id);
        return view('pages.front-office.edit-produit',['produit'=>$produit]);        
    }

    public function updatProduit(ProduitFormRequest $request,$id)
    {
        Produit::where("id",$id)->update([
            'designation'=>$request->designation,
            'description'=>$request->description,
            'prix'=>$request->prix,
            'like'=>$request->like,
            'pays_source'=>$request->pays,
            'poids'=>$request->poids
        ]);

        return redirect()->route("liste.produit")->with('statuts','le produit a été modifié avec succès');
    }


    public function ajoutProduitEncore()
    {
        Produit::create(
            [
                'uuid' => Str::uuid(),
                'designation'=>'Papaye Solo',
                'description'=>' Lorem Lorem Lorem',
                'prix'=>500,
                'like'=>21,
                'pays_source'=>'Senegal ',
                "poids"=>45.10
            ]
        );  
       
    }


    public function getListe()
    {
        $produits= Produit::paginate(5);
        $commandes= Commande::paginate(5);

        $premierproduit=Produit::first();

        $premieruser=User::first();

        $users=$premierproduit->Usersproduit;

        //$produits=$premieruser->Produitsuser;

        //insertion dans la table intermediaire 
        //$premierproduit->Usersproduit()->attach($premieruser->id);

        //dd($premierproduit,$premieruser,$produits);

        return view("pages.front-office.listeProduit",
                        ['lesproduits'=>$produits,
                        'lescommandes'=>$commandes
                        ]
                    );
    }


    public function updateProduit($id)
    {
        //$produit= Produit::where("id",$id);
        //$produit->designation='pomme cannelle';
        //$produit->description='trop bonne et sucrée';
        //$produit->update();

        $produitmodif= Produit::where("id",$id)->update(
                [
                    "designation" =>"pomme cannelle",
                    "description" =>"trop bonne et sucrée"
                ]
            );

            dd($produitmodif);        
    }

    public function supProduit($id)
    {
        //$produitsupp = Produit::find($id);

        Produit::destroy($id);

        //dd($produitsupp);
        //$produitsupp->delete();
        return redirect()->back()->with('statuts','supprimé avec succès');
    }

    public function ajouterCommande($id)
    {
        $commande = new Commande();
        $commande->uuid = Str::uuid();
        $commande->id_produit= $id;
        $commande->libelle= 'achat de papayes';
        $commande->save();

        //dd($commande);
        return redirect()->back()->with('statut','Commande ajoutée avec succès');      
    }
    
    public function supprimerCommande($id)
    {
        Commande::destroy($id);        
        return redirect()->back()->with('statut','Commande supprimée avec succès');    
    }

    public function excelExport()
    {
        //dd('ok');
        return Excel::download(new ProduitsExport, "Produits.xls");
    }

    


}
