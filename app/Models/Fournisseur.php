<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['nom_fournisseur', 'adresse_fournisseur', 'email_fournisseur', 'telephone_fournisseur'];

    public function produits()
    {
        return $this->hasMany(Product::class);
    }
}
?>
