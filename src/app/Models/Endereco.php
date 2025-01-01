<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';
    
    protected $fillable = [
        'logradouro',
        'cidade',
        'bairro',
        'numero',
        'cep',
        'complemento',
    ];

    public $timestamps = false;
}
