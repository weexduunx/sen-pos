<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomProduit',
        'description',
        'prixAchat',
        'prixVente',
        'code_produit',
        'code_barre_id',
        'quatite',
        'image',
        'alertStock',
        'sousCategorie_id',
        'marqueProduit',
        'unit_id',
        'categorie_id',
        'status',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function sousCategorie()
    {
        return $this->belongsTo(sousCategories::class, 'sous_categorie_id');
    }

    public function codeBarre()
    {
        return $this->hasOne(CodeBarre::class, 'valeur_code_barre', 'code_produit');
    }
}
