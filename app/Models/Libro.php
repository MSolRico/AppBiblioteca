<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'libro';

    // Nombre de la clave primaria
    protected $primaryKey = 'Cod_Libro';

    // Clave primaria autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'Titulo',
        'Edicion',
        'Idioma',
        'Cod_Estado',
        'Numero_Ejemplar',
        'Descripcion',
        'CantPaginas',
        'CopiasDisp',
    ];

    // Relación muchos a muchos con Autor
    public function autor()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'Cod_Libro', 'Cod_Autor');
    }

    // Relación muchos a muchos con Editorial
    public function editorial()
    {
        return $this->belongsToMany(Editorial::class, 'editorial_libro', 'Cod_Libro', 'Cod_Editorial');
    }

    // Relación muchos a muchos con Categoria
    public function categoria()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_libro', 'Cod_Libro', 'Cod_Categoria');
    }

    // Relación uno a muchos con Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'Cod_Estado', 'Id_Estado');
    }

    // Relación uno a muchos con Ejemplar
    public function ejemplar()
    {
        return $this->hasMany(Ejemplar::class, 'Cod_Libro', 'Cod_Libro');
    }
}

