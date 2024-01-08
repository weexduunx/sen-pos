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
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Milon\Barcode\DNS1D;

class ListeProduits extends Component
{
    use WithFileUploads;

    public
        $nomProduit,
        $description,
        $prixAchat,
        $prixVente,
        $codeProduit,
        $quatite,
        $image,
        $imageDetail,
        $detailImage,
        $alertStock,
        $categorie_id,
        $sousCategorie_id,
        $unit_id,
        $marqueProduit,
        $status,
        $produitDetails,
        $erreurMessage,
        $nomCategorie,
        $created_at,
        $idProduit,
        $barcodeImage;
    public $sousCategories = [];
    public $categories = [];
    public $show = false;
    public $mode = 'create';
    protected $rules = [
        'nomProduit' => 'required',
        'description' => 'required',
        'prixAchat' => 'required',
        'prixVente' => 'required',
        'code_produit' => 'required',
        'quatite' => 'required',
        'image' => 'image|max:1024',
        'alertStock' => 'required',
        'categorie_id' => 'required',
        'sousCategorie_id' => 'required',
        'unit_id' => 'required',
        'marqueProduit' => 'required',
        'status' => 'required',

    ];


    public function create()
    {
        try {
            $this->validate();
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
                    'code_produit' => $this->codeProduit,
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
            $this->reset();
            $this->emit('fermerModal');
            Alert::success('Produit', 'Created Successfully');
        } catch (Exception $e) {

            $this->reset();
            $this->emit('fermerModal');
            Alert::error('Error Title', $e->getMessage());
        }
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
            $this->codeProduit = $this->produitDetails->code_produit;
            $this->quatite = $this->produitDetails->quatite;
            $this->detailImage = $this->produitDetails->image;
            if ($this->produitDetails && $this->produitDetails->codeBarre) {
                $this->barcodeImage = $this->produitDetails->codeBarre->barcode_chemin_img;
            } else {
                $this->barcodeImage = null; // ou définissez une valeur par défaut
            }
            $this->alertStock = $this->produitDetails->alertStock;
            $this->sousCategorie_id = $this->produitDetails->sousCategorie_id;
            $this->nomCategorie = $this->produitDetails->categorie->nomCategorie;
            $this->unit_id = $this->produitDetails->unit_id;
            $this->marqueProduit = $this->produitDetails->marqueProduit;
            $this->status = $this->produitDetails->status;
            $this->created_at = $this->produitDetails->created_at;
            $this->emit('openDetailsModal');
        } else {
            Alert::info('Produit', 'non trouvé');
        }
    }

    public function edit($id)
    {

        $this->produitDetails = Produit::find($id);

        $this->idProduit = $id;
        $this->nomProduit = $this->produitDetails->nomProduit;
        $this->description = $this->produitDetails->description;
        $this->prixAchat = $this->produitDetails->prixAchat;
        $this->prixVente = $this->produitDetails->prixVente;
        $this->codeProduit = $this->produitDetails->code_produit;
        $this->quatite = $this->produitDetails->quatite;
        $this->imageDetail = $this->produitDetails->image;
        $this->alertStock = $this->produitDetails->alertStock;
        $this->categorie_id = $this->produitDetails->categorie_id;
        $this->sousCategorie_id = $this->produitDetails->sousCategorie_id;
        $this->unit_id = $this->produitDetails->unit_id;
        $this->marqueProduit = $this->produitDetails->marqueProduit;
        $this->status = $this->produitDetails->status;


        $this->mode = 'edit';
        $this->emit('openEditModal', $this->idProduit);
    }


    public function update()
    {
        try {
            if ($this->image instanceof UploadedFile) {
                $this->validate();
            }
            // Trouvez le produit par id
            $product = Produit::find($this->idProduit);
            // Gérer la mise à jour de l'image
            if ($this->image instanceof UploadedFile) {
                // Supprimer l'image précédente
                Storage::disk('public')->delete($product->image);

                // Stocker la nouvelle image
                $imagePath = $this->image->store('images', 'public');
            } else {
                $imagePath = $product->image;
            }
            // Mettre à jour les détails du produit
            $product->update([
                'nomProduit' => $this->nomProduit,
                'description' => $this->description,
                'prixAchat' => $this->prixAchat,
                'prixVente' => $this->prixVente,
                'code_produit' => $this->codeProduit,
                'quatite' => $this->quatite,
                'image' => $imagePath,
                'alertStock' => $this->alertStock,
                'categorie_id' => $this->categorie_id,
                'sousCategorie_id' => $this->sousCategorie_id,
                'unit_id' => $this->unit_id,
                'marqueProduit' => $this->marqueProduit,
                'status' => $this->status,
            ]);

            $this->reset();
            $this->emit('fermerModal');
            Alert::toast('Product updated successfully', 'success');
        } catch (Exception $e) {
            $this->reset();
            $this->emit('fermerModal');
            Alert::error('Error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $product = Produit::find($id);
            $product->delete();
            Alert::toast('Product deleted successfully', 'success');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
    }

    public function fermer()
    {
        $this->reset();
        $this->emit('fermerModal');
    }

    public function initOwlCarousel()
    {
        $this->emit('initOwlCarousel');
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
