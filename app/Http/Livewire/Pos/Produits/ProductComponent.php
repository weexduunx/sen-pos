<?php

namespace App\Http\Livewire\Pos\Produits;

use Livewire\Component;
use App\Models\Produit;

class ProductComponent extends Component
{
    public $products;
    public $activeCategoryId;

    protected $listeners = ['categorySelected' => 'setActiveCategory'];


    public function setActiveCategory($categoryId)
    {
        $this->activeCategoryId = $categoryId;
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Produit::where('categorie_id', $this->activeCategoryId)->get();
    }
    public function addProductToCart($id)
    {
        $this->emit('produitSelected', $id);
    }
    public function render()
    {  
        return view('livewire.pos.produits.product-component',[
            'products' => $this->products,
        ]);
    }
}
