<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comentario extends Model
{
    use HasFactory;
    public function responde() : BelongsTo
    {
       return $this->belongsTo(Comentario::class,"id_respondido");
    }
    public function respuestas() : HasMany
    {
        return $this->hasMany(Comentario::class,"id_respondido");
    }
    public function autor() : BelongsTo
    {
        return $this->belongsTo(Usuario::class,"id_autor");
    }
    public function receta() :BelongsTo
    {
        return $this->belongsTo(Receta::class, "id_receta");
    }
}
