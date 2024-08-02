<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada a este modelo
    protected $table = 'estado';

    // Nombre de la clave primaria
    protected $primaryKey = 'Id_Estado';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos (created_at, updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'Disponibilidad', // Asume que hay un campo 'Disponibilidad' para la descripción del estado
    ];

    // Relación de uno a muchos con el modelo Libro
    public function libros()
    {
        return $this->hasMany(Libro::class, 'Estado', 'Id_Estado');
    }

    // Relación de uno a muchos con el modelo Ejemplar
    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class, 'Estado_Ejemplar', 'Id_Estado');
    }
}

