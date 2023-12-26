<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sousCategories extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }
}
