<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento', 'solicitante', 'encargado', 'fecha', 'observacion',
    ];

    public function productos()
{
    return $this->belongsToMany(Producto::class, 'entrega_producto')
                ->withPivot('cantidad')
                ->withTimestamps();
}
}