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

    public function initOwlCarousel()
    {
        $this->emit('initOwlCarousel');
    }
    public function details($id)
    {

        $this->produitDetails = Produit::find($id);

        // Vérifier si le produit a été trouvé
        if ($this->produitDetails) {
            $this->idProduit = $this->produitDetails->id;
            $this->nomProduit = $this->produitDetails->nomProduit;
            $this->description = $this->produitDetails->description;
            $this->prixAchat = $this->produitDetails->prixAchat;
            $this->prixVente = $this->produitDetails->prixVente;
            $this->codeBar = $this->produitDetails->codeBar;
            $this->quatite = $this->produitDetails->quatite;
            $this->detailImage = $this->produitDetails->image; // Assurez-vous d'ajuster le chemin
            $this->alertStock = $this->produitDetails->alertStock;
            $this->sousCategorie_id = $this->produitDetails->sousCategorie_id;
            $this->nomCategorie = $this->produitDetails->categorie->nomCategorie;
            $this->unit_id = $this->produitDetails->unit_id;
            $this->marqueProduit = $this->produitDetails->marqueProduit;
            $this->status = $this->produitDetails->status;
            $this->created_at = $this->produitDetails->created_at;
            $this->emit('openDetailsModal');
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
