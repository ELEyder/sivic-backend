<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = 'casos';

    protected $fillable = [
        'id',
        'dni',
        'nombre_completo',
        'genero',
        'telefono',
        'nacionalidad',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'tipo_caso_id',
        'lugar_caso',
        'descripcion',
        'autorizacion_comunicacion',
        'autorizacion_copia_reporte',
        'fecha_resolucion',
        'asignado',
        'resolucion',
        'estado_id',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }

    public function tipo_caso()
{
        return $this->belongsTo(TipoCaso::class, 'tipo_caso_id', 'id');
}
}
