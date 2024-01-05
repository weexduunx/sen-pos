<?php

namespace App\Http\Livewire\Produits;

use App\Models\CodeBarre as ModelsCodeBarre;
use Livewire\Component;
use App\Models\Produit;
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

    // public function generateBarcode()
    // {
    //     // Initialiser la propriété
    //     $this->imagePath = null;

    //     // Vérifier si un produit est sélectionné
    //     if ($this->selectedProduct) {
    //         // Générer le code-barres à partir de la valeur du produit
    //         $barcode = new DNS1D();
    //         $barcode->setStorPath(storage_path('app/public/barcodes/'));
    //         $imagePath = $barcode->getBarcodePNGPath($this->selectedProduct->code, 'C39', 3, 33);

    //         // Sauvegarder le chemin de l'image dans la base de données
    //         $codeBarre = CodeBarre::create([
    //             'barcode_chemin_img' => $imagePath,
    //             'valeur_code_barre' => $this->selectedProduct->code_produit,
    //             'type_code_barre' => 'C39', // Vous pouvez ajuster cela en fonction du type réel de code-barres
    //         ]);

    //         // Attribuer la valeur à la propriété
    //         $this->imagePath = $imagePath;
    //     }
    // }
    public function generateBarcode($type)
    {
        // Initialiser la propriété
        $this->imagePath = null;

        // Vérifier si un produit est sélectionné
        if ($this->selectedProduct) {
            // Générer le code-barres à partir de la valeur du produit
            $code = $this->selectedProduct->code;

            // Utiliser le type de code-barres spécifié
            switch ($type) {
                case 'C39':
                    $barcode = new DNS1D();
                    $barcode->setStorPath(storage_path('app/public/barcodes/'));
                    $barcodeImage = $barcode->getBarcodePNG($code, $type, 3, 33);
                    break;

                case 'QRCODE':
                    $barcode = new DNS2D();
                    $barcode->setStorPath(storage_path('app/public/barcodes/'));
                    $barcodeImage = $barcode->getBarcodePNG($code, $type);
                    break;

                case 'PDF417':
                    $barcode = new DNS2D();
                    $barcode->setStorPath(storage_path('app/public/barcodes/'));
                    $barcodeImage = $barcode->getBarcodePNG($code, $type);
                    break;

                    // Ajoutez d'autres types de code-barres au besoin

                default:
                    // Type par défaut
                    $barcode = new DNS1D();
                    $barcodeImage = $barcode->getBarcodePNG($code, 'C39', 3, 33);
                    break;
            }

            // Sauvegarder le chemin de l'image dans la base de données
            $codeBarre = ModelsCodeBarre::create([
                'barcode_chemin_img' => $barcodeImage,
                'valeur_code_barre' => $this->selectedProduct->code_produit,
                'type_code_barre' => $type,
            ]);

            // Attribuer la valeur à la propriété
            $this->imagePath = $barcodeImage;
        }
    }
    // public function generateBarcode($type)
    // {
    //     // Initialiser la propriété
    //     $this->imagePath = null;

    //     // Vérifier si un produit est sélectionné
    //     if ($this->selectedProduct) {
    //         // Générer le code-barres à partir de la valeur du produit
    //         $code = $this->selectedProduct->code_produit;

    //         // Utiliser le type de code-barres spécifié
    //         switch ($type) {
    //             case 'C39':
    //                 $barcode = new DNS1D();
    //                 $barcode->setStorPath(storage_path('app/public/barcodes/'));
    //                 $barcodeImage = $barcode->getBarcodePNG($code, $type, 3, 33);
    //                 break;

    //             case 'QRCODE':
    //                 $barcode = new DNS2D();
    //                 $barcodeImage = $barcode->getBarcodePNG($code, $type);
    //                 break;

    //             case 'PDF417':
    //                 $barcode = new DNS2D();
    //                 $barcodeImage = $barcode->getBarcodePNG($code, $type);
    //                 break;

    //                 // Ajoutez d'autres types de code-barres au besoin

    //             default:
    //                 // Type par défaut
    //                 $barcode = new DNS1D();
    //                 $barcodeImage = $barcode->getBarcodePNG($code, 'C39', 3, 33);
    //                 break;
    //         }
    //         // Enregistrer l'image générée dans le système de fichiers de Laravel
    //         $fileName = 'barcode_' . $this->selectedProduct->nomProduit . time() . '.png';
    //         Storage::disk('public')->put('codebarres/' . $fileName, $barcodeImage);

    //         // Sauvegarder le chemin de l'image dans la base de données
    //         $codeBarre = ModelsCodeBarre::create([
    //             'barcode_chemin_img' => 'codebarres/' . $fileName,
    //             'valeur_code_barre' => $this->selectedProduct->code_produit,
    //             'type_code_barre' => $type,
    //         ]);

    //         // Attribuer la valeur à la propriété
    //         $this->imagePath = 'codebarres/' . $fileName;
    //     }
    // }
}
