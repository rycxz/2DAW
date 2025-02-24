<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingrediente extends Model
{
    use HasFactory;
    public function recetas(): BelongsToMany
    {
        return $this->belongsToMany(Receta::class,"ingredientes_recetas","id_ingrediente","id_receta")->withPivot(['cantidad','unidad']);
    }
}
