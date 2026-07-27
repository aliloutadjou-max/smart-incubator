<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AvisTechnique;
use App\Models\DemandeIncubation;
use App\Models\Incubateur;
class Decision extends Model
{
    protected $table = 'decision';

    protected $primaryKey = 'id_decision';

    public $timestamps = false;

    protected $fillable = [
        'type_decision',
        'commentaire',
        'date_decision',
        'id_avis',
        'id_incubateur',
        'id_demande'
    ];
    public function avis()
{
    return $this->belongsTo(
        AvisTechnique::class,
        'id_avis',
        'id_avis'
    );
}

public function demande()
{
    return $this->belongsTo(
        DemandeIncubation::class,
        'id_demande',
        'id_demande'
    );
}

public function incubateur()
{
    return $this->belongsTo(
        Incubateur::class,
        'id_incubateur',
        'id_incubateur'
    );
}
}