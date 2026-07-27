<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cati extends Model
{
    protected $table = 'cati';

    protected $primaryKey = 'id_cati';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'responsable',
        'mot_de_passe'
    ];
}