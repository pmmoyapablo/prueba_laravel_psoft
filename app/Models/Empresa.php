<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas'; // Especifica el nombre de la tabla

    protected $primaryKey = 'id'; // Especifica la clave primaria

    protected $fillable = [
        'rif',
        'razon_social',
        'direccion',
        'telefono',
        'fecha_creacion',
    ];
}
