<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'street',
        'number',
        'complemento',
        'bairro',
        'cep',
        'flag_type',
        'data_nascimento',
        'estado_civil',
        'cbo',
        'renda',
        'titulo_eleitor'
    ];
}
