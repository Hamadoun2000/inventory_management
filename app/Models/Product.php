<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nom_produit', 'description_produit', 'quantite_stock', 'seuil_alerte'];

    public function fournisseur()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function entrees()
    {
        return $this->hasMany(Entree::class);
    }

    public function sorties()
    {
        return $this->hasMany(Sortie::class);
    }
}
?>
