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
        Schema::create('variacao_venda', function (Blueprint $table) {
            $table->id();
        
            $table->integer('quantidade');

            $table->foreignId('venda_id')
                ->constrained('venda')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('variacao_id')
                ->constrained('variacao')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacao_venda');
    }
};
