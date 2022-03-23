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
    public $filter_30_39, $filter_40_49, $filter_50_59, $filter_60_69, $filter_mais_70, $states_teste, $cities_teste, $bairros_teste, $viewTable =  'hidden', $viewChart = '';

    protected $listeners = [
        'Dashboard',
        'onColumnClick' => 'handleOnColumnClick',
        'onSliceClick' => 'handleOnSliceClick',
    ];

    protected $rules = [
        'states.*' => '',
        'cities.*' => '',
    ];

    public function handleOnColumnClick($point)
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
        /*if(count($this->bairros) == 0) {
            $this->male = Client::whereIn('city_id', $this->cities)->where('flag_type', 'M')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
            $this->female = Client::whereIn('city_id', $this->cities)->where('flag_type', 'F')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
            $this->not_info = Client::whereIn('city_id', $this->cities)->where('flag_type', '')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        } else {
            $this->male = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'M')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
            $this->female = Client::whereIn('bairro', $this->bairros)->where('flag_type', 'F')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
            $this->not_info = Client::whereIn('bairro', $this->bairros)->where('flag_type', '')->whereBetween('data_nascimento', [$this->from, $this->to])->count();
        }*/

    }

    public function handleOnSliceClick()
    {
        $this->isOpen = true;
    }

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

    public function mount()
    {
        $this->states_teste = State::all();

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

        $this->bairros_teste = array_unique(array_column(Client::select('bairro')->whereIn('city_id', $this->cities)->get()->toArray(), 'bairro'));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->cities_teste = City::whereIn('state_id', $this->states)->get();
        $this->from = date('1983-01-01');
        $this->to = date('1992-12-30');

        if(count($this->bairros) == 0) {
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
        }

        $this->bairros_teste = array_unique(array_column(Client::select('bairro')->whereIn('city_id', $this->cities)->get()->toArray(), 'bairro'));

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
            ->addSlice('Não Informado', $this->filter_50_59, '#596023')
            ->withOnSliceClickEvent('onSliceClick');


        return view('livewire.dashboard', [
            'clients' => Client::whereIn('city_id', $this->cities)->paginate(150),
        ])->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel
        ]);
    }

}
