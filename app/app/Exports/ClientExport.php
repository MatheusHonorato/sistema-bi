<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ClientExport implements FromQuery
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
            return Client::query()->select('name')->where('city_id', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');
        return Client::query()->select('name')->whereIn('bairro', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');
    }
}
