<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'producto_id';

    public $incrementing = true;
    protected $fillable = ['nombre', 'descripcion', 'fecha_lanzamiento', 'estado'];
}
