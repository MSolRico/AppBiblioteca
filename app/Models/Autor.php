<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'autor';

    // Nombre de la clave primaria
    protected $primaryKey = 'Cod_Autor';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'NombreAutor',
        'Descripcion',
    ];

    // Relación de uno a muchos con el modelo Libro
    public function libros()
    {
        return $this->hasMany(Libro::class, 'Cod_Autor', 'Cod_Autor');
    }
}
