<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro';
    protected $primaryKey = 'Cod_Libro';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true; // Cambiado a true si usas timestamps en la migración

    protected $fillable = [
        'Titulo',
        'Edicion',
        'Idioma',
        'Id_Estado',
        'Descripcion',
        'CantPaginas',
        'CopiasDisp',
    ];

    // Relación muchos a muchos con Autores
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'Cod_Libro', 'Cod_Autor');
    }

    // Relación muchos a muchos con Editoriales
    public function editoriales()
    {
        return $this->belongsToMany(Editorial::class, 'editorial_libro', 'Cod_Libro', 'Cod_Editorial');
    }

    // Relación muchos a muchos con Categorías
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_libro', 'Cod_Libro', 'Cod_Categoria');
    }

    // Relación uno a muchos con Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'Id_Estado', 'Id_Estado');
    }

    // Relación uno a muchos con Ejemplares
    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class, 'Cod_Libro', 'Cod_Libro');
    }
}

