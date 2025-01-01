<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacao extends Model
{
    use HasFactory;

    protected $table = 'variacao';

    protected  $fillable = [
        'tamanho',
        'peso',
        'cor',
        'preco',
        'estoque',
        'produto_id',
    ];

    public $timestamps =  false;

    public function produto() {
        return $this->belongsTo(
            Produto::class,
            'produto_id'
        );
    }
}
