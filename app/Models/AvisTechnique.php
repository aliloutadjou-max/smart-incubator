<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Decision;
class AvisTechnique extends Model
{
    protected $table = 'avis_technique';

    protected $primaryKey = 'id_avis';

    public $timestamps = false;

    protected $fillable = [
        'resultat_evaluation',
        'recommandation',
        'date_avis',
        'id_cati',
        'id_projet'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'id_projet', 'id_projet');
    }
    public function decision()
{
    return $this->hasOne(
        Decision::class,
        'id_avis',
        'id_avis'
    );
}
}
