<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada a este modelo
    protected $table = 'ejemplar';

    // Nombre de la clave primaria
    protected $primaryKey = 'Id_Ejemplar';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos (created_at, updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'Numero_Ejemplar',
        'Estado_Ejemplar',
        'Cod_Libro' // Especificar la clave foránea si existe en la tabla ejemplar
    ];

    // Relación de muchos a uno con el modelo Libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'Cod_Libro', 'Cod_Libro');
    }
}


