<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incubateur extends Model
{
    protected $table = 'incubateur';

    protected $primaryKey = 'id_incubateur';

    public $timestamps = false;

    protected $fillable = [
        'nom_incubateur',
        'email',
        'responsable',
        'mot_de_passe'
    ];
}