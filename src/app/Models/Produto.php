<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';
    
    protected $fillable = [
        'nome',
        'imagem_path',
        'descricao',
        'data_cadastro',
        'categoria_id',
    ];

    public $timestamps = false;

    public function categoria() {
        return $this->belongsTo(
            Categoria::class,
            'categoria_id'
        );
    }
}
