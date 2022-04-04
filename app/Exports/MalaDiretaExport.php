<?php

namespace App\Exports;

use App\Models\Client;
use App\Models\Phone;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class MalaDiretaExport implements FromCollection
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

    public function collection()
    {

        if($this->flag == 'city')
            $clients = Client::where('city_id', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->get();
        else
            $clients = Client::whereIn('bairro', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->get();


        $collection = collect();

        foreach ($clients as $client) {

            $tratamento = '`A';

            if($client->flag_type == 'M') {
                $tratamento = 'Sr.';
            }
            if($client->flag_type == 'F') {
                $tratamento = 'Sra.';
            }

            $collection->push(
            [
                'tratamento' => $tratamento,
                'name' => $client->name,
                'name_two' => '',
                'caixa_postal' => '',
                'endereco' => $client->number,
                'number' => $client->street,
                'complemento' => $client->complemento,
                'bairro' => $client->bairro,
                'city' => $client->city->name,
                'state' => $client->city->state->name,
                'email' => $client->city->email,
                'phone' => '',
                'fax' => '',
                'cep_caixa_postal' => '',
                'cep' => $client->cep
            ]);
        }

        return $collection;
    }
}

