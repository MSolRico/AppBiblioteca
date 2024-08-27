<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada a este modelo
    protected $table = 'editorial';

    // Nombre de la clave primaria
    protected $primaryKey = 'Cod_editorial';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos (created_at, updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'NombreEditorial',
        'Descripcion',
    ];

    // Relación muchos a muchos con el modelo Libro
    public function libro()
    {
        return $this->belongsToMany(Libro::class, 'editorial_libro', 'Cod_editorial', 'Cod_Libro');
    }
}
