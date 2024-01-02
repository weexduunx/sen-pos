<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sousCategories(): HasMany
    {
        return $this->hasMany(sousCategories::class);
    }
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}
