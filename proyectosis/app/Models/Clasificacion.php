<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clasificacion
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clasificacion extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion'];
    
    function productos(){
        return $this->hasMany(Producto::class);
    }

}
