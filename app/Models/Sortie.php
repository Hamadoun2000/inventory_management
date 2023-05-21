<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    protected $fillable = ['date_sortie', 'quantite_sortie', 'prix_unitaire_sortie'];

    public function produit()
    {
        return $this->belongsTo(Product::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
?>
