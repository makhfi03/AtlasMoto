<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('motos', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('image');
        $table->string('immatriculation')->unique();
        $table->decimal('kilometrage', 10, 2);
        $table->string('categorieMoto');
        $table->text('description')->nullable();
        $table->decimal('price_per_day', 10, 2);
        $table->string('status')->default('disponible');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motos');
    }
};
