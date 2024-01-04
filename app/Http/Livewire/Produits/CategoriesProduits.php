<?php

namespace App\Http\Livewire\Produits;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Categorie;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesProduits extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nomCategorie, $code, $image, $editedCategs, $editedImage, $idCategorie;
    public $mode = 'create';
    public $search = '';
    protected $rules = [
        'nomCategorie' => 'required|string',
        'code' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];
    public function createCategorie()
    {
        $this->validate();
        if ($this->image instanceof UploadedFile) {
            $imagePath = $this->image->store('categories', 'public');
        } else {
            $imagePath = null;
        }

        Categorie::create([
            'nomCategorie' => $this->nomCategorie,
            'code' => $this->code,
            'image' =>  $imagePath,
        ]);

        $this->reset();
        Alert::success('Success!!', 'Categorie Ajouté avec Succés');
        $this->emit('closeModal');
    }

    public function editCategorie($id)
    {
        $this->editedCategs = Categorie::find($id);
        $this->idCategorie = $this->editedCategs->id;
        $this->nomCategorie = $this->editedCategs->nomCategorie;
        $this->code = $this->editedCategs->code;
        $this->editedImage = $this->editedCategs->image;

        $this->mode = 'edit';
        $this->emit('openCategEditModal');
    }

    public function update()
    {
        try {
            if ($this->image instanceof UploadedFile) {
                $this->validate();
            }
            $category = Categorie::find($this->idCategorie);
            // Gérer la mise à jour de l'image
            if ($this->image instanceof UploadedFile) {
                // Supprimer l'image précédente
                if ($category->image !== null) {
                    Storage::disk('public')->delete($category->image);
                }
                // Stocker la nouvelle image
                $imagePath = $this->image->store('categories', 'public');
            } else {
                $imagePath = $category->image;
            }
            // Mettre à jour les détails de la catégorie
            $category->update([
                'nomCategorie' => $this->nomCategorie,
                'code' => $this->code,
                'image' => $imagePath,
            ]);

            $this->reset();
            $this->emit('closeModal');
            Alert::toast('Catégorie mis à jour avec Succès', 'success');
        } catch (Exception $e) {
            $this->reset();
            $this->emit('closeModal');
            Alert::error('Error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $category = Categorie::find($id);
            $category->delete();
            Alert::toast('Catégorie supprimee avec Succès', 'success');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
    }
    public function fermer()
    {
        $this->reset();
        $this->emit('closeModal');
    }
    public function render()
    {
        $categories = Categorie::where('nomCategorie', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.produits.categories-produits', ['categories' => $categories]);
    }
}
