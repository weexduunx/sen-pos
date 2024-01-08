<?php

namespace App\Http\Livewire\Pos\Ventes;

use Livewire\Component;
use App\Models\Produit;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Caisses;
use App\Models\Vente;
use App\Models\VenteHasProduit;

use RealRashid\SweetAlert\Facades\Alert;

class Order extends Component
{
    protected $listeners = ['produitSelected','paiementEnregistre'];
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
                Alert::toast('Produit Existant dans le panier','warning');
                // $existingProduct['quantity']++;
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
            Alert::toast('Produit Enlevé avec Succées','info');
        }
        
        $this->emit('cartUpdated', $this->cart);
    }
    public function clearCart()
    {
        $this->cart = []; // Vide le tableau du panier
        Alert::toast('Panier Vidé avec Succées','info');
        $this->emit('cartUpdated', $this->cart);
    }
    private function findProductIndex($productId)
    {
        foreach ($this->cart as $index => $item) {
            if ($item['id'] == $productId) {
                return $index;
            }
        }

        return false;
    }

    public function validerVente()
    {
        // Vérifier si le panier est vide
        if (empty($this->cart)) {
            Alert::toast('Panier Vide!!', 'warning');
        } else {

            $caisse = Caisses::where('user_id', Auth::user()->id)
                ->where('etat', 1)->first();
            
            $latestVente = Vente::latest()->first();

            if ($latestVente) {
                $nextId = $latestVente->id + 1;
            } else {
                $nextId = 1;
            }

            // Enregistrement de la vente
            $vente = new Vente();

            $vente->dateVente = now(); // Utilisation de now() pour obtenir la date actuelle
            // $vente->numeroVente = 'VEN-' . $vente->dateVente->format('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            $vente->numeroVente = 'VEN-CAI-' . $caisse->id. '-' . $vente->dateVente->format('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            $vente->caisse_id = $caisse->id;
            $vente->save();
            
            $venteId = $vente->id;

            // Enregistrement des produits dans la table pivot
            foreach ($this->cart as $item) {
                VenteHasProduit::create([
                    'vente_id' => $venteId,
                    'produit_id' => $item['id'],
                    'quantiteProduit' => $item['quantity'],
                    'prixVente' => $item['price'],
                ]);
            }

            // Vous pouvez également effectuer d'autres actions nécessaires après la validation

            // Réinitialiser le panier
            // $this->clearCart();

            $this->emit('venteValidee', $venteId);

            $this->emit('openModal', 'InfosPaiement',['venteId' => $venteId]);

            // Afficher un toast de succès
            // Alert::toast('Vente Enregistrée Avec Succès', 'success');
            // $this->clearCart();

            // Vous pouvez également rediriger l'utilisateur vers une autre page ou effectuer d'autres actions nécessaires après la validation
        }
    }
    public function paiementEnregistre($venteId)
    {
        // Mettez en œuvre les actions nécessaires après l'enregistrement du paiement
        $this->venteId = $venteId;
        // Autres actions...

        // Ouvrir le modal "ShowPOS" après l'enregistrement du paiement
        $this->emit('openModal', 'ShowPOS', ['venteId' => $venteId]);
    }

    public function render()
    {

        return view('livewire.pos.ventes.order',['cart' => $this->cart,'total' => $this->calculateTotal()]);
    }
}
