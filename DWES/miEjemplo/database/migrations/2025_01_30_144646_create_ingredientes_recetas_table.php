<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredientes_recetas', function (Blueprint $table) {
            $table->foreignId("id_receta")->constrained("recetas");
            $table->foreignId("id_ingrediente")->constrained("ingredientes");
            $table->float("cantidad");
            $table->string("unidad");
            $table->timestamps();
            $table->primary(["id_receta","id_ingrediente"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes_recetas');
    }
};
