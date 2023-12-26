<?php

namespace App\Livewire\Produits;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\sousCategories;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Http\UploadedFile;
use Exception;

class ListeProduits extends Component
{
    use WithFileUploads;

    public $nomProduit = '';
    public $description = '';
    public $prixAchat = '';
    public $prixVente = '';
    public $codeBar = '';
    public $quatite = '';
    public $image;
    public $alertStock = '';
    public $categorie_id = '';
    public $sousCategorie_id = '';
    public $unit_id = '';
    public $marqueProduit = '';
    public $status = '';
    public $sousCategories = [];
    public $categories = [];

    public function create()
    {
        $this->validate([
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

        ]);
        // try {
        // Stockage de l'image
        if ($this->image instanceof UploadedFile) { // Check if $this->image is an instance of UploadedFile
            $imagePath = $this->image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $produit = Produit::create(
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

        $produit->save();

        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => 'User Created Successfully!']
        );

        $this->resetFields();
    }

    // Ajoutez des méthodes pour la mise à jour, la suppression, etc.

    private function resetFields()
    {
        // Réinitialisez tous les champs à leurs valeurs par défaut
        $this->nomProduit = '';
        $this->description = '';
        $this->prixAchat = '';
        $this->prixVente = '';
        $this->codeBar = '';
        $this->quatite = '';
        $this->image = '';
        $this->alertStock = '';
        $this->categorie_id = '';
        $this->sousCategorie_id = '';
        $this->unit_id = '';
        $this->marqueProduit = '';
        $this->status = '';
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
