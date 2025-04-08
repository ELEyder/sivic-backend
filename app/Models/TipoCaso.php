<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCaso extends Model
{
    protected $table = 'tipos_caso';

    protected $fillable = ['nombre', 'descripcion', 'activo'];

    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
