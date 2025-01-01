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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50);
            $table->string('imagem_path',200)->nullable();
            $table->text('descricao')->nullable();
            $table->date('data_cadastro');

            $table->foreignId('categoria_id')
                ->constrained('categoria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
