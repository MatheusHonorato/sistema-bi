<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
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
        'titulo_eleitor',
    ];

    public function city() {

        return $this->belongsTo(City::class);
    }

    public function phones() {

        return $this->hasMany(Phone::class);
    }
}
