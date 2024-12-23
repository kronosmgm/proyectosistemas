<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $stock
 * @property $foto
 * @property $clasificacion_id
 * @property $marca_id
 * @property $procedencia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Clasificacion $clasificacion
 * @property Marca $marca
 * @property Procedencia $procedencia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'foto', 'clasificacion_id', 'marca_id', 'procedencia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clasificacion()
    {
        return $this->belongsTo(\App\Models\Clasificacion::class, 'clasificacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(\App\Models\Marca::class, 'marca_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function procedencia()
    {
        return $this->belongsTo(\App\Models\Procedencia::class, 'procedencia_id', 'id');
    }
    
}
