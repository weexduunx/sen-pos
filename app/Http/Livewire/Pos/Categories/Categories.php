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
        $this->activeCategoryId = $this->categories->first()->id; // Fixer la premiere catégorie
    }
    
    public function setActiveTab($categoryId)
    {
        $this->activeCategoryId = $categoryId;
    }
    
    public function render()
    {
        return view('livewire.pos.categories.categories');
    }
}
