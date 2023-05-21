<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RoleUtilisateur extends Model
{
    protected $fillable = ['nom_role'];

    public function utilisateurs()
    {
        return $this->hasMany(User::class);
    }
}
?>
