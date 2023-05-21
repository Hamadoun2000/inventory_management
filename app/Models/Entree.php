<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $fillable = ['date_entree', 'quantite_entree', 'prix_unitaire_entree'];

    public function produit()
    {
        return $this->belongsTo(Product::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
?>
