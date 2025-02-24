<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receta extends Model
{
    use HasFactory;
    public function autor(): BelongsTo
    {
        return $this->belongsTo(Usuario::class,"id_autor");
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class,"id_receta");
    }

    public function ingredientes(): BelongsToMany
    {
        return $this->belongsToMany(Ingrediente::class,"ingredientes_recetas","id_receta","id_ingrediente")->withPivot(['cantidad','unidad']);
    }
}
