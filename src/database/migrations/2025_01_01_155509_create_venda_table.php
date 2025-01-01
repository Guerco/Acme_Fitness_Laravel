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
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total',10,2);
            $table->decimal('valor_frete',10,2);
            $table->decimal('descontos',10,2);
            $table->enum('forma_pagamento', ['PIX', 'Boleto', 'Cartão (1x)']);

            $table->foreignId('endereco_id')
                ->constrained('endereco')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreignId('cliente_id')
                ->constrained('cliente')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda');
    }
};
