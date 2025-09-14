<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nom_producto', 20);
            $table->text('des_producto', 250);
            $table->integer('cant_producto');
            $table->decimal('pre_producto', 10, 2);
            $table->string('ima_producto')->default('default.png');
            $table->boolean('est_producto')->default(1);
            $table->unsignedBigInteger('id_categoria')->default(1);
            $table->unsignedBigInteger('usuarios_id_usuario')->default(1);

            // 👇 esto crea created_at y updated_at
            $table->timestamps();
              $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
    $table->foreign('usuarios_id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};