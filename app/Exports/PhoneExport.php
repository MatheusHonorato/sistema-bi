<?php

namespace App\Exports;

use App\Models\Client;
use App\Models\Phone;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class PhoneExport implements FromCollection
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

    private function telefone($n)
    {
        $tam = strlen(preg_replace("/[^0-9]/", "", $n));

        if ($tam == 13) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "+".substr($n, 0, $tam-11)." (".substr($n, $tam-11, 2).") ".substr($n, $tam-9, 5)."-".substr($n, -4);
        }
        if ($tam == 12) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "+".substr($n, 0, $tam-10)." (".substr($n, $tam-10, 2).") ".substr($n, $tam-8, 4)."-".substr($n, -4);
        }
        if ($tam == 11) {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return " (".substr($n, 0, 2).") ".substr($n, 2, 5)."-".substr($n, 7, 11);
        }
        if ($tam == 10) {
            // COM CÓDIGO DE ÁREA NACIONAL
            return " (".substr($n, 0, 2).") ".substr($n, 2, 4)."-".substr($n, 6, 10);
        }
        if ($tam <= 9) {
            // SEM CÓDIGO DE ÁREA
            return substr($n, 0, $tam-4)."-".substr($n, -4);
        }
    }

    public function collection()
    {
        if($this->flag == 'city')
            $clients = Client::where('city_id', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->get();
        else
            $clients = Client::whereIn('bairro', $this->cities_or_bairros)->whereIn('flag_type', $this->genders)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->get();


        $collection = collect();

        foreach ($clients as $client) {
            $phone_datas = Phone::where('client_id', $client->id)->first();
            $phone_type = '';

            switch($phone_datas->phone_type) {
                case 1:
                    $phone_type = 'TELEFONE RESIDENCIAL';
                    break;
                case 2:
                    $phone_type = 'TELEFONE COMERCIAL';
                    break;
                case 3:
                    $phone_type = 'TELEFONE MÓVEL';
                    break;
                case 4:
                    $phone_type = 'TELEFONE MÓVEL';
                    break;
                case 5:
                    $phone_type = 'TELEFONE PÚBLICO';
                    break;
                case 6:
                    $phone_type = 'HOUSE HOLD-FAMILIA';
                    break;
                case 7:
                    $phone_type = 'HOUSE HOLD-ENDEREÇO';
                    break;
                case 8:
                    $phone_type = 'TELEFONE MÓVEL COML';
                    break;
                case 9:
                    $phone_type = 'TELEFONE PARENTES';
                    break;
                }

            $collection->push(
            [
                'name' => $client->name,
                'phone' => $this->telefone($phone_datas->ddd . $phone_datas->phone),
                'tipo' => $phone_type,
                'city' => $client->city->name,
                'state' => $client->city->state->name
            ]);
        }

        return $collection;
    }
}
