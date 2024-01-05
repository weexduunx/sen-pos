<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeBarre extends Model
{
    use HasFactory;
    protected $fillable = [
        'valeur_code_barre',
        'type_code_barre',
        'barcode_chemin_img',
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'valeur_code_barre', 'code_produit');
    }
}
