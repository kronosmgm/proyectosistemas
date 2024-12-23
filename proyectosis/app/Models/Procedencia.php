<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Procedencia
 *
 * @property $id
 * @property $nombre
 * @property $bandera
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Procedencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'bandera'];
    
    function productos(){
        return $this->hasMany(Producto::class);
    }

}
