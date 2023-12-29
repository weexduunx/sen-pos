<?php

namespace App\Http\Livewire\Produits;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\sousCategories;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Http\UploadedFile;
use Exception;

class ListeProduits extends Component
{
    use WithFileUploads;

    public $nomProduit;
    public $description;
    public $prixAchat;
    public $prixVente;
    public $codeBar;
    public $quatite;
    public $image;
    public $detailImage;
    public $alertStock;
    public $categorie_id;
    public $sousCategorie_id;
    public $unit_id;
    public $marqueProduit;
    public $status;
    public $sousCategories = [];
    public $categories = [];
    public $produitDetails;
    public $erreurMessage;
    public $show = false;
    public $nomCategorie;
    public $created_at;
    public $idProduit;

    protected $rules = [
        'nomProduit' => 'required',
        'description' => 'required',
        'prixAchat' => 'required',
        'prixVente' => 'required',
        'codeBar' => 'required',
        'quatite' => 'required',
        'image' => 'image|max:1024',
        'alertStock' => 'required',
        'sousCategorie_id' => 'required',
        'unit_id' => 'required',
        'marqueProduit' => 'required',
        'status' => 'required',
    ];


    public function create()
    {
        $this->validate();
        // Stockage de l'image
        if ($this->image instanceof UploadedFile) {
            $imagePath = $this->image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Produit::create(
            [
                'nomProduit' => $this->nomProduit,
                'description' => $this->description,
                'prixAchat' => $this->prixAchat,
                'prixVente' => $this->prixVente,
                'codeBar' => $this->codeBar,
                'quatite' => $this->quatite,
                'image' => $imagePath,
                'alertStock' => $this->alertStock,
                'categorie_id' => $this->categorie_id,
                'sousCategorie_id' => $this->sousCategorie_id,
                'marqueProduit' => $this->marqueProduit,
                'unit_id' => $this->unit_id,
                'status' => $this->status,
            ]

        );


        $this->resetFields();
    }


    public function details($id)
    {

        $produit = Produit::find($id);

        // Vérifier si le produit a été trouvé
        if ($produit) {
            $this->produitDetails = $produit;
            $this->idProduit = $produit->id;
            $this->nomProduit = $produit->nomProduit;
            $this->description = $produit->description;
            $this->prixAchat = $produit->prixAchat;
            $this->prixVente = $produit->prixVente;
            $this->codeBar = $produit->codeBar;
            $this->quatite = $produit->quatite;
            $this->detailImage = $produit->image; // Assurez-vous d'ajuster le chemin

            $this->alertStock = $produit->alertStock;
            $this->sousCategorie_id = $produit->sousCategorie_id;
            $this->nomCategorie = $produit->categorie->nomCategorie;
            $this->unit_id = $produit->unit_id;
            $this->marqueProduit = $produit->marqueProduit;
            $this->status = $produit->status;
            $this->created_at = $produit->created_at;
            $this->emit('openDetailsModal',);
        } else {
            abort(404, 'Produit non trouvé');
        }
    }
    public function fermer()
    {
        $this->emit('fermerModal');
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->nomProduit = null;
        $this->description = null;
        $this->prixAchat = null;
        $this->prixVente = null;
        $this->codeBar = null;
        $this->quatite = null;
        $this->image = null;
        $this->alertStock = null;
        $this->sousCategorie_id = null;
        $this->unit_id = null;
        $this->marqueProduit = null;
        $this->status = null;
    }

    public function render()
    {
        $produits = Produit::all();
        $this->categories = Categorie::all();
        $this->sousCategories = sousCategories::all();
        return view('livewire.produits.liste-produits', [
            'produits' => $produits
        ]);
    }
}
