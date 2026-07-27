<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Incubateur;
use App\Models\Etudiant;
class DemandeIncubation extends Model
{
    protected $table = 'de_incu';

    protected $primaryKey = 'id_demande';

    public $timestamps = false;

    protected $fillable = [
        'date_creation',
        'statut_actuel',
        'pieces_jointes',
        'id_projet',
        'id_incubateur',
        'id_etudiant',
    ];
    public function projet()
{
    return $this->belongsTo(Projet::class, 'id_projet', 'id_projet');
}
public function incubateur()
{
    return $this->belongsTo(
        Incubateur::class,
        'id_incubateur',
        'id_incubateur'
    );
}
public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'id_etudiant', 'id_etudiant');
}
}