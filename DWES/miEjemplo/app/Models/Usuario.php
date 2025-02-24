<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;


    protected $fillable = [
        "apodo",
        "email",
        "nombre",
        "apellidos",
        "contrasena",
        "esAdmin",
        "fotoPerfil",
        "experiencia"
    ];


    public function recetas(): HasMany
    {
        return $this->hasMany(Receta::class, "id_autor");
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, "id_autor");
    }

    public function getAuthPasswordName(): string
    {
        return "contrasena";
    }
    //protected $authPasswordName="contrasena";


}
