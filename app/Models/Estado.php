<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = ['nombre', 'descripcion'];

    public function casos()
    {
        return $this->hasMany(Caso::class);
    }

    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}
