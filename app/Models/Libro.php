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
        'Cod_Autor',
        'Cod_Editorial',
        'Edicion',
        'Idioma',
        'Id_Estado',
        'Descripcion',
        'Cod_Categoria',
        'CantPaginas',
        'CopiasDisp',
    ];

    // Relación muchos a muchos con Autores
    public function autor()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'Cod_Libro', 'Cod_Autor');
    }

    // Relación muchos a muchos con Editoriales
    public function editorial()
    {
        return $this->belongsToMany(Editorial::class, 'editorial_libro', 'Cod_Libro', 'Cod_Editorial');
    }

    // Relación muchos a muchos con Categorías
    public function categoria()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_libro', 'Cod_Libro', 'Cod_Categoria');
    }

    // Relación uno a muchos con Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'Id_Estado', 'Id_Estado');
    }

    // Relación uno a muchos con Ejemplares
    public function ejemplar()
    {
        return $this->hasMany(Ejemplar::class, 'Cod_Libro', 'Cod_Libro');
    }
}
