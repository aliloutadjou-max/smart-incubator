<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DemandeIncubation;
use App\Models\AvisTechnique;
class Projet extends Model
{
    protected $table = 'projet';

    protected $primaryKey = 'id_projet';

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'description',
        'domaine_scientifique',
        'objectifs',
        'degre_innovation',
        'statut_projet',
        'id_etudiant',
        'id_cati'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }
    public function demande()
{
    return $this->hasOne(
        DemandeIncubation::class,
        'id_projet',
        'id_projet'
    );
}

public function avis()
{
    return $this->hasOne(
        AvisTechnique::class,
        'id_projet',
        'id_projet'
    );
}
}