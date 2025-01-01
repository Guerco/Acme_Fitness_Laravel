<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'venda';

    protected $filable = [
        'descontos',
        'forma_pagamento',
        'cliente_id',
        'endereco_id',
    ];
    public $timestamps = false;

    public function cliente(){
        return $this->belongsTo(
            Cliente::class,
            'cliente_id'
        );
    }
    public function endereco(){
        return $this->belongsTo(
            Endereco::class,
            'endereco_id'
        );
    }

    public function variacoes () {
        return $this->belongsToMany(
            Variacao::class,
            'variacao_venda'
        )->withPivot('quantidade');
    }
}
