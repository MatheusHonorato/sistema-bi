<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class MalaDiretaExport implements FromQuery
{
    use Exportable;

    public $flag, $cities_or_bairros = [], $genders = [], $from, $to;

    public function __construct($flag, $cities_or_bairros, $genders, $from, $to)
    {
        $this->flag = $flag;
        $this->cities_or_bairros = $cities_or_bairros;
        $this->genders = $genders;
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        if($this->flag == 'city')
            return Client::query()->selectRaw("(CASE WHEN (flag_type = 'M') THEN 'Sr.' ELSE 'Sra.' END) as treatment")->selectRaw('name')->selectRaw('street')->selectRaw('number')->selectRaw('complemento')->selectRaw('bairro')->selectRaw('cep')->where('city_id', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');
        return Client::query()->selectRaw("(CASE WHEN (flag_type = 'M') THEN 'Sr.' ELSE 'Sra.' END) as treatment")->selectRaw('name')->selectRaw('street')->selectRaw('number')->selectRaw('complemento')->selectRaw('bairro')->selectRaw('cep')->whereIn('bairro', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');
    }
}


