<?php

namespace App\Http\Livewire\Pos\Categories;

use Livewire\Component;
use App\Models\Categorie;

class Categories extends Component
{
    public function render()
    {
        $categories = Categorie::all();
        return view('livewire.pos.categories.categories',['categories' => $categories]);
    }
}
