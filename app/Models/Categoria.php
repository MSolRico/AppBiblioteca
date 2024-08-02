<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'categoria';

    // Nombre de la clave primaria
    protected $primaryKey = 'Cod_Categoria';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'NombreCategoria',
        'Descripcion',
    ];

    // Relación de uno a muchos con el modelo Libro
    public function libros()
    {
        return $this->hasMany(Libro::class, 'Cod_Categoria', 'Cod_Categoria');
    }
}



