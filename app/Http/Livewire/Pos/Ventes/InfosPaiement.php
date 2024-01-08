<?php

namespace App\Http\Livewire\Pos\Ventes;

use Livewire\Component;
use App\Models\ModePaiement;
use App\Models\VenteHasModePaiement;
use RealRashid\SweetAlert\Facades\Alert;

class InfosPaiement extends Component
{
    public $modesPaiement = [];

    public $venteId;
    protected $listeners = ['venteValidee'];

    public function venteValidee($venteId)
    {
        // Mettez en œuvre les actions nécessaires après la validation de la vente
        // Vous pouvez utiliser $venteId ici
        $this->venteId = $venteId;
        // Autres actions...
    }

    public function addModePaiement()
    {
        $this->modesPaiement[] = ['mode_id' => null, 'montant' => 0];
    }

    public function removeModePaiement($index)
    {
        unset($this->modesPaiement[$index]);
        $this->modesPaiement = array_values($this->modesPaiement);
    }

    // public function enregistrerPaiement()
    // {
    //     // Récupérer l'ID de la vente qui a été émis lors de la validation précédente
    //     $venteId = $this->venteId;

    //     // Récupérer les informations sur le mode de paiement depuis le composant InformationsPaiement
    //     $informationsPaiement = $this->get('InformationsPaiement');
    //     $modesPaiement = $informationsPaiement['modesPaiement'];

    //     // Enregistrement des modes de paiement
    //     foreach ($modesPaiement as $modePaiement) {
    //         VenteHasModeDePaiement::create([
    //             'vente_id' => $venteId,
    //             'modePaiement_id' => $modePaiement['mode_id'],
    //             'montant' => $modePaiement['montant'],
    //         ]);
    //     }

    //     // Vous pouvez également effectuer d'autres actions nécessaires après l'enregistrement des paiements

    //     // Fermer le modal des informations de paiement
    //     $this->emit('fermerModal', 'InfosPaiement');
        
    //     // Vous pouvez également émettre un événement pour informer d'autres composants de la mise à jour
    //     // ou rediriger l'utilisateur vers une autre page, etc.
    // }
    public function enregistrerPaiement()
    {
        // Récupérer l'ID de la vente
        $venteId = $this->venteId;

        // Enregistrement des modes de paiement
        foreach ($this->modesPaiement as $modePaiement) {
            if (!empty($modePaiement['mode_id'])) {
                VenteHasModePaiement::create([
                    'vente_id' => $venteId,
                    'modePaiement_id' => $modePaiement['mode_id'],
                    'montant' => $modePaiement['montant'],
                ]);
            }
        }

        // Réinitialiser les modes de paiement après l'enregistrement
        $this->modesPaiement = [];
        ///Alert::toast('Paiement Enregistré', 'success');
        // Fermer le modal des informations de paiement
        $this->emit('closeModal', 'InfosPaiement');
        $this->emit('paiementEnregistre', $venteId);

        
        // Émettre un événement pour informer d'autres composants de la mise à jour
        // $this->emit('paiementEnregistre', $venteId);
    }

    public function render()
    {
        return view('livewire.pos.ventes.infos-paiement',[
            'modesPaiementDisponibles' => ModePaiement::all(),
        ]);
    }
}
