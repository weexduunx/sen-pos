<?php

namespace App\Http\Livewire\Pos\Ventes;

use Livewire\Component;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Component
{
    protected $listeners = ['produitSelected'];
    public $idProduit, $produit;
    public $produits;
    public $cart = [];
    public function produitSelected($id){
        $this->idProduit = $id;
        //  $this->produit = Produit::where('id', $id)->first();
        $produit = Produit::find($id);

        if ($produit) {
            // Vérifier si le produit est déjà dans le panier
            $existingProduct = collect($this->cart)->firstWhere('id', $produit->id);

            if ($existingProduct) {
                // Si le produit existe déjà, incrémenter la quantité
                $existingProduct['quantity']++;
            } else {
                // Sinon, ajouter le produit au panier avec une quantité initiale de 1
                $this->cart[] = [
                    'id' => $produit->id,
                    'name' => $produit->nomProduit,
                    'price' => $produit->prixVente,
                    'image' => $produit->image,
                    'codeBar' => $produit->codeBar,
                    'quantity' => 1,
                    // Ajoutez d'autres informations du produit selon vos besoins
                ];
            }
        }
    }
    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }

    public function incrementQuantity($productId)
    {
        $index = $this->findProductIndex($productId);

        if ($index !== false) {
            $this->cart[$index]['quantity']++;
        }

        $this->emit('cartUpdated', $this->cart);
    }

    public function decrementQuantity($productId)
    {
        $index = $this->findProductIndex($productId);

        if ($index !== false && $this->cart[$index]['quantity'] > 1) {
            $this->cart[$index]['quantity']--;
        }

        $this->emit('cartUpdated', $this->cart);
    }
    public function removeProduct($productId)
    {
        $index = $this->findProductIndex($productId);

        if ($index !== false) {
            unset($this->cart[$index]);
        }

        $this->emit('cartUpdated', $this->cart);
    }
    public function clearCart()
    {
        $this->cart = []; // Vide le tableau du panier
        $this->emit('cartUpdated', $this->cart);
    }

    // public function updatedCart($value, $index)
    // {
    //     // Assurez-vous que la quantité est au moins égale à 1
    //     $this->cart[$index]['quantity'] = max(1, $value);
    //     $this->emit('cartUpdated', $this->cart);
    // }
 
    private function findProductIndex($productId)
    {
        foreach ($this->cart as $index => $item) {
            if ($item['id'] == $productId) {
                return $index;
            }
        }

        return false;
    }

    public function render()
    {

        return view('livewire.pos.ventes.order',['cart' => $this->cart,'total' => $this->calculateTotal()]);
    }
}
