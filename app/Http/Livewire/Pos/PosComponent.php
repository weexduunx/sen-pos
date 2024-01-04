<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use App\Models\Caisses;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;



class PosComponent extends Component
{
    public $montantOuverture,$montantFermeture,$hasCaisse;
    protected $rules = [
        'montantOuverture' => 'required|numeric|min:0',
    ];
     
     public function ouvrirCaisse()
    {
        $this->validate();
        $user = Auth::user();
        Caisses::create([
            'user_id' => $user->id,
            'montantOuverture' => $this->montantOuverture,
            'dateOuverture' => now(),
        ]);
        $this->emit('showToast', 'success', 'Caisse Ouverte avec succée.');

        $this->reset(['montantOuverture']);
        
        return redirect()->route('pos');
    }
    public function fermerCaisse()
    {
        $this->validate([
            'montantFermeture' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();

        // Récupérer la caisse à fermer 
        $derniereCaisse = Caisses::where('user_id', $user->id)
        ->where('etat', 1)
        ->first();
        
        if ($derniereCaisse) {
            // Vérifier si la caisse n'est pas déjà fermée
            if (!$derniereCaisse->dateFermeture) {
                // Mettre à jour la caisse avec les informations de fermeture
                $derniereCaisse->update([
                    'montantFermeture' => $this->montantFermeture,
                    'etat'  => 0,
                    'dateFermeture' => now(),
                ]);

                $this->emit('showToast', 'success', 'Caisse Fermée avec succès.');

                $this->reset(['montantFermeture']);

                return redirect()->route('pos');
            } else {
                $this->emit('showToast', 'warning', 'La caisse est déjà fermée.');
            }
        } else {
            $this->emit('showToast', 'warning', 'Aucune caisse ouverte trouvée.');
        }
    }
    public function render()
    {
        $this->hasCaisse = Caisses::where('user_id', Auth::user()->id)
                                ->where('etat', 1)
                                ->exists();
        $caisse = Caisses::where('user_id', Auth::user()->id)
                    ->where('etat', 1)->first();

        return view('livewire.pos.pos-component',['caisse' => $caisse]);
    }
}
