<?php

namespace App\Http\Livewire\Pos\Produits;

use Livewire\Component;
use App\Models\Produit;

class SearchProduct extends Component
{
    public $query;
    public $produits;
    public $highlightIndex;
    public $produit = '';

    protected $listeners = ['produitSelected'];

    public function produitSelected($id)
    {
        $produits = Produit::where('id', $id)
            ->first();

        $this->query = $produits->nomProduit;
        $this->produits = [];
        $this->highlightIndex = 0;

        $this->resetComponent();
    }

    public function mount(){
        $this->resetValue();
        $this->query=$this->produit;
    }
    public function resetValue(){
        $this->query = "";
        $this->produits = [];
        $this->highlightIndex = 0;
    }

    public function resetComponent()
    {
        $this->resetValue();
        // Autres réinitialisations si nécessaire
    }
    public function incrementHighLight(){
        if ($this->highlightIndex === count($this->produits) - 1){
            $this->highlightIndex = 0;
        }
        $this->highlightIndex++;
    }
    public function decrementHighLight(){
        if($this->highlightIndex === 0){
            $this->highlightIndex = count($this->produits) - 1;
            return;
        }
        $this->highlightIndex--;
    }
    public function updatedQuery()
    {
        $this->produits = Produit::where('nomProduit', 'like', '%'. $this->query .'%')
            ->orwhere('code_produit', 'like', '%'.$this->query .'%')
            ->get();
    }

    public function render()
    {
        return view('livewire.pos.produits.search-product');
    }
}
