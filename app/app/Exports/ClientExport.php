<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ClientExport implements FromQuery
{
    use Exportable;

    public $cities = [], $genders = [], $from, $to;

    public function __construct($cities, $genders, $from, $to)
    {
        $this->cities = $cities;
        $this->genders = $genders;
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return Client::query()->where('city_id', $this->cities)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');
    }
}
