<?php

namespace App\Http\Livewire\Produits;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Categorie;
use Livewire\WithPagination;

class CategoriesProduits extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nomCategorie,$code,$image;
    public $search = '';
    private function resetInputFields()
    {
        $this->nomCategorie = '';
        $this->code = '';
        $this->image = '';
    }
    public function createCategorie()
    {
        // Validation des données
        $this->validate([
            'nomCategorie' => 'required|string',
            'code' =>'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création de l'utilisateur
        Categorie::create([
            'nomCategorie' => $this->nomCategorie,
            'code' => $this->code,
            'image' => $this->image->store('categories', 'public'),
        ]);

        // Réinitialisation des champs
        $this->resetInputFields();

        // Ajoutez ici d'autres actions après la création de l'utilisateur, si nécessaire

        // Rafraîchit la page, vous pouvez ajuster cela selon vos besoins
        // $this->emit('alert', ['type' => 'success', 'message' => 'Categorie Enregistrer']);
        $this->emit('swal:modal', [
            'icon'  => 'success',
            'type'  => 'success',
            'title' => 'Success!!',
            'text'  => "Categorie Ajouté avec Succés",
         
        ]);
        $this->emit('closeModal');
        // return redirect()->to(route('users'));
        
    }
    public function render()
    {
        // $categories = Categorie::paginate(5);
        $categories = Categorie::where('nomCategorie', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.produits.categories-produits',['categories' => $categories]);
    }
}
