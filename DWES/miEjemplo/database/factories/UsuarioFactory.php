<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'apodo' => fake()->userName(),
            'nombre' => fake()->firstName(),
            'apellidos'=> fake()->lastName().' '.fake()->lastName(),
            'experiencia'=>fake()->randomElement(["Principiante","Amateur","Profesional"]),
            'esAdmin'=>0,
            'fotoPerfil'=>"imagenes/default.jpg",
            'email' => fake()->unique()->safeEmail(),
            'contrasena' => Hash::make('1234'),
        ];
    }
}
