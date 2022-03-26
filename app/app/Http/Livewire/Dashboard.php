<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Client;
use App\Models\State;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $states = [], $cities = [], $bairros = [], $age, $amount, $from, $to, $male, $female, $not_info;
    public $filter_30_39, $filter_40_49, $filter_50_59, $filter_60_69, $filter_mais_70, $states_teste, $cities_options, $bairros_options = [], $viewTable =  'hidden', $viewChart = '';
    public $cities_render = [], $genders = [], $genders_render = [], $genders_options = ['M' => 'Masculino', 'F' => 'Feminino', '' => 'Empresa'];
    public $years_olds = [], $years_olds_options = [
        '30 a 39 anos' => ['from' => '1983-01-01', 'to' => '1992-12-30'],
        '40 a 49 anos' => ['from' => '1973-01-01', 'to' => '1982-12-30'],
        '50 a 59 anos' => ['from' => '1963-01-01', 'to' => '1972-12-30'],
        '60 a 69 anos' => ['from' => '1942-12-30', 'to' => '1953-01-01'],
        'Mais de 70 anos' => ['from' => '1900-12-30', 'to' => '1943-01-01']
    ];

    public $froms = [], $tos = [];

    protected $listeners = [
        'Dashboard',
        'onColumnClick' => 'handleOnColumnClick',
        'onSliceClick' => 'handleOnSliceClick',
    ];

    protected $rules = [
        'states.*' => '',
        'cities.*' => '',
    ];

    /*public function handleOnColumnClick($point)
    {
        switch ($point['title']) {
            case '30 a 39 anos':
                $this->from = date('1983-01-01');
                $this->to = date('1992-12-30');
                break;
            case '40 a 49 anos':
                $this->from = date('1973-01-01');
                $this->to = date('1982-12-30');
                break;
            case '50 a 59 anos':
                $this->from = date('1963-01-01');
                $this->to = date('1972-12-30');
                break;
            case '60 a 69 anos':
                $this->from = date('1953-01-01');
                $this->to = date('1942-12-30');
                break;
            case 'Mais de 70 anos':
                $this->from = date('1943-01-01');
                $this->to = date('1900-12-30');
                break;
        }
    }*/

    public function viewClientes()
    {
        if($this->viewTable == '')
            $this->viewTable = 'hidden';
        else
        $this->viewTable = '';

        if($this->viewChart == '')
            $this->viewChart = 'hidden';
        else
        $this->viewChart = '';
    }

    public function updatedStates()
    {
        if(!is_array($this->states)) return;
        $this->states = array_filter($this->states,
            function($states) {
                return $states != false;
            });
    }

    public function updatedCities()
    {
        if(!is_array($this->cities)) return;
        $this->cities = array_filter($this->cities,
            function($cities) {
                return $cities != false;
            });
    }

    public function updatedBairros()
    {
        if(!is_array($this->bairros)) return;
        $this->bairros = array_filter($this->bairros,
            function($bairros) {
                return $bairros != false;
            });
    }

    public function updatedGenders()
    {
        if(!is_array($this->genders)) return;
        $this->genders = array_filter($this->genders,
            function($genders) {
                return $genders != false;
            });
    }

    public function updatedYearsOlds()
    {
        if(!is_array($this->years_olds)) return;
        $this->years_olds = array_filter($this->years_olds,
            function($years_olds) {
                return $years_olds != false;
            });
    }

    public function mount()
    {
        $this->states_teste = State::all();
        $this->from = date('1900-12-30');
        $this->to = date('1992-12-30');

        $this->male = 0;
        $this->female = 0;
        $this->not_info = 0;

        //$this->amount = Client::count();

        /*if(count($this->bairros) == 0) {
            $this->male = Client::whereIn('city_id', $this->cities)->where('flag_type', 'M')->count();
            $this->female = Client::whereIn('city_id', $this->cities)->where('flag_type', 'F')->count();
            $this->not_info = Client::whereIn('city_id', $this->cities)->where('flag_type', '')->count();
        } else {
            $this->male = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'M')->count();
            $this->female = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'F')->count();
            $this->not_info = Client::whereIn('bairro', $this->bairros)->where('flag_type', '')->count();
        }*/

        //$this->bairros_teste = array_unique(array_column(Client::select('bairro')->whereIn('city_id', $this->cities)->get()->toArray(), 'bairro'));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->froms = [];
        foreach ($this->years_olds as $value) {
            if(count($this->years_olds) > 0)
                array_push($this->froms, $this->years_olds_options[$value]['from']);
        }

        if(count($this->froms) > 0)
            $this->from = min($this->froms);
        if(count($this->froms) == 0)
            $this->from = date('1900-12-30');

        //

        $this->tos = [];
        foreach ($this->years_olds as $value) {
            if(count($this->years_olds) > 0)
                array_push($this->tos, $this->years_olds_options[$value]['to']);
        }

        if(count($this->tos) > 0)
            $this->to = max($this->tos);
        if(count($this->tos) == 0)
            $this->to = date('1992-12-30');


        //


        $this->cities_options = City::whereIn('state_id', $this->states)->get();

        if(count($this->states) > 0 && count($this->cities) == 0)
            $this->cities_render = array_column(City::whereIn('state_id', $this->states)->get()->toArray(), 'id');

        if(count($this->states) > 0 && count($this->cities) > 0)
            $this->cities_render = $this->cities;

        if(count($this->cities) > 0)
            $this->bairros_options = array_unique(array_column(Client::select('bairro')->whereIn('city_id', $this->cities_render)->get()->toArray(), 'bairro'));

        /*if(count($this->bairros) == 0) {
            $this->male = Client::whereIn('city_id', $this->cities)->where('flag_type', 'M')->count();
            $this->female = Client::whereIn('city_id', $this->cities)->where('flag_type', 'F')->count();
            $this->not_info = Client::whereIn('city_id', $this->cities)->where('flag_type', '')->count();
        } else {
            $this->male = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'M')->count();
            $this->female = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'F')->count();
            $this->not_info = Client::whereIn('bairro', $this->bairros)->where('flag_type', '')->count();
        }

        if(count($this->bairros) == 0) {
            $this->filter_30_39 = Client::whereIn('city_id', $this->cities)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1973-01-01');
            $this->to = date('1982-12-30');

            $this->filter_40_49 = Client::whereIn('city_id', $this->cities)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1963-01-01');
            $this->to = date('1972-12-30');

            $this->filter_50_59 = Client::whereIn('city_id', $this->cities)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1953-01-01');
            $this->to = date('1962-12-30');

            $this->filter_60_69 = Client::whereIn('city_id', $this->cities)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1943-01-01');
            $this->to = date('1900-12-30');

            $this->filter_mais_70 = Client::whereIn('city_id', $this->cities)->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        } else {
            $this->filter_30_39 = Client::whereIn('bairro', $this->bairros)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1973-01-01');
            $this->to = date('1982-12-30');

            $this->filter_40_49 = Client::whereIn('bairro', $this->bairros)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1963-01-01');
            $this->to = date('1972-12-30');

            $this->filter_50_59 = Client::whereIn('bairro', $this->bairros)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1953-01-01');
            $this->to = date('1962-12-30');

            $this->filter_60_69 = Client::whereIn('bairro', $this->bairros)->whereBetween('data_nascimento', [$this->from, $this->to])->count();

            $this->from = date('1943-01-01');
            $this->to = date('1900-12-30');

            $this->filter_mais_70 = Client::whereIn('bairro', $this->bairros)->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        }*/

        //$this->bairros_teste = array_unique(array_column(Client::select('bairro')->whereIn('city_id', $this->cities)->get()->toArray(), 'bairro'));

        $clients_paginate = null;

        $this->male = 0;
        $this->female = 0;
        $this->not_info = 0;

        count($this->genders) == 0 ? $this->genders_render = ['M', 'F', ''] : $this->genders_render = $this->genders;

        if(count($this->bairros) == 0) {
            $clients_paginate = Client::whereIn('city_id', $this->cities_render)->whereIn('flag_type', $this->genders_render)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');

            foreach ($this->genders_render as $value) {
                if($value == 'M')
                    $this->male = Client::whereIn('city_id', $this->cities_render)->where('flag_type', 'M')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
                if($value == 'F')
                    $this->female = Client::whereIn('city_id', $this->cities_render)->where('flag_type', 'F')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
                if($value == '')
                    $this->not_info = Client::whereIn('city_id', $this->cities_render)->where('flag_type', '')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
            }
        }
        else {
            $clients_paginate = Client::whereIn('bairro', $this->bairros)->whereIn('flag_type', $this->genders_render)->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name');

            foreach ($this->genders_render as $value) {
                if($value == 'M')
                    $this->male = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'M')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
                if($value == 'F')
                    $this->female = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'F')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
                if($value == '')
                    $this->not_info = Client::whereIn('bairro', $this->bairros)->where('flag_type', '')->whereBetween('data_nascimento', [$this->from, $this->to])->orderBy('name')->count();
            }
        }

        $columnChartModel =
        (new ColumnChartModel())
            ->setTitle('Faixa Etaria')
            ->addColumn('30 a 39 anos', $this->filter_30_39, '#35A0FF')
            ->addColumn('40 a 49 anos', $this->filter_40_49, '#35A0FF')
            ->addColumn('50 a 59 anos', $this->filter_50_59, '#35A0FF')
            ->addColumn('60 a 69 anos', $this->filter_60_69, '#35A0FF')
            ->addColumn('Mais de 70 anos', $this->filter_mais_70, '#35A0FF')
            ->withOnColumnClickEventName('onColumnClick');

        $pieChartModel =
        (new PieChartModel())
            ->setTitle('Sexo')
            ->addSlice('Masculino', $this->male, '#1B5585')
            ->addSlice('Feminino', $this->female, '#C794C0')
            ->addSlice('Não Informado', $this->not_info, '#596023')
            ->withOnSliceClickEvent('onSliceClick');

        return view('livewire.dashboard', [
            'clients' => $clients_paginate->paginate(150),
        ])->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel
        ]);
    }

}
