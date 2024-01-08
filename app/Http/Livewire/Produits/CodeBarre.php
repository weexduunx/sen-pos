<?php

namespace App\Http\Livewire\Produits;

use App\Models\CodeBarre as ModelsCodeBarre;
use Livewire\Component;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class CodeBarre extends Component
{
    public $search = '';
    public $searchResults = [];
    public $selectedProduct = null;
    public $imagePath = null;

    public function render()
    {
        return view('livewire.produits.code-barre', [
            'searchResults' => $this->searchResults,
            'selectedProduct' => $this->selectedProduct,
        ]);
    }

    public function updatedSearch()
    {
        // Effectuer la recherche lorsque la valeur de $search est mise à jour
        $this->searchResults = Produit::where('nomProduit', 'like', '%' . $this->search . '%')
            ->orWhere('code_produit', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function selectProduct($productId)
    {
        // Sélectionner un produit
        $this->selectedProduct = Produit::find($productId);
        $this->dispatchBrowserEvent('codeBarreSelected');

        $this->search = ''; // Effacer la recherche
    }

    public function generateBarcode($type)
    {
        // Initialiser la propriété
        $this->imagePath = null;

        // Vérifier si un produit est sélectionné
        if ($this->selectedProduct) {
            // Générer le code-barres à partir de la valeur du produit
            $code = $this->selectedProduct->code_produit;

            // Instancier la classe correspondante en fonction du type
            switch ($type) {
                case 'C39':
                case 'EAN13':
                case 'PHARMA':
                case 'C128':
                case 'C39E+':
                    $barcode = new DNS1D();
                    break;
                case 'QRCODE':
                    $barcode = new DNS2D();
                    break;
                default:
                    $barcode = new DNS1D();
                    $type = 'C39'; // Type par défaut
                    break;
            }

            if (method_exists($barcode, 'setStorPath')) {
                $barcode->setStorPath(storage_path('app/public/codebarres/'));
            }

            // Génération du code-barres en fonction du type
            if ($type === 'QRCODE' && method_exists($barcode, 'getBarcodePNG')) {
                $barcodeImage = $barcode->getBarcodePNG($code, $type);
            } else {
                $barcodeImage = $barcode->getBarcodePNG($code, $type, 1, 55);
            }

            // Sauvegarde du chemin de l'image dans la base de données
            $codeBarre = ModelsCodeBarre::create([
                'barcode_chemin_img' => $barcodeImage,
                'valeur_code_barre' => $this->selectedProduct->code_produit,
                'type_code_barre' => $type,
            ]);

            // Attribution de la valeur à la propriété
            $this->imagePath = $barcodeImage;
        }
    }
}
