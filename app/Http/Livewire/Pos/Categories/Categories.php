<?php

namespace App\Http\Livewire\Pos\Categories;

use Livewire\Component;
use App\Models\Categorie;

class Categories extends Component
{
    public $categories;
    public $activeCategoryId;

    public function mount()
    {
        $this->categories = Categorie::all();
        $this->activeCategoryId = $this->categories->first()->id; // Fixer la premiere catégorie r
    }

    public function setActiveTab($categoryId)
    {
        $this->activeCategoryId = $categoryId;
        $this->emit('categorySelected', $categoryId); // Emit the event with the selected category ID
    }
    public function render()
    {
        $categories = Categorie::all();
        return view('livewire.pos.categories.categories',['categories' => $categories]);
    }
}
