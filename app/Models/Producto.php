<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'cantidad'];


    public function entregas()
    {
        return $this->belongsToMany(Entrega::class, 'entrega_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}

