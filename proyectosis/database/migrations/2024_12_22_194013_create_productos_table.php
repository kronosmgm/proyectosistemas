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
        Schema::create('productos', function (Blueprint $table) {
           
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->string('foto')->nullable();
            $table->BigInteger('clasificacion_id')->unsigned();
            $table->BigInteger('marca_id')->unsigned();
            $table->BigInteger('procedencia_id')->unsigned();

            $table->foreign('clasificacion_id')
                    ->references('id')->on('clasificacions');
            $table->foreign('marca_id')
                ->references('id')->on('marcas');
            $table->foreign('procedencia_id')
                ->references('id')->on('procedencias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
