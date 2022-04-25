<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    use HasFactory;

    protected $table = 'relaciones';
    protected $primaryKey = 'id_relacion';
    public $timestamps = false;

    protected $fillable = [
        'id_relacion',
        'id_estudiante',
        'id_programa',
    ];
}
