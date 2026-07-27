<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
class Etudiant extends Model
{
    protected $table = 'etudiant';

    protected $primaryKey = 'id_etudiant';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'num_etudiant',
        'faculte_departement',
        'telephone'
    ];
    public function projets()
{
    return $this->hasMany(
        Projet::class,
        'id_etudiant',
        'id_etudiant'
    );
}
}