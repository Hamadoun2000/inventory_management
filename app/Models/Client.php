<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom_client', 'adresse_client', 'email_client', 'telephone_client'];

    public function sorties()
    {
        return $this->hasMany(Sortie::class);
    }
}
?>
